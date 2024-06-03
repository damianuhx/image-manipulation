<?php
$target_dir = "";
$target_file = "input.png";
//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
/*if (file_exists($target_file)) {
  echo "Sorry, file already exists. ";
  $uploadOk = 0;
}*/

// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
  echo "Sorry, your file is too large. ";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "png") {
  echo "Sorry, only PNG files are allowed. ";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded. ";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded. <br/>
    <br/>
    What do you want to do with this file?<br/>
    <br/>
    <a href=\"split.php\">Split into 4 parts and rearrange them to manually smoothen the boarders. </a><br/>
    <a href=\"normal2light.php\">Create a light-overlay from a normalmap.</a><br/>
    <a href=\"normal2light.php?inv=1\">Create a light-overlay from a normalmap. (inverted)</a><br/>
    <!--<a href=\"grey2light.php\">Transform a lightmap to a light-overlay.</a>--><br/>
    ";

  } else {
    echo "Sorry, there was an error uploading your file. ";
  }
}

?>
