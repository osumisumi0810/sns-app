<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Like;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'body' => 'required|string|max:1000',
            'image' => 'nullable|image|max:2048',
        ], [
            'body.required' => '本文を入力してください',
        ]);

        $post = new Post();
        $post->body = $validated['body'];
        $post->user_id = auth()->id();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('posts', 'public');
            $post->image_path = $path;
        }

        $post->save();

        return redirect()->route('posts.index');
    }


    public function destroy(Post $post){
        if ($post->user_id !== auth()->id()) {
            abort(403);
        }

        if ($post->image_path) {
            Storage::disk('public')->delete($post->image_path);
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', '投稿を削除しました');
    }


    public function edit(Post $post){
        if ($post->user_id !== auth()->id()) {
            abort(403);
        }

        return view('posts.edit', compact('post'));
    }


    public function update(Request $request, Post $post){
        if ($post->user_id !== auth()->id()) {
            abort(403);
        }

        $validated = $request->validate([
            'body' => 'required|string|max:1000',
            'image' => 'nullable|image|max:2048',
        ], [
            'body.required' => '本文を入力してください',
        ]);

        $post->body = $validated['body'];

        if ($request->hasFile('image')) {
            if ($post->image_path) {
                Storage::disk('public')->delete($post->image_path);
            }
            $path = $request->file('image')->store('posts', 'public');
            $post->image_path = $path;
        }

        $post->save();

        return redirect()->route('posts.index')->with('success', '投稿を更新しました');
    }


    public function index(){
        $posts = Post::with('user')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('posts.index', compact('posts'));
    }


    public function like(Post $post){
        Like::firstOrCreate([
            'user_id' => auth()->id(),
            'post_id' => $post->id,
        ]);

        return back();
    }


    public function unlike(Post $post){
        Like::where('user_id', auth()->id())
            ->where('post_id', $post->id)
            ->delete();

        return back();
    }


}
