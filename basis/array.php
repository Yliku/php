<?php
echo "PHP中的数组";
//数组的两种初始化方式
$arr1=array("123",'今天好冻',"abcdef",4,4.5,true);	
$arr2=array('001'=>'苹果','002'=>'西瓜','002'=>'西瓜1','001'=>'草莓',);
var_dump($arr1);
print_r($arr2);
echo '<br />';
echo '数组arr1中的2号元素是:'.$arr1['1'].'<br />';
echo '数组arr2中的2号元素是:'.$arr2['002'].'<br />';


//PHP中的数组有两种：索引数组、关联数组
//索引数组的下标是系统默认的从整型0开始的，而关联数组的下标是由我们自定义的！！！

$fruit=array("苹果","2号元素香蕉","ABC",4,3.1415,true);	//索引数组
print_r($fruit);
var_dump($fruit);

$box=array('egg'=>'鸡蛋',	'banana'=>'香蕉',	'pineapple'=>'菠萝');	//关联数组
print_r($box);
var_dump($box);


$returnValue=print "print函数 <br />";		//print函数，有返回值，打印成功返回值是1
echo 'returnValue的值是：',$returnValue,"<br /><br />";	
//有参数的情况下最好优先逗号分隔开，次之用连接符，如果参数要写在双引号之内要用空格分隔开

echo $fruit[0];		echo "<br />";	
echo $fruit['1'];	echo "<br />";		//访问数组元素加单引号
echo $fruit["$returnValue"],"<br />";
echo $fruit[$returnValue],"<br /><br />";	//php中数组下标是变量的话一般不加双引号
//echo $fruit['$returnValue'],"<br />";	加单引号则识别为常量，会报错
//PHP中数组的索引KEY值（下标）如果不用引号括起来的话，会将索引KEY值解释为一个常量，
//当找不到该常量的定义时，才将其解释为一个字符串，所以需要严格执行PHP的语言规范。

//数组的所有元素可以用for等循环来访问，在PHP里面还可以用foreach循环来访问
foreach($fruit as $a => $b){				//注意别漏了as
	echo '第'.$a.'号元素的值是：'.$b.'<br />';
}



?>