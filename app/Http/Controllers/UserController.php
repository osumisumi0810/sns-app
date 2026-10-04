<?php

namespace App\Http\Controllers;

use App\Models\User;

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

}