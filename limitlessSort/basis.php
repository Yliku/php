<?php 
$con = mysqli_connect('localhost','root','123');
mysql_select_db('deeploop');
$sql = "INSERT INTO deeploop(id,pid,catename,cateorder,createtime) VALUES
(1,0,'新闻',0,0), 
(2,0,'图片',0,0), 
(3,1,'国内新闻',0,0), 
(4,1,'国际新闻',0,0), 
(5,3,'北京新闻',0,0), 
(6,4,'美国新闻',0,0), 
(7,2,'美女图片',0,0), 
(8,2,'风景图片',0,0), 
(9,7,'日韩明星',0,0), 
(10,9,'韩国明星',0,0);"


 ?>