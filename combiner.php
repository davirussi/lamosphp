<?php
    try
        { 
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
            if (FALSE === $glasses->readImage($dir . $frame)) 
            { 
                throw new Exception(); 
            } 

            $face = new Imagick(); 
            if (FALSE === $face->readImage($dir . $base)) 
            { 
                throw new Exception(); 
            } 

            // Let's put the glasses on (10 pixels from left, 20 pixels from top of face). 
            $face->compositeImage($glasses, Imagick::COMPOSITE_DEFAULT, 10, 20); 

            // Let's merge all layers (it is not mandatory). 
            $face->flattenImages(); 

            // We do not want to overwrite face.jpg. 
            $face->setImageFileName($dir . $saida); 

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
?>

<?php
    try
        { 
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
            $glasses2 = new Imagick(); 
            if (FALSE === $glasses2->readImage($dir . $frame2)) 
            { 
                throw new Exception(); 
            } 

            $face2 = new Imagick(); 
            if (FALSE === $face2->readImage($dir . $saida)) 
            { 
                throw new Exception(); 
            } 

            // Let's put the glasses on (10 pixels from left, 20 pixels from top of face). 
            $face2->compositeImage($glasses2, Imagick::COMPOSITE_DEFAULT, 10, 20); 

            // Let's merge all layers (it is not mandatory). 
            $face2->flattenImages(); 

            // We do not want to overwrite face.jpg. 
            $face2->setImageFileName($dir . $saida); 

            // Let's write the image. 
            if  (FALSE == $face2->writeImage()) 
            { 
                throw new Exception(); 
            } 
        } 
        catch (Exception $e) 
        { 
            echo 'Caught exception: ' . $e->getMessage() . "\n"; 
        } 
?>


