<!DOCTYPE html>
<html>
<body>

This is a small collection of programms for manipulating image data. I use it for my game <a href="soundstorm.uhx.ch">SoundStorm</a>. <br/><br/>
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
</body>
</html>