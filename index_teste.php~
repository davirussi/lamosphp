<!DOCTYPE html>
<html>
<body>


<?php include "dir_loader.php"?>
<?php include "camada.php"?>


<?php echo 'Manipulador'?>

    <form name="combinador" action="index.php" method="get">
        <select name="Data">
            <?php
                #ler diretorio com as datas
                foreach ($dir_data as &$elemento )
                { 
                    echo '<option value="'.$elemento.'">'.$elemento.'</option>';
                }
            ?>
        </select>
        <select name="Regiao">
            <?php
                #ler diretorio com as regioes
                foreach ($dir_regiao as &$elemento )
                { 
                    echo '<option value="'.$elemento.'">'.$elemento.'</option>';
                }
            ?>
        </select>
        <select name="Hora">
            <?php
                #ler diretorio com as regioes
                foreach ($dir_hora as &$elemento )
                { 
                    echo '<option value="'.$elemento.'">'.$elemento.'</option>';
                }
            ?>
        </select>
        <select name="Nivel">
            <?php
                #ler diretorio com as regioes
                foreach ($dir_nivel as &$elemento )
                { 
                    echo '<option value="'.$elemento.'">'.$elemento.'</option>';
                }
            ?>
        </select>               
        

            <?php 
                foreach ($camada1 as &$elemento )
                { 
                   
                    echo '<input type="radio" value="'.$elemento.'" name="group1">'.$elemento;
                }
            ?>
      
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
    
    #$gl = new Imagick(); 

    #$bgImage = new Imagick('camada.gif');
    #echo ($_SERVER['DOCUMENT_ROOT'] . '/camada.gif');
    #$image = new Imagick($_SERVER['DOCUMENT_ROOT'] . '/camada.gif');
    
    
?> 


</body>
</html>
