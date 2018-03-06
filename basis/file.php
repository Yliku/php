<?php 
$filename='./msg/msg.txt';
echo file_get_contents($filename);
$size=filesize($filename);
echo '<br>',$size,'<br>';
echo '<br>',1,'<br>';
 ?>