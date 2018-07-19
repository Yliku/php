<html>
<head><title>文章管理页</title></head>	
<body>
<?php 
//文章管理列表
require_once('connect.php');
$query = mysqli_query($con,'select * from article order by dateline desc');		//根据添加时间倒序排列，desc降序
if($query && mysqli_num_rows($query)){											//当结果集$query存在且行数不为0的时候
	while( $row=mysqli_fetch_assoc($query)){									//将结果集$query的数据转换为一条条关联数组$row
		$data[]=$row;			//将row关联数组添加进去$data[]二维数组里面，$data后面如果是方括号代表将$row添加到$data里面，而不是赋值
	}
}

 ?>
<table width="500" border="1"  cellpadding="2" cellspacing="0" bgcolor="BABABA">
<!-- width/height设置的是整个table的宽度和高度！！！border=1设置包括标签table，tr，td的边框粗细，
	cellspacing合并标签tr，个td的空隙；cellpadding单元格边框与内容之间的距离		-->
	<tr><td height="50" align="center" colspan="4"><strong>文章管理列表</strong></td></tr>
	<!--colspan设置文章跨列-->
	<tr height="40">
		<td><strong>编号</strong></td>	<!--<strong>标签意思是加强，表示该文本比较重要，提醒读者／终端注意。-->
		<td><b>文章标题</b></td>			<!--<b>这个标签对应 bold，即文本加粗，其目的仅仅是为了加粗显示文本。-->
		<td><b>发布时间</b></td>
		<td><b>操作</b></td>
	</tr>	
	<!--插入php进行循环打印数据列表-->
	<?php 
		if(!empty($data)){
			foreach($data as $value){
	?>	<!--此处的php结束符并不代表php代码在此处结束，因为php中的花括号没结束，此处是要插入html标签，
			所以?>在此处起到分割的作用，分割php代码和html标签-->
	<tr height="10">
		<td bgcolor="FFFFFF"><?php echo $value['id']?></td>									<!--编号-->
		<td bgcolor="FFFFFF"><?php echo $value['title']?></td>								<!--文章标题-->
		<td bgcolor="FFFFFF"><?php echo date("y年m月d日 H:i:s",$value['dateline'])?></td>		<!--发布时间-->
		<td bgcolor="FFFFFF"><a href="article.modify.php?id=<?php echo  $value['id']?>">修改</a> 
			<a href="article.del.handle.php?id=<?php echo  $value['id']?>">删除</a></td> 
	</tr>	

	<?php
			}
		}
	?>
	<!--循环结束-->
</table>
<a href="article.add.php">新增文章</a>
<form action="article.search.php" method="get">
	<input type="text" name="key" placeholder="仅限文章标题搜索">
	<input type="submit" value="Search">
</form>


</body>

</html>