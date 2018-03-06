<title>参数传递之post</title>
<body>

	<form action ="post2.php" method ="post">
		php考试成绩	<input type="text" name="phpScore"><br>
		html考试成绩<input type="text" name="htmlScore"><br>
		<input type="submit"value="提交">
	</form>
	<?php
		echo "如果PHP分数和HTML分数都大于90分;<br>则可以出去旅游,否则在家学习!<br /><br />";
	?>
	
	<form action="messageList.php" method="post">
		姓名:<input type="text" name="name"><br>
		内容:<textarea name="content" cols="40" rows="10" style="background-color:BFCEDC"></textarea> <br>	
		<!-- textarea标签:插入文本框 --> 
		<input type="submit" value="提交">
	</form>
	



</body>