<?php 
//正则表达式，
//正则匹配preg_match($p,$str,$m);最后一个变量$m作为数组，用来接收匹配成功的值

$p='/苹果/';			//要匹配/搜索的内容，常用模式匹配  $p='/定义一个模式/'  
$str='我喜欢吃苹果';	//在$str里搜索
preg_match($p,$str,$preg_match);
print_r( $preg_match);
//echo $preg_match;    输出错误，$preg_match是数组，想用echo来输出得用echo $preg_match[0];
echo '<br />用echo输出：',$preg_match[0],'<br />','<br />';

$p1='/^我[^\s]+苹果$/';				//  方括号表示开始字符类定义！！！
//^符号在方括号里面表示字符类取反，\s表示匹配任意的空白符，包括空格，制表符，换行符
$p2='/^我[^\s]+(苹果|香蕉)$/';		//  |符号表示可选分支
//小括号匹配的内容会被添加到 preg_match($p,$str,$match); 中的$match数组里面
$p11='/^(我)[^\s]+苹果$/';	
preg_match($p1,$str,$preg_match);
print_r( $preg_match);
preg_match($p2,$str,$preg_match);
print_r( $preg_match);
preg_match($p11,$str,$preg_match);
print_r( $preg_match);
echo '<br />';

$p3='/[\w\.\-]+@[a-z0-9\-]+\.(com|cn)/';	
//  方括号表示开始字符类定义！[\w\.\-]+表示包含：(\w)字母、数字、下划线、（\.）点、（\-）横杠 的（[]）字符（+）串。
//  同理，[a-z0-9\-]+ 表示包含： （a-z）a-z字母、（0-9）0-9数字、（\-）横杠 的（[]）字符（+）串。
$str3='我的邮箱是：Spark.eric@imooc.com';
preg_match($p3,$str3,$m);
print_r( $m);
echo '<br />';

$p4='/编号[0-9]{2}/';	//用花括号控制匹配个数
$str4='编号89757';
preg_match($p4,$str4,$m);
print_r( $m);
echo '<br /><br />';

$p = "|<[^>]+>(.*?)</[^>]+>|i";		
//分界符是| ,模式中的 / 就不需要转义，等价于$p = "/<[^>]+>(.*?)<\/[^>]+>/i";
//[^>]表示不为>的任意一个字符
$str = "<b>example: </b><div align=left>this is a test</div>";
preg_match_all($p, $str, $matches);
print_r($matches);



 ?>