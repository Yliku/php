<html>
<head><title>留言板-信息保存</title></head>

<body>

<?php
echo "留言板内容:";
print_r($_POST);	//print_r是函数,有返回值,后面不能加连接符,echo是语法,所以可以
echo "<br />";
var_dump($_POST);
//PHP打开文件
$ziyuan = fopen('./testMsg.txt','a');		//a:append,添加,此时$ziyuan为一个资源变量
// 1、./是当前目录
// 2、../是父级目录；  ../../父级的父级目录
// 3、/是根目录
//var_dump($ziyuan);
fwrite($ziyuan,"写了这句话\n");			//使用资源变量,往文件写东西
fclose($ziyuan);						//写完后关闭资源文件;

//实现保存留言
$str="姓名:".$_POST['name'].",内容:".$_POST['content']."\n";
$fh1 = fopen('./msg.txt','a');			
fwrite($fh1,$str);
fclose($fh1);

//实现读取留言
$fh2=fopen('./msg.txt','r');				//r表示只读,将 打开一个文件这个过程 赋给一个资源变量形成一个通道
//正确方法
while(  ( $row=fgetcsv($fh2) )  !=false){  		//fgetcsv() 出错时返回 FALSE，包括碰到文件结束时。
	print_r( $row );echo "<br />";				//通过通道$fh2读取文件,返回一个包含这些字段的数组,遇到换行符结束,最后指针留在下一行开头。
}
fclose($fh2);
/* 错误方法!!!
while(fgetcsv($fh2)!=false){  
	print_r( fgetcsv($fh2)  );echo "<br />";	}
fgetcsv函数的作用是从文件指针中读入一行并解析CSV字段然后返回一个包含这些字段的数组.
执行一次它就读入一行,所以循环中print_r中再次使用fgetcsv($fh2)后,相当于while时读了两行了,所以打印的就是每次的偶数行了.
*/

$fh3=fopen('./msg.txt','r');				
while(  ( $row=fgetcsv($fh3) )  !=false){  		
	echo '<li><a href="../class/class.php">'.$row['0'].'</li>';	
	//   ../class/class.php代表父级目录下的class文件夹下的class.php文件
}
fclose($fh3);


?>

</body>



</html>