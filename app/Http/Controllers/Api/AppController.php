<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\App;
use App\Http\Requests;
//use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AppController extends Controller
{
    //

   public function __construct(Request $request){


       $appid = $request->get('app_id');
       $app_secert = $request->get('app_secert');
       $dd= App::orderBy('id', 'desc')->where('app_secret',$app_secert)->get();
       if(empty($dd)){

           $msg = ['code'=>400,'msg'=>'错误的app_secert'];
           return  $msg =   $msg->toJson();
          // exit;
       }else{

           $dd = $dd->toArray();
           dd($dd);
       }
        //$dd=App::Orderby('id','desc')->where('app_secert',$app_secert);
       // $dd = $dd->toArray();
      // dd($dd);

      // $appid = $request->get('app_id');
     //  exit('ss');

   }


   public function login(Request $request){

        $email = $request->get('email');
        $password = $request->get('password');
        $NameAndPasswod = ['email'=>$email,'password'=>$password];
        $bool = \Auth::guard('web')->attempt($NameAndPasswod);

        var_dump($bool);





   }

}
