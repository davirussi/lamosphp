<?php 
    if (isset($_GET['submitb']) and isset($_GET['Data']) and isset($_GET['Regiao']) and isset($_GET['Hora']) and isset($_GET['Nivel']) )
    {
        $dir = $_SERVER['DOCUMENT_ROOT'];
        $data = $_GET['Data'];
        $regiao = $_GET['Regiao'];
        $hora = $_GET['Hora'];
        $nivel = $_GET['Nivel'];
        $camada1 = 'clean.png';
        $camada2 = 'clean.png';
        $camada3 = 'clean.png';
        $camada4 = 'clean.png';
        $camada5 = 'clean.png';
        
        if (strcmp($_GET['camada1'],"Nenhum")!=0 and strcmp($_GET['camada1'],"")!=0 ){
            $camada1 = $_GET['camada1'];
        }   
        if (strcmp($_GET['camada2'],"Nenhum")!=0 and strcmp($_GET['camada2'],"")!=0){
            $camada2 = $_GET['camada2'];
        }  
        if (strcmp($_GET['camada3'],"Nenhum")!=0 and strcmp($_GET['camada3'],"")!=0){
            $camada3 = $_GET['camada3'];
        }
        if (strcmp($_GET['camada4'],"Nenhum")!=0 and strcmp($_GET['camada4'],"")!=0){
            $camada4 = $_GET['camada4'];
        }
        if (strcmp($_GET['camada5'],"Nenhum")!=0 and strcmp($_GET['camada5'],"")!=0) {
            $camada5 = $_GET['camada5'];
        }
        
        $base = 'base '.$regiao;
        
        #depois de tudo setado chamar o combinador de imagem  
        if (strcmp($hora,"Loop")!=0 )    
            include "combiner.php";
        else
            include "combinerloop.php";
    }
?> 
