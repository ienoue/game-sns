<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class FollowController extends Controller
{
    /**
     * フォローの状態を切り替える
     *
     * @param  String  $name
     * @return \Illuminate\Http\Response
     */
    public function toggle(String $name)
    {
        $user = User::where('name', $name)->first();
        abort_if(!Gate::allows('toggle-follow', $user), 403);

        if ($user->isFollowedBy(Auth::user())) {
            $this->unFollow($user);
            $visual = 'btn btn-follow btn-outline-primary';
            $icon = 'fa-solid fa-user-plus';
            $text = 'フォローする';
        } else {
            $this->follow($user);
            $visual = 'btn btn-follow btn-primary';
            $icon = 'fa-solid fa-user-check';
            $text = 'フォロー中';
        }

        return [
            'name' => $name,
            'visual' => $visual,
            'icon' => $icon,
            'text' => $text,
        ];
    }

    /**
     * 引数のユーザをフォローする
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function follow(User $user)
    {
        $user->followers()->detach(Auth::id());
        $user->followers()->attach(Auth::id());
    }

    /**
     * 引数のユーザをフォロー解除する
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function unFollow(User $user)
    {
        $user->followers()->detach(Auth::id());
    }
}
