<?php

namespace App\Http\Controllers;

use App\Events\UserLiked;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class LikeController extends Controller
{
    /**
     * いいねの状態を切り替える
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function toggle(Post $post)
    {
        abort_if(!Gate::allows('toggle-like', $post), 403);

        $count = $post->likes->count();
        $user = Auth::user();
        $isBattled = $user->isBattledWith($post);

        if ($post->isLikedby($user)) {
            $this->unlike($post);
            $count--;
        } else {
            $this->like($post);
            $count++;
        }

        $post->refresh();
        $state = $post->likeBtnStatus();

        return [
            'count' => $count,
            'visual' => $state['btnVisual'],
            'hasWon' => !$isBattled ? $user->hasWonFor($post) : '',
        ];
    }

    /**
     * 対象の投稿にいいねを追加する
     * また、UserLikedイベントを発火する
     *
     * @param  \App\Models\Post  $post
     */
    public function like(Post $post)
    {
        $post->likes()->detach(Auth::id());
        $post->likes()->attach(Auth::id());
        event(new UserLiked($post));
    }

    /**
     * 対象の投稿のいいねを解除する
     *
     * @param  \App\Models\Post  $post
     */
    public function unlike(Post $post)
    {
        $post->likes()->detach(Auth::id());
    }
}
