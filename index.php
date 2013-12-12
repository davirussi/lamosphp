<!DOCTYPE html>
<html>
<body>


<?php
    // Note que !== não existia antes do PHP 4.0.0-RC2

    $arquivosbase = array();

    if ($handle = opendir('base/')) {
        echo "Manipulador de diretório: $handle\n";
        echo "Arquivos:\n";

        /* Esta é a forma correta de varrer o diretório */
        $i = 0;
        while (false !== ($file = readdir($handle))) {
            #echo "$file\n";
            if (strcmp($file,".")!=0 and strcmp($file,"..")!=0)
            {
                $arquivosbase[$i]=$file;
                $i+=1;
            } 
        }
        closedir($handle);
    }
?>

<?php
    // Note que !== não existia antes do PHP 4.0.0-RC2

    $arquivoscamada = array();

    if ($handle = opendir('camada/')) {
        echo "Manipulador de diretório: $handle\n";
        echo "Arquivos:\n";

        /* Esta é a forma correta de varrer o diretório */
        $i = 0;
        while (false !== ($file = readdir($handle))) {
            #echo "$file\n";
            if (strcmp($file,".")!=0 and strcmp($file,"..")!=0)
            {
                $arquivoscamada[$i]=$file;
                $i+=1;
            } 
        }
        closedir($handle);
    }
?>


<form name="combinador" action="index.php" method="get">
    <select name="base">
        <?php 
            foreach ($arquivosbase as &$elemento )
            { 
                echo '<option value="'.$elemento.'">'.$elemento.'</option>';
            }
        ?>
    </select>
    <select name="camada">
        <?php 
            foreach ($arquivoscamada as &$elemento )
            { 
                echo '<option value="'.$elemento.'">'.$elemento.'</option>';
            }
        ?>
    </select>
    
    <input name="submitb" type="submit" value="Submit">
</form>

<?php 
    if (isset($_GET['submitb'])) 
    {
        try
        { 
            $dir = $_SERVER['DOCUMENT_ROOT'];
            
            echo $dir . '/imagen/frame.png';
            // Let's check whether we can perform the magick. 
            if (TRUE !== extension_loaded('imagick')) 
            { 
                throw new Exception('Imagick extension is not loaded.'); 
            } 

            // This check is an alternative to the previous one. 
            // Use the one that suits you better. 
            if (TRUE !== class_exists('Imagick')) 
            { 
                throw new Exception('Imagick class does not exist.'); 
            } 



            // Let's read the images. 
            $glasses = new Imagick(); 
            if (FALSE === $glasses->readImage($dir . '/camada/frame.png')) 
            { 
                throw new Exception(); 
            } 

            $face = new Imagick(); 
            if (FALSE === $face->readImage($dir . '/base/base.jpeg')) 
            { 
                throw new Exception(); 
            } 

            // Let's put the glasses on (10 pixels from left, 20 pixels from top of face). 
            $face->compositeImage($glasses, Imagick::COMPOSITE_DEFAULT, 10, 20); 

            // Let's merge all layers (it is not mandatory). 
            $face->flattenImages(); 

            // We do not want to overwrite face.jpg. 
            $face->setImageFileName($dir . '/temp/face_and_glasses2.jpg'); 

            // Let's write the image. 
            if  (FALSE == $face->writeImage()) 
            { 
                throw new Exception(); 
            } 
        } 
        catch (Exception $e) 
        { 
            echo 'Caught exception: ' . $e->getMessage() . "\n"; 
        } 
    }
     
?> 

</body>
</html>
