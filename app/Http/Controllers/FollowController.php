<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function toggle(String $name)
    {
        $user = User::where('name', $name)->first();

        if ($user->id === Auth::id())
        {
            return abort('404', 'Cannot follow yourself.');
        }
        if($user->isFollowedBy(Auth::user())) {
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
     * 
     *
     * 
     */
    public function follow(User $user)
    {
        $user->followers()->detach(Auth::id());
        $user->followers()->attach(Auth::id());
    }

    /**
     * 
     *
     * 
     */
    public function unFollow(User $user)
    {
        $user->followers()->detach(Auth::id());
    }
}
