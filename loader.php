<?php
    // Note que !== não existia antes do PHP 4.0.0-RC2

    $arquivosbase = array();

    if ($handle = opendir('base/')) {

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

        /* Esta é a forma correta de varrer o diretório */
        $i = 0;
        while (false !== ($file = readdir($handle))) {
            #echo "$file\n";
            if (strcmp($file,".")!=0 and strcmp($file,"..")!=0)
            {
                if (strcmp($file,"clean.png")==0){
                    $arquivoscamada[$i]="";
                }
                else{
                    $arquivoscamada[$i]=$file;
                }
                $i+=1;
            } 
        }
        closedir($handle);
    }
?>
