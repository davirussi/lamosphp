<?php
    try
        { 
            // Verificando se o Imagick está instalado 
            if (TRUE !== extension_loaded('imagick')) 
            { 
                throw new Exception('Imagick extension is not loaded.'); 
            } 

            // Verificando se Imagick esta instalado forma 2 
            if (TRUE !== class_exists('Imagick')) 
            { 
                throw new Exception('Imagick class does not exist.'); 
            } 
            //output_file_name
            $saida = '/temp/'.$_GET['tempo'].$_SERVER['REMOTE_ADDR'].'.jpg'; 

            // criando os caminhos para os diretorios. 
            $dircb = $dir . '/imagem/' . $base .  '/base.png';
            if (strcmp($camada1,"clean.png")!=0)
                $dirc1=$dir . '/imagem/' . $data . '/' . $regiao . '/' . $hora . '/' . $nivel . '/camada1/' . $camada1 . '.png';
            else
                $dirc1=$dir . '/imagem/clean/clean.png';
                
            if (strcmp($camada2,"clean.png")!=0)
                $dirc2=$dir . '/imagem/' . $data . '/' . $regiao . '/' . $hora . '/' . $nivel . '/camada2/' . $camada2 . '.png';
            else
                $dirc2=$dir . '/imagem/clean/clean.png';
                
            if (strcmp($camada3,"clean.png")!=0)
                $dirc3=$dir . '/imagem/' . $data . '/' . $regiao . '/' . $hora . '/' . $nivel . '/camada3/' . $camada3 . '.png';
            else
                $dirc3=$dir . '/imagem/clean/clean.png';

            if (strcmp($camada4,"clean.png")!=0)
                $dirc4=$dir . '/imagem/' . $data . '/' . $regiao . '/' . $hora . '/' . $nivel . '/camada4/' . $camada4 . '.png';
            else
                $dirc4=$dir . '/imagem/clean/clean.png';
                
            if (strcmp($camada5,"clean.png")!=0)
                $dirc5=$dir . '/imagem/' . $data . '/' . $regiao . '/' . $hora . '/' . $nivel . '/camada5/' . $camada5 . '.png';
            else
                $dirc5=$dir . '/imagem/clean/clean.png';
                
            #ler as camadas e a base
            $camada_t2 = new Imagick(); 
            if (FALSE === $camada_t2->readImage($dirc2)) 
            { 
                throw new Exception(); 
            }
            $camada_t = new Imagick(); 
            if (FALSE === $camada_t->readImage($dirc1)) 
            { 
                throw new Exception(); 
            }
            $camada_t3 = new Imagick(); 
            if (FALSE === $camada_t3->readImage($dirc3)) 
            { 
                throw new Exception(); 
            }
            $camada_t4 = new Imagick(); 
            if (FALSE === $camada_t4->readImage($dirc4)) 
            { 
                throw new Exception(); 
            }
            $camada_t5 = new Imagick(); 
            if (FALSE === $camada_t5->readImage($dirc5)) 
            { 
                throw new Exception(); 
            }
            
            $base_t = new Imagick(); 
            if (FALSE === $base_t->readImage($dircb)) 
            { 
                throw new Exception(); 
            } 
            
            // compondo as imagens na coordenada (0.0). 
            $base_t->compositeImage($camada_t, Imagick::COMPOSITE_DEFAULT, 0, 0); 
            // juntando. 
            $base_t->flattenImages(); 
            //repetir pras outras 4 camadas
            $base_t->compositeImage($camada_t2, Imagick::COMPOSITE_DEFAULT, 0, 0); 
            $base_t->flattenImages();            
            $base_t->compositeImage($camada_t3, Imagick::COMPOSITE_DEFAULT, 0, 0); 
            $base_t->flattenImages();  
            $base_t->compositeImage($camada_t4, Imagick::COMPOSITE_DEFAULT, 0, 0); 
            $base_t->flattenImages();  
            $base_t->compositeImage($camada_t5, Imagick::COMPOSITE_DEFAULT, 0, 0); 
            $base_t->flattenImages();           
            $base_t->setImageFileName($dir . $saida); 
            // escrevendo a imagem em disco. 
            if  (FALSE == $base_t->writeImage()) 
            { 
                throw new Exception(); 
            } 
        } 
        catch (Exception $e) 
        { 
            echo 'Caught exception: ' . $e->getMessage() . "\n"; 
        } 
?>
