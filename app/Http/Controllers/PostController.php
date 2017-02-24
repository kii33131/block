<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;

class PostController extends Controller
{

    public function create(){

        return view('post.creat');
    }

    public function save(Request $request){
        $rules = [
            'title' => 'required|max:10',
        ];

       // var_dump('ss');
        //exit;
        $this->validate($request, $rules);
        $post = new Post();
        $post->title = $request->get('title');
        $post->content = $request->get('content');
        $post->user_id = \Auth::id();
        if ($post->save()) {
            return redirect()->to('post');
        }

        back();
    }


    public function index(){


        $list = Post::orderBy('id', 'desc')->paginate(2);
       // $li=$list->toArray();


        return view('post.index', ['list' => $list]);//->withList($list);
    }



}
