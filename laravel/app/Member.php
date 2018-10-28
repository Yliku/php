<?php 
namespace App;
/*
1、php和html混用，不是纯php代码，必须要加php的结束标签
2、纯php代码的文件不推荐加结束php的标签
好处：
如果这是一个被别人包含的程序，没有这个可以减少很多问题，
比如：不小心在结束标签后加了多余的空格、换行符、制表符等，在渲染页面的时候会输出这些多余的字符，造成页面错位，破坏页面显示，
再如：header、setcookie、session_start，这些动作之前不能有任何的输出，
如果在一个php文件汇总包含了另一个php文件，并且使用了header函数，而这个文件的闭合标签后面多了一个空格，
那么最终页面就会因为在下一个header函数之前做了一个空格的输出而报错，报出“Header already sent”。
举例：
include a.php
session_start();
a.php文件有结束标签，而且标签后多了一行空行或空格，php会认为它是html代码，会输出空格，
这样在调用session_start()函数之前就有了输出，就会报错：Header already sent。

坏处：
在dreamweaver的视图模式下，一团糟。
结论：库文件，或者一些class等文件，纯php代码的文件不推荐加结束标签！！！
*/
class Member extends Model{

}