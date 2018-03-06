<?php 
//正则匹配的搜索和替代
$str='January 25, 2018';
$pattern='/(\w+) (\d+), (\d+)/i';		//注意字符串必须加圆括号，才能被$1、$2、$3识别替代	
$replacement='$3,$1,$2';			//$指向匹配成功的数组！！！！$0是匹配成功的完整内容，$1是子组1，$2是子组2，以此类推..
echo '替代前：',$str,'<br>替代后：';
echo preg_replace($pattern, $replacement, $str),'<br>';	//replacement替代者
echo preg_replace($pattern, $replacement, 'June 01, 2018'),'<br><br>';

//用正则替换来去掉多余的空格与数字
$str1='我喜欢吃苹果，苹果的英文是：Apple,apple';
$p1='/\w+/';								//小写w匹配字母、数字、下划线，等价于“[A-Za-z0-9_]”
$a1=preg_replace($p1,'要替换的内容',$str1);	//匹配成功的将被单引号内的内容替换
preg_match_all($p1,$str1,$b1);				
/*
preg_match($p,$str,$match)  		只匹配一次就结束
preg_match_all($p,$str,$match)  	匹配所有
相同点：
1、匹配成功后元素都存入一维数组$match[0]下，preg_match的$match[0]里面只有一个元素，而preg_match_all有多个元素；
2、如果模式包含多个子组（即圆括号的字符），匹配成功的第一个子组都存入一维数组$match[1]下，第二个子组存入$match[2]，以此类推；
      同样的，
      preg_match的$match[1]里面只有一个元素，总结：$match为一维数组；
      而preg_match_all的$match[1]有多个元素，总结：$match为二维数组；；
*/
print_r( $b1);
echo '<br>',$a1,'<br>';

$str2 = '主要有以下几个文件：index.php, style.css, common.js';
//将目标字符串$str中的文件名替换后增加em斜体标签
$p2='/(\w+\.\w+)/';
$a2=preg_replace($p2,'<em>$1</em>',$str2);	//$指向匹配成功的数组！！！！$0是匹配成功的完整内容，$1是子组1，$2是子组2，以此类推..
//$p='/\w+\.\w+/i';							//对比模式没有子组的情况，就得用$0!!
//$str=preg_replace($p,'<em>$0</em>',$str);	//$指向匹配成功的数组！！！！$0是匹配成功的完整内容，$1是子组1，$2是子组2，以此类推..
echo $a2;




 ?>