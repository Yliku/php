<?php 
require_once('connect.php');
$sql = "select * from article order by dateline desc";
$query = mysqli_query($con,$sql);
if($query && mysqli_num_rows($query)){				//当$query存在且$query数据的行数不为0的时候
	while( $row = mysqli_fetch_assoc($query) ){
	$data[]=$row;									//将$row一维数组存入数组$data中，结果是$data变成二维数组了
	}
}
var_dump($data);
 ?>

<html>
<head><title>文章列表</title></head> 	
<body>
	<?php
	if(empty($data)){
		echo '数据库文章为空，请添加文章。<br />';
	}else{
		foreach ($data as $value) {
	?>
<p></p>
<div>标题：<?php echo $value['title']?></div>
<div>作者：<?php echo $value['author']?></div>
<div>简介：<?php echo $value['description']?></div>
<div>发布时间：<?php echo $value['dateline']?></div>
<div><a href="article.show.php?id=<?php echo $value['id']?>">查看全文</a></div>
<p></p>
	<?php 
		}
	}
	 ?>
</body>
</html>