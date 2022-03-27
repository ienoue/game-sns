<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(string $name)
    {
        $user = User::where('name', $name)->first();
        if(!$user) {
            return redirect()->route('posts.index');
        }
        $posts = $user->posts;

        return view('users.index', compact('user', 'posts'));
    }

    public function likes(string $name)
    {
        $user = User::where('name', $name)->first();
        if(!$user) {
            return redirect()->route('posts.index');
        }
        $posts = $user->likes;

        return view('users.likes', compact('user', 'posts'));
    }

    public function followers(string $name)
    {
        $user = User::where('name', $name)->first();
        if(!$user) {
            return redirect()->route('posts.index');
        }
        $followers= $user->followers;

        return view('users.followers', compact('user', 'followers'));
    }

    public function followees(string $name)
    {
        $user = User::where('name', $name)->first();
        if(!$user) {
            return redirect()->route('posts.index');
        }
        $followees= $user->followees;

        return view('users.followees', compact('user', 'followees'));
    }
}
