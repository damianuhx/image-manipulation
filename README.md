This is a small collection of programms to manipulate image data. 
I use it for creating assets for my game <a href="https://soundstorm.uhx.ch">SoundStorm</a>.

An online version is available <a href="https://image-manipulation.uhx.ch">here</a>.

<ul>
  <li>The index.php file is the entry mask for uploading an image.</li>
<li>In uploads.php the uploaded image is stored as "input.png". With the listed links the image can be processed.</li>
<li>normal2light.php takes the image "input.png" and transforms it. It expects a normalmap as input and will create an lighting-overlay. If the GET parameter "inv" is true, upside down is inverted.</li>
<li>split.php takes the image "input.png", splits it in 4 pieces and rearranges them that the borders can be manually smoothen/connected/glued together in order to create an infinite repeating texture.</li>
