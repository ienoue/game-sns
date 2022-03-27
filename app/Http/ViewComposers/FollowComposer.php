<?php

namespace App\Http\ViewComposers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class FollowComposer
{
    public function compose(View $view)
    {
        $user = User::where('name', request('name'))->first();
        if (!$user) {
            return;
        }
        if ($user->isFollowedBy(Auth::user())) {
            $followBtnVisual = 'btn-primary';
            $followIcon = 'fa-user-check';
            $followBtnText = 'フォロー中';
        } else {
            $followBtnVisual = 'btn-outline-primary';
            $followIcon = 'fa-user-plus';
            $followBtnText = 'フォローする';
        }

        $view->with(compact('followBtnVisual', 'followIcon', 'followBtnText'));
    }
}
