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
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $posts = $user->posts()->with('tags', 'user', 'likes', 'comments')->paginate(10)->onEachSide(2);

        return view('users.index', compact('user', 'posts'));
    }

    /**
     * 特定ユーザのいいねした記事一覧を表示
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function likes(User $user)
    {
        $posts = $user->likes()->with('tags', 'user', 'likes', 'user.partner', 'comments')->paginate(10)->onEachSide(2);

        return view('users.likes', compact('user', 'posts'));
    }

    /**
     * 特定ユーザのフォロワー一覧を表示
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function followers(User $user)
    {
        $followers = $user->followers()->with('followers', 'partner')->paginate(10)->onEachSide(2);

        return view('users.followers', compact('user', 'followers'));
    }

    /**
     * 特定ユーザがフォローしているユーザ一覧を表示
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function followees(User $user)
    {
        $followees = $user->followees()->with('followers', 'partner')->paginate(10)->onEachSide(2);

        return view('users.followees', compact('user', 'followees'));
    }

    /**
     * 特定ユーザのモンスター一覧を表示
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function monsters(Request $request, User $user)
    {
        $sort = $request->sort;

        $monsters = $user->monstersSortedBy($sort)->with('rarity')->paginate(10)->onEachSide(2);
        return view('users.monsters', compact('user', 'monsters', 'sort'));
    }

    /**
     * 特定ユーザの対戦履歴一覧を表示
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function battles(User $user)
    {
        $battles = $user->battles()->with('postMonster', 'post.user', 'userMonster', 'user', 'winUser')->paginate(10)->onEachSide(2);
        return view('users.battles', compact('user', 'battles'));
    }

    /**
     * 特定ユーザのコメント一覧を表示
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function comments(User $user)
    {
        $comments = $user->comments()->with('user', 'post')->paginate(10)->onEachSide(2);
        return view('users.comments', compact('user', 'comments'));
    }
}
