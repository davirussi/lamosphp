<!DOCTYPE html>
<html>
<body>


<?php include "loader.php"?>

<?php echo 'Manipulador'?>

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
        <select name="camada2">
            <?php 
                foreach ($arquivoscamada as &$elemento )
                { 
                    echo '<option value="'.$elemento.'">'.$elemento.'</option>';
                }
            ?>
        </select>
        
        <input type="hidden" name="tempo" value="<?php echo time() ?>">

        <input name="submitb" type="submit" value="Submit">
    </form>

<?php 
    if (isset($_GET['submitb'])) 
    {
        $dir = $_SERVER['DOCUMENT_ROOT'];
        if (strcmp($_GET['camada'],"")==0){
            $frame = '/camada/clean.png';
        }
        else{
            $frame = '/camada/'.$_GET['camada'];
        }
        
        if (strcmp($_GET['camada2'],"")==0){
            $frame2 = '/camada/clean.png';
        }
        else{
            $frame2 = '/camada/'.$_GET['camada2'];
        }
        #$frame = '/camada/frame.png';
        #$base = '/base/base.jpeg';
        $base = '/base/'.$_GET['base'];
        $saida = '/temp/'.$_GET['tempo'].$_SERVER['REMOTE_ADDR'].'.jpg';       
        include "combiner.php";
    }
    if (isset($_GET['tempo']))
    {
        echo "<img src='$saida' alt='some_text' width='400' height='400'>";
    
    }
    
    $gl = new Imagick(); 

    #$bgImage = new Imagick('camada.gif');
    #echo ($_SERVER['DOCUMENT_ROOT'] . '/camada.gif');
    #$image = new Imagick($_SERVER['DOCUMENT_ROOT'] . '/camada.gif');
    
    
?> 

<?php

/* Create a new imagick object and read in GIF */
$image = new Gmagick('base.jpeg');

/* Notice writeImages instead of writeImage */

?>

</body>
</html>
