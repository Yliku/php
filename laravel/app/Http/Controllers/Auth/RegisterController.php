<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // 登陆成功，重定向到 home路由
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $messages = [       //自定义错误信息
            'email.unique' => '重复的邮箱',
            'required' => '必填项',
        ];

        // make()传入参数进行验证，传递给 make 方法的第一个参数是需要验证的数据，第二个参数是要应用到数据上的验证规则。
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            // 'captcha' => 'required',
        ],$messages);       //插入错误信息的参数
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register(Request $request)
    {
        // 调用控制器中的 validator方法对 传入的所有参数（name\email\password）进行验证，$request->all() 输出所有键值的数组
        // $this->validator($request->all())->validate();
        $res = $this->validator($request->all());
        if ($res->fails()) {  //验证失败，直接返回
            return $res->errors();
            // return $res->errors()->first('email', '<p>:message</p>');
        }

        // 调用控制器中 create 方法创建用户
        // 使用 $user 初始化 Redistered 对象
        // 通过 event() 函数触发注册事件
        event(new Registered($user = $this->create($request->all())));
        // 获取 guard 实例，并通过 guard 登录创建的用户
        $this->guard()->login($user);
        // 根据 $user 注册信息进行页面跳转
        return $this->registered($request, $user)
                        ?: 'success';
    }
}
