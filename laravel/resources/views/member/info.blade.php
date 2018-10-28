<?php 
echo 'member下的默认模板：<br>';
 ?>
后缀有.blade.php代表的是视图的某一个文件名下的默认文件，<br>
比如info.blade.php，指的是调用info视图，默认文件就是指向info.blade.php';<br>
调用传递的参数name：{{$name}}<br>
调用传递的参数age：{{$age}}<br>
只要php代码有一处出错，无论在最上，还是最下，整个页面将显示不了，会报错！！！<br>
