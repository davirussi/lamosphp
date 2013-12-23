<?php 
    #$dir_data -> diretorio com as datas
    #dir_regiao -> diretorio com as regioes
    #dir_hora -> diretorio com as horas
    #dir_nivel -> diretorio com os niveis
?>

<?php
    // Note que !== não existia antes do PHP 4.0.0-RC2
    // Ler o diretorio com as datas
    $dir_data = array();
    $dir_base = array();
    $dir_leitura='imagem/';
    if ($handle = opendir($dir_leitura)) {
        /* Esta é a forma correta de varrer o diretório */
        $i = 0;
        while (false !== ($file = readdir($handle))) {
            #echo "$file\n";
            if (strcmp($file,".")!=0 and strcmp($file,"..")!=0)
            {
                if (strcmp($file,"clean.png")==0){
                    $dir_data[$i]="";
                }
                else{
                    if ((strpos($file,'base') !== false) or (strpos($file,'clean') !== false)) 
                        array_push($dir_base,$file);
                    else
                        array_push($dir_data,$file);
                }
                $i+=1;
            } 
        }
        closedir($handle);
    }
    sort($dir_data);
?>

<?php
    // Note que !== não existia antes do PHP 4.0.0-RC2
    // Ler o diretorio com as datas
    $dir_regiao = array();
    $dir_leitura = $dir_leitura.$dir_data[0].'/';
    if ($handle = opendir($dir_leitura)) {
        /* Esta é a forma correta de varrer o diretório */
        $i = 0;
        while (false !== ($file = readdir($handle))) {
            #echo "$file\n";
            if (strcmp($file,".")!=0 and strcmp($file,"..")!=0)
            {
                if (strcmp($file,"clean.png")==0){
                    $dir_regiao[$i]="";
                }
                else{
                    $dir_regiao[$i]=$file;
                }
                $i+=1;
            } 
        }
        closedir($handle);
    }
    sort($dir_regiao);
?>

<?php
    // Note que !== não existia antes do PHP 4.0.0-RC2
    // Ler o diretorio com as datas
    $dir_hora = array();
    $dir_leitura = $dir_leitura.$dir_regiao[0].'/';
    if ($handle = opendir($dir_leitura)) {
        /* Esta é a forma correta de varrer o diretório */
        $i = 0;
        while (false !== ($file = readdir($handle))) {
            #echo "$file\n";
            if (strcmp($file,".")!=0 and strcmp($file,"..")!=0)
            {
                if (strcmp($file,"clean.png")==0){
                    $dir_hora[$i]="";
                }
                else{
                    $dir_hora[$i]=$file;
                }
                $i+=1;
            } 
        }
        closedir($handle);
    }
    sort($dir_hora);
    $dir_hora[count($dir_hora)]='Loop';
?>

<?php
    // Note que !== não existia antes do PHP 4.0.0-RC2
    // Ler o diretorio com as datas
    $dir_nivel = array();
    $dir_leitura = $dir_leitura.$dir_hora[0].'/';
    if ($handle = opendir($dir_leitura)) {
        /* Esta é a forma correta de varrer o diretório */
        $i = 0;
        while (false !== ($file = readdir($handle))) {
            #echo "$file\n";
            if (strcmp($file,".")!=0 and strcmp($file,"..")!=0)
            {
                if (strcmp($file,"clean.png")==0){
                    $dir_nivel[$i]="";
                }
                else{
                    $dir_nivel[$i]=$file;
                }
                $i+=1;
            } 
        }
        closedir($handle);
    }
    sort($dir_nivel);
?>
