<!DOCTYPE html>
<html>

<head>
	<title>参数传递</title>
</head>

<body>
	
	<?php
		var_dump($_POST["phpScore"]);
		$phpScore=$_POST["phpScore"];
		var_dump($phpScore);
		echo "<br>PHP成绩:".$phpScore;
		$htmlScore=$_POST["htmlScore"];
		echo "<br>html成绩:$htmlScore ";	//注意放在双引号里面的变量,如果后面还有字符串,其后要加上空格隔离开
		echo "<br>html成绩:", $_POST["htmlScore"] ;
		if($phpScore>=90 && $htmlScore>=90)
		{
			echo "<br>恭喜你,出去旅游啦!";
		}else{
			echo "<br>很遗憾,在家学习吧!";
		}
	?>
</body>

</html>