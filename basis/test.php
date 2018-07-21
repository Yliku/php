<title>PHP中点和逗号的测试</title>
<?php	//点和逗号的测试,涉及到字符串的强制转换
echo 1+5;
echo "<br /><br />";

echo '1+5='."1+5"."<br />";
echo '1+5='."5+1","<br /><br />";	

echo '1+5=',1,"<br />";				//用逗号，不需要空格
echo '1+5='. 1,"<br />";				//用连接符，需要空格，否则报错
echo '1+5=',100+200,"<br /><br />"; 	//用逗号，常用于输出多个变量，不影响输出
//省去了字符串拼接的步骤，理论上在 echo 的时候用“逗号”会快一点。

//换成用连接符，注意了，看以下测试：
echo '注意了！<br />';		
echo '1+5='. 100,"<br />";			//注意 .和100之间需要空格，否则报错
echo '1+5='. 200,"<br />";				
echo '1+5='. 100+200,"<br />";		//此处结果开始异常了
echo '1+5='. 200+100,"<br />";
echo ('1+5='. 200)+100,"<br />"; 		//从与上面的结果相同可以看出，连接符的优先级高于运算符
echo "<br />";		

//先来看看字符串的强制转换
echo (int)'abc1';	echo "<br />";	
echo (int)'1abc';	echo "<br />";
echo (int)'22abc';	echo "<br /><br />";
//结果：将一个字符串强制转换成一个数字，PHP会去搜索这个字符串的开头，
//如果开头是数字就转换，如果不是就直接返回0.

//回到测试的问题
echo '结果分析：';
echo '1+5='. 100+200,"<br />";
/* 程序是这样执行的，
 * 先连接 '1+5='.100 结果是字符串 '1+5=100'，
 * 然后执行运算，字符串要与数字进行运算会被系统强制转换，字符串'1+5=100'转换后的值就是1，
 * 最后1+200=201.
 */
 /* 用逗号为什么没问题呢？
	手册上说了：用逗号是multiple parameters .也就是说是多参数，
	换句话说，逗号分隔开的就相当于是N个参数.也就是说把echo当个函数用，
	这样的话，echo会对每个参数先进行计算，最后再进行分别输出，所以我们用逗号就不存在上面的问题了
 */

$staff=array("a"=>'123','b'=>'345','c'=>'456','d'=>'789');
foreach($staff as $key=>$key1){
	echo $key . $key1 . '<br>';
}

$staff=array("a"=>'123','b'=>'345','c'=>'456','d'=>'789');
foreach($staff as $key){
	echo $key . '<br>';
}

echo '冒泡排序：<br>排序前：';
$a=array(112,44,31,343,53,58,55,13);
foreach($a as $k=>$value){
	echo $value .' ';
}
echo '<br>'.sizeof($a);
echo '<br>'.'排序后：';
for($i=0;$i<8;$i++){
	for($j=0;$j<8-$i-1;$j++){
		if($a[$j]>$a[$j+1]){
			$temp=$a[$j];
			$a[$j]=$a[$j+1];
			$a[$j+1]=$temp;
		}
	}
}
foreach($a as $k=>$value){
	echo $value .' ';
}

echo '<br>设计模式之：单例模式<br>';
class A{
	private static $instance=NULL;
	final private function __construct(){}
	final private function __clone(){}
	public static function getInstance(){
		if( empty(self::$instance) ){
			self::$instance = new self();
		}
		return self::$instance;
	}
}
$b1=A::getInstance();
$b2=A::getInstance();
$b3=A::getInstance();
$b4=A::getInstance();
var_dump($b1);
var_dump($b2);
var_dump($b3);
var_dump($b4);

$path = "C:/wamp64/www/test/MVC";
echo "<br>遍历文件夹下的所有文件，方法一：<br>";
function get_all_files( $path ){
	$list = array();
	foreach( glob( $path . '/*') as $item ){
	if( is_dir( $item ) ){
		$list = array_merge( $list , get_all_files( $item ) );
	}
	else{		$list[] = $item;		}
	}
	return $list;
}
var_dump(get_all_files($path));

echo "<br>遍历文件夹下的所有文件，方法二：<br>";
function read_all ($dir){
    if(!is_dir($dir)) return false;
    $handle = opendir($dir);
    if($handle){
        while(($fl = readdir($handle)) !== false){
            //$path=iconv("utf-8","gb2312",$path);将字符串的编码从UTF-8转为GB2312格式
            //iconv第三个参数必须是字符串！！！！！！！！！！！！
            //$temp = $dir.DIRECTORY_SEPARATOR.$fl;
            $temp = iconv('GBK','utf-8',$dir.DIRECTORY_SEPARATOR.$fl);//转换成utf-8格式
            //如果不加  $fl!='.' && $fl != '..'  则会造成把$dir的父级目录也读取出来
            if(is_dir($temp) && $fl!='.' && $fl != '..'){
                echo '目录：'.$temp.'<br>';
                read_all($temp);
            }else{
                if($fl!='.' && $fl != '..'){
                    echo '文件：'.$temp.'<br>';
                }
            }
        }
    }
}
read_all($path);

echo "<br>遍历文件目录，方法一：<br>";
function refresh($dir){
    if ($headle=opendir($dir)){
        while ($file=readdir($headle)){
		$file=iconv("gb2312","utf-8",$file); 
            if ($file!='.' && $file!='..'){
                echo "文件".$file."在文件夹".$dir."下<br />";
            }
        }
        closedir($headle);
    }
}
refresh("$path");

echo "<br>遍历文件目录，方法二：<br>";
if(is_dir($path)){
	if($dire = scandir($path)){
		foreach($dire as $value){
		$value = iconv("gb2312","utf-8",$value);
		echo $value."<br>";
		}
	}else{
		echo "没有打开文件夹";
	}
	}else{
		echo "不是路径";
}


echo "<br>遍历文件目录，方法三：<br>";
$files1 = scandir($path);
foreach($files1 as $v){
	if (!is_dir($v) && strpos($v,".")!=false ){
		$v = iconv('gb2312','utf-8',$v);
		echo $v."<br />";
	}
}
 


?>