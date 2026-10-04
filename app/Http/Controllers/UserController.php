<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function show(User $user){
        return view('users.show', compact('user'));
    }

    public function posts(User $user){
        // このユーザーの投稿だけ取得
        $posts = $user->posts()->latest()->get();

        return view('users.posts', compact('user', 'posts'));
    }

    public function updateImage(Request $request, User $user){
        $request->validate([
            'profile_image' => 'image|max:2048'
        ]);

        if ($request->hasFile('profile_image')) {
            $path = $request->file('profile_image')->store('profile_images', 'public');
            $user->profile_image = $path;
            $user->save();
        }

        return back();
    }

    public function edit(User $user){
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user){
        $request->validate([
            'name' => 'required|max:50',
            'bio' => 'nullable|max:200',
        ]);

        $user->name = $request->name;
        $user->bio = $request->bio;
        $user->save();

        return redirect()->route('users.show', $user)->with('success', 'プロフィールを更新しました！');
    }



}