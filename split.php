<?php

/*This code takes an image "input.png", cuts it in 4 pieces
and arranges them that the borders in the original picture 
are in the middle. So you can edit the transistions between
the borders to make the image a repeating texture*/

// get image data
$image_data = imagecreatefrompng('input.png');
$image_output = imagecreatefrompng('input.png');

// Turn off alpha blending
imagealphablending($image_data, false);

$width = imagesx($image_data);
$height = imagesy($image_data);

$width2 = floor($width/2);
$height2 = floor($height/2);

for($x = 0; $x < $width; $x++) {
    for($y = 0; $y < $height; $y++) {
        
        $x2 = $x + $width2;
        $y2 = $y + $height2;
        //echo '<br/>'.$x.'/'.$y.':';
        if ($x2>=$width){$x2-=$width;}
        if ($y2>=$height){$y2-=$height;}

       $color = imagecolorsforindex($image_data, imagecolorat($image_data, $x2, $y2)); // human readable


       $color = imagecolorallocatealpha($image_data, $color['red'], $color['green'], $color['blue'], $color['alpha']);
        imagesetpixel($image_output, $x, $y, $color );  // $color format not OK.
        
    }
}

    // Set alpha flag
    imagesavealpha($image_output, true);  
    imagepng($image_output , "output.png");
    imagedestroy($image_output);

    ?>
    <img src="input.png">
    <img src="output.png">
