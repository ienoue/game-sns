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
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function toggle(User $user)
    {
        abort_if(!Gate::allows('toggle-follow', $user), 403);

        if ($user->isFollowedBy(Auth::user())) {
            $this->unFollow($user);
        } else {
            $this->follow($user);
        }

        $user->refresh();
        $state = $user->followBtnStatus();

        return [
            'name' => $user->name,
            'visual' => $state['btnVisual'],
            'text' => $state['btnText'],
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
