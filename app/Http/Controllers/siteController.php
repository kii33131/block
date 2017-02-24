<?php
/**
 * Created by PhpStorm.
 * User: huiting
 * Date: 2017/2/18
 * Time: 9:53
 */

namespace App\Http\Controllers;
use App\article;

class siteController extends Controller
{
    public function index(){

        //return 'index';

        $article =  New article();
        //return $article->test();

        return view('test');
    }

    public function save(){

        return 'save';
    }


    public function login(){

        return redirect()->to('/save');
    }


}
