<?php
setcookie('test', time());		//函数向客户端发送一个名为test，值为time()的 HTTP cookie。
/*
setcookie(name,value,expire,path,domain);  
说明：
name（ Cookie名）可以通过$_COOKIE['name'] 进行访问
value（Cookie的值）
expire（期限/有效期/过期时间）Unix时间戳格式，默认为0，表示浏览器关闭即失效
path（有效路径）如果路径设置为'/'，则整个网站都有效，路径用来控制设置的cookie在哪个路径下有效
domain（有效域）默认整个域名都有效，如果设置了'www.imooc.com',则只在www子域中有效
举例：
setcookie("TestCookie", $value, time()+3600, "/path", "imooc.com"); 
time()+3600  有效期一小时，3600秒

setcookie('test', time());		//设置一个名字叫test的cookie
setcookie('test', '',time()-1);	//删除test的cookie值，此处两个方法都用到了
//第一个time()是cookie的值----第二个time()-1是有效期，注意区分！！！！
删除test的cookie值的两个方法：	
1.value的值设置为空，即''；	
2.时间戳小于当前时间戳，即：expire设置为time()-1。
注意：删除cookie值不要用unset,unset仅仅是删除服务器端的cookie数组值,浏览器中依旧存在

cookie将数据存储在客户端，单个cookie的值最大只能存储4k
cookie是通过HTTP的标头传递的, 客户端根据服务器返回的Set-Cookie来进行cookie的设置。
cookie本身在使用上有一些限制，例如：
1.呼叫setcookie的敘述必須放在<html>標籤之前
2.呼叫setcookie之前，不可使用echo
3.直到網頁被重新載入後，cookie才會在程式中出現
4.setcookie函數必須在任何資料輸出至瀏覽器前，就先送出

session可以方便的存取多种数据类型，而cookie只支持字符串类型
cookie需要进行格式化与加密存储，而session存储在服务端则安全性较高

session
session是将用户的会话数据存储在服务端，没有大小限制，通过一个session_id进行用户识别；
session会自动的对要设置的值进行encode与decode，因此session可以支持/接收任意数据类型，包括数据与对象等。
encode是将指定编码格式的数据转化为字符串，decode是将字符串转化为指定编码格式的数据，这是session数据处理的机制。
删除与销毁session
删除某个session值可以使用PHP的unset函数，删除后就会从全局变量$_SESSION中去除，无法访问。
如果要删除所有的session，可以使用session_destroy函数销毁当前session，session_destroy会删除所有数据，但是session_id仍然存在。
session_destroy并不会立即的销毁全局变量$_SESSION中的值，只有当下次再访问的时候，$_SESSION才为空，因此如果需要立即销毁$_SESSION，可以使用unset函数。
session_destroy是注销所有的session变量,并且结束session会话;
session_unset()并不注销session变量,但把所有的session变量的值清空。

*/
ob_start();						//打开输出控制缓冲,ob是output buffering的缩写，输出缓存的意思
								//使用ob_start();后输出语句就会把要输出的内容输出到缓存区
print_r($_COOKIE); 				//将$_COOKIE数组中的值输出到缓存区
$content = ob_get_contents();		//复制缓存区的数据，以数组形式保存入$content变量
$content = str_replace(" ", '&nbsp;', $content);
ob_clean();						//清空（擦掉）输出缓冲区
header("content-type:text/html; charset=utf-8");
echo '当前的Cookie为：<br>';
echo nl2br($content);			//nl2br 在字符串所有新行之前插入 HTML 换行标记

session_start();
$_SESSION['test'] = time();
var_dump($_SESSION);
unset($_SESSION['test']);
//unset($_SESSION);此函数千万不可使用，它会将全局变量$_SESSION销毁，而且还没有可行的办法将其恢复。用户也不再可以注册$_session变量。
echo $_SESSION['test'];			//提示test没定义
?>