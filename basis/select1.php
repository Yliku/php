<title>参数传递,下拉列表实现</title>
<form action ="select2.php" method ="post">
	玩LOL
	<select name="lol">
		<option value="是">玩</option>
		<option value="否">不玩</option>
	</select><br/>
	买皮肤
	<select name="pf">
		<option value="是">买</option>
		<option value="否">不买</option>
	</select><br/>	
	<input type="submit" value="提交">
	
</form>
<?php
	echo "如果PHP分数和HTML分数都大于90分;<br>则可以出去旅游,否则在家学习!";
	

?>