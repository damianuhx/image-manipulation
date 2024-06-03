<!DOCTYPE html>
<html>
<body>

This is a small collection of programms for manipulating image data. I use it for my game <a href="https://https://soundstorm.uhx.ch">SoundStorm</a>. The source code can be accessed <a href="https://github.com/damianuhx/image-manipulation">here</a>.<br/><br/>
<form action="upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload"><br/>
  <input type="submit" value="Upload Image" name="submit">
</form><br/><br/>
Available operations after uploading a PNG Image:<ul>
    <li>Split the image in 4 pieces and rearrange them. So you can glue the borders together to make infinite repeating textures.<br/>
        <img src="splitinput.png"> <img src="splitoutput.png">
    </li>
    <li>Transform a normalmap to an lighting-overlay. This can be used to make animations in Spine Animation look more plastic.<br/>
    <img src="normalinput.png"> <img src="normaloutput.png"> <img src="normaloutputinverted.png">
    </li>

    Please note that if multiple users use this app at the same time uploaded images can be overwritten by others. 
    In very rare cases you will see a image from someone else manipulated instead of your own. In this case: Just try again.
</body>
</html>