<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * 特定ユーザの投稿一覧を表示
     *
     * @param  String  $post
     * @return \Illuminate\Http\Response
     */
    public function index(string $name)
    {
        $user = User::where('name', $name)->first();
        if (!$user) {
            return redirect()->route('posts.index');
        }
        $posts = $user->posts;

        return view('users.index', compact('user', 'posts'));
    }

    /**
     * 特定ユーザのいいねした記事一覧を表示
     *
     * @param  String  $post
     * @return \Illuminate\Http\Response
     */
    public function likes(string $name)
    {
        $user = User::where('name', $name)->first();
        if (!$user) {
            return redirect()->route('posts.index');
        }
        $posts = $user->likes;

        return view('users.likes', compact('user', 'posts'));
    }

    /**
     * 特定ユーザのフォロワー一覧を表示
     *
     * @param  String  $post
     * @return \Illuminate\Http\Response
     */
    public function followers(string $name)
    {
        $user = User::where('name', $name)->first();
        if (!$user) {
            return redirect()->route('posts.index');
        }
        $followers = $user->followers;

        return view('users.followers', compact('user', 'followers'));
    }

    /**
     * 特定ユーザがフォローしているユーザ一覧を表示
     *
     * @param  String  $post
     * @return \Illuminate\Http\Response
     */
    public function followees(string $name)
    {
        $user = User::where('name', $name)->first();
        if (!$user) {
            return redirect()->route('posts.index');
        }
        $followees = $user->followees;

        return view('users.followees', compact('user', 'followees'));
    }
}
