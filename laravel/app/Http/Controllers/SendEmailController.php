<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;	//注意引入

class SendEmailController extends Controller {
	// 方法一：发送纯文本邮件，传统格式，Mail::raw();	
    public function send_raw() {
		Mail::raw('邮件内容：很容易被误认为垃圾邮件而返回 533错误码，要编辑好内容',function($message){
			// $message->from('yliku_test@163.com','yliku');	//邮件发送人的地址（不可自定义），发送的人姓名（可自定义）
			$message->subject('mko00712你好，请查收');	//指定邮件主题
			$message->to('mko00712@163.com');			//指定邮件发送地址
		});
		dd('成功1');
    } 

    // 方法二：发送html格式，Mail::send();
    public function send_html(){
		$content = 'mko00712你好，我发的第二份邮件';      // Mail::send()的返回值为空，所以可以其他方法进行判断 
		Mail::send('email.test', ['content'=>$content], function($message){ //给 views/email/test.blade.php 视图模板传递参数
	    //三个参数：第一个为引用的view模板，第二个为给模板传递的变量（邮箱发送的文本内容），第三个为一个闭包，参数绑定Mail类的一个实例。
			$email = 'mko00712@163.com'; 
			$message->to($email)->subject('这是第二份 mail send'); 	//可以连写
		});     // 返回的一个错误数组，利用此可以判断是否发送成功
		dump('成功2');
    }
}
