<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){
        // バリデーション
        $request->validate([
            'body' => 'required|string|max:500',
            'image' => 'nullable|image|max:10240', // 10MBまでOK
        ]);

        // 画像がある場合は保存
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        }

        // DB保存
        \App\Models\Post::create([
            'user_id' => auth()->id(),
            'body' => $request->body,
            'image_path' => $imagePath,
        ]);

        // 投稿後にタイムラインへ戻す
        return redirect()->route('dashboard');
        }

    public function index(){
        // 投稿を新しい順に取得
        $posts = \App\Models\Post::with('user')->latest()->get();

        return view('posts.index', compact('posts'));
    }


}
