
<img src="input.png">
<?php

/*
This application takes a image called "input.png" and transforms it to "output.png"
It expects a greyscale picture and transforms all 
-light colors to white with higher alpha the brighter the color is
-dark colors to black with alpha depending on the how dark the color is
This transformation is used to make shadow overlays by lightmaps.
*/


// get image data
$image_data = imagecreatefrompng('input.png');

// Turn off alpha blending
imagealphablending($image_data, false);

$width = imagesx($image_data);
$height = imagesy($image_data);

for($x = 0; $x < $width; $x++) {
    for($y = 0; $y < $height; $y++) {
        // pixel color at (x, y)
       $color = imagecolorsforindex($image_data, imagecolorat($image_data, $x, $y)); // human readable
       //echo $color['alpha'];
        if ($color['alpha']==127){
            $color['alpha'] = 127;
            
        }
       else if ($color['red']<127){
        $color['alpha'] = $color['red'];
        $color['red'] = 0;
        $color['green'] = 0;
        $color['blue'] = 0;
       }
       else if ($color['red']>=127){
        $color['alpha'] = (255-$color['red']);
        $color['red'] = 255;
        $color['green'] = 255;
        $color['blue'] = 255;
       }
        // check if we have white
        //var_dump($color);
            //  make it black
        $color = imagecolorallocatealpha($image_data, $color['red'], $color['green'], $color['blue'], $color['alpha']);
        imagesetpixel($image_data, $x, $y, $color );  // $color format not OK.
        
    }
}

    // Set alpha flag
    imagesavealpha($image_data, true);  
    //  https://www.php.net/manual/en/function.imagepng.php
    imagepng($image_data , "output.png");
    imagedestroy($image_data);

    ?>
<img src="output.png">