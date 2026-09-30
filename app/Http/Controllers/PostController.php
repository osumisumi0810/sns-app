<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){
        // とりあえず動作確認用
        return '投稿受け取りました！';
    }


}
