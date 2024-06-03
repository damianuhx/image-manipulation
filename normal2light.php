
<?php

/*
This application creates a shadow/lighting overlay
out of a normal map.  The GET parameter "inv" specifies if
height and depth are inverted. */


$image_data = imagecreatefrompng('input.png');
$image_data2 = imagecreatefrompng('input.png');

// Turn off alpha blending
imagealphablending($image_data, false);

$width = imagesx($image_data);
$height = imagesy($image_data);

$min=127;
$max=127;

for($x = 0; $x < $width; $x++) {
    for($y = 0; $y < $height; $y++) {
        
        // pixel color at (x, y)
       $color = imagecolorsforindex($image_data, imagecolorat($image_data, $x, $y)); // human readable
       if ($color['red']<$min){
        $min=$color['red'];
       }
       else if ($color['red']>$max)
       {
        $max=$color['red'];
       }
       //echo $color['alpha'];
        if ($color['red']==127){
            $color['alpha'] = 127;
            
        }
       else if ($color['red']<127){
        $color['alpha'] = $color['red'];
        if ($_GET['inv']){
            $color['red'] = 255;
            $color['green'] = 255;
            $color['blue'] = 255;
        }
        else{
            $color['red'] = 0;
            $color['green'] = 0;
            $color['blue'] = 0;
        }
        
       }
       else if ($color['red']>127){
        $color['alpha'] = (255-$color['red']);
        if (!$_GET['inv']){
            $color['red'] = 255;
            $color['green'] = 255;
            $color['blue'] = 255;
        }
        else{
            $color['red'] = 0;
            $color['green'] = 0;
            $color['blue'] = 0;
        }
       }

        // check if we have white
        //var_dump($color);
            //  make it black
        $color2=$color;

        $color = imagecolorallocatealpha($image_data, $color['red'], $color['green'], $color['blue'], $color['alpha']);
        imagesetpixel($image_data, $x, $y, $color );  // $color format not OK.
        
    }
}

    // Set alpha flag
    imagesavealpha($image_data, true);  
    imagepng($image_data , "output.png");
    imagedestroy($image_data);

    ?>
    
    <img src="input.png">
    <img src="output.png">
