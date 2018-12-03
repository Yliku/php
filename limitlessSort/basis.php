<?php 
//无限极分类
/*
$con = mysqli_connect('localhost','root','123');
mysql_select_db('deeploop');
$sql = "INSERT INTO deeploop(id,pid,catename,cateorder,createtime) VALUES
(1,0,'新闻',0,0), 
(2,0,'图片',0,0), 
(3,1,'国内新闻',0,0), 
(4,1,'国际新闻',0,0), 
(5,3,'北京新闻',0,0), 
(6,4,'美国新闻',0,0), 
(7,2,'美女图片',0,0), 
(8,2,'风景图片',0,0), 
(9,7,'日韩明星',0,0), 
(10,9,'韩国明星',0,0);"
*/

$array = array(
	array('id' => 1, 'pid' => 0, 'name' => '河北省'),
	array('id' => 2, 'pid' => 0, 'name' => '北京市'),
	array('id' => 3, 'pid' => 1, 'name' => '邯郸市'),
	array('id' => 4, 'pid' => 2, 'name' => '朝阳区'),
	array('id' => 5, 'pid' => 2, 'name' => '通州区'),
	array('id' => 6, 'pid' => 4, 'name' => '望京'),
	array('id' => 7, 'pid' => 4, 'name' => '酒仙桥'),
	array('id' => 8, 'pid' => 3, 'name' => '永年区'),
	array('id' => 9, 'pid' => 1, 'name' => '武安市'),
);

function getTree($array, $pid =0, $level = 0){
    static $list = [];					//声明静态数组,避免递归调用时,多次声明导致数组覆盖
    foreach ($array as $key => $value){	
    	// var_dump($value);
        if ($value['pid'] == $pid){		//第一次遍历,找到父节点为根节点的节点 也就是pid=0的节点
            $value['level'] = $level;	//父节点为根节点的节点,级别为0，也就是第一级
            $list[] = $value;			//把数组放到list中
            unset($array[$key]);		//把这个节点从数组中移除,减少后续递归消耗
            getTree($array, $value['id'], $level+1);	//开始递归,查找父ID为该节点ID的节点,级别则为原级别+1
		}
    }
    return $list;
}
// 获得递归完的数据,遍历生成分类
$array = getTree($array);
foreach($array as $value){
	echo str_repeat('--', $value['level']), $value['name'].'<br />';
	//str_repeat('A',5); 把字符串A重复5次，返回新的字符串
}

 ?>