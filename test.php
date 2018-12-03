<?php 

echo microtime(true);	
//返回当前 Unix 时间戳的微秒数。
//默认值为false返回字符串，TRUE返回浮点数，
//默认返回字符串 "microsec sec" ，其中 sec 为自 Unix 纪元（0:00:00 January 1, 1970 GMT）起的秒数，microsec 为微秒部分。

echo '<br>';
echo __DIR__;	//绝对路径，上级dir文件夹
echo '<br>';
echo __file__;	//绝对路径，file文件名
echo '<br>';

$a = [1,2,'3aaa'];
echo array_pop($a);	//删除数组中的最后一个元素，返回值是被删除的元素


/** 
 * Collection that wraps a numeric array. 
 * All five public methods are needed to implement 
 * the Iterator interface. 
 */ 
class Collection implements Iterator{ 
	private $_index = 0;	//数据的下标
	private $_content;		//所有数据，可以是数组，

	public function __construct(array $content){ 
		$this->_content = $content; 
	} 
	public function rewind(){	//重置迭代器
		$this->_index = 0; 
	} 
	public function valid(){	//验证目前的数据是否存在
		return isset($this->_content[$this->_index]); 
	} 
	public function current(){	//当前数据的位置
		return $this->_content[$this->_index]; 
	} 
	public function key(){		//返回当前的下标
		return $this->_index; 
	}
	public function next(){		//下一个数据的下标
		$this->_index++; 
	} 
} 
 
// $array = array('A'=>'A1', 'B'=>'B1', 'C'=>'C1', 'D'=>'D1'); //二维数组不行？？？？？
$array = array('A', 'B', 'C', 'D'); 
echo "<br>迭代器测试<br>Collection:<br> "; 
foreach (new Collection($array) as $key => $value){ 
	echo "$key => $value <br>"; 
}

echo '正则匹配<br>';
$preg1 = '/[\[]{3}([0-9A-Za-z_-]+)[\]]{3}/i';
$preg2 = '/(\[){3}([0-9A-Za-z_-]+)(\]){3}/i';

// [\[]{3} ———[]是定义匹配的字符范围，{3}表示匹配三个， \[ 表示转义，意思就是取这个[；所以这个正则表达式是取 [ 三个。
$a = '[[[121]]] 测试测试 [[[4444444]]]';
preg_match($preg1, $a,$match1);
preg_match($preg2, $a,$match2);
var_dump($match1);
var_dump($match2);



?>