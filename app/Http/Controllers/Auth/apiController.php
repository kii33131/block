<?php

namespace App\Http\Controllers\Auth;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class apiController extends Controller
{

    public function index(){
        //$NameAndPasswod = ['email'=>'3313@qq.com','password'=>'jiangxi'];
        //$bool = \Auth::guard('web')->attempt($NameAndPasswod);
        //var_dump($bool);
        //exit;
        $list = Post::orderBy('id', 'desc')->paginate(2);
        $li=$list->toArray();
        $li = json_encode($li);

        echo '<pre>';
        print_r($li);
        exit;


    }
    //
}
