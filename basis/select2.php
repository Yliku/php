<!DOCTYPE html>
<html>

<head>	<title>参数传递</title>		</head>

<body bgcolor="#BEBEBE">
	
<?php
if( isset($_POST["lol"]) && isset($_POST["pf"]) ){		
//isset()判断变量的值是否存在,返回布尔类型
//还可以写成这样 isset(n1,n2,n3) 同时判断n个变量
	
	$lol=$_POST["lol"];
	$pf=$_POST["pf"];
	echo "<br>是否玩LOL:".$lol;
	echo "<br>是否购买皮肤:".$pf."<br/	>";
	
	if($lol=="是"){
		echo "玩LOL,";
		if($pf=="是"){
			echo "同时是RMB玩家<br />";
		}else{
			echo "普通玩家<br />";
		}
	}else{
		echo "不玩lol的人<br />";
	}		
}else{
	echo "请不要直接打开该页面<br />";
}

echo "斐波那契数列:";
$x1=1;
$x2=1;
$x3=0;
while($x3<100)
{
	$x3=$x1+$x2;
	echo $x2." ";			
	$x1=$x2;
	$x2=$x3;
}

?>
</body>

</html>