<?php

namespace App\Http\Controllers\Auth;

use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //todo wang   后台登录 isok
    public function admin_login(Request $request){
        $error = '';
        if($request->method()=='POST'){
           $NameAndPasswod=$request->only(['name','password']);
           $captcha = $request->get('captcha');
            $captcha_session=$request->session()->get('milkcaptcha');
           if($captcha!=$captcha_session){

               //var_dump('yes');
               $error = '验证码错误';
               //echo 'aa';
               //exit;


           }else{
               $bool = Auth::guard('admin')->attempt($NameAndPasswod);

               //var_dump('ss');
               //exit;
               //['list' => $list]
           }
           //$bool = Auth::guard('admin')->attempt($NameAndPasswod);

        }

        if($error){
            //$view = View::make('home.index');
            return view('auth.login_admin')->with('errork',$error);
        }else{

            return view('auth.login_admin')->with('errork','');
        }

    }


    public function captcha(Request $request)
    {
        ob_clean();
        //$tmp = 1;
        //生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 100, $height = 40, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();

        //把内容存入session
        $request->session()->put('milkcaptcha', $phrase);

        //$a=$request->session()->get('milkcaptcha');
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
    }
}
