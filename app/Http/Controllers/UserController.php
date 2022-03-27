<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(string $name)
    {
        $tags = Tag::ranking(50);
        $user = User::where('name', $name)->first();
        if(!$user) {
            return redirect()->route('posts.index');
        }
        $posts = $user->posts;

        return view('users.index', compact('tags', 'user', 'posts'));
    }

    public function likes(string $name)
    {
        $tags = Tag::ranking(50);
        $user = User::where('name', $name)->first();
        if(!$user) {
            return redirect()->route('posts.index');
        }
        $posts = $user->likes;

        return view('users.likes', compact('tags', 'user', 'posts'));
    }
}
