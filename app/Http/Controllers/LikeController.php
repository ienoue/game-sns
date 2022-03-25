<?php

namespace App\Http\Controllers;

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
        if ($post->isLikedby(Auth::user())) {
            $this->unlike($post);
            $isLiked = 'false';
            $count--;
        } else {
            $this->like($post);
            $isLiked = 'true';
            $count++;
        }

        return [
            'isLiked' => $isLiked,
            'count' => $count,
        ];
    }

    /**
     * 対象の投稿にいいねを追加する
     *
     * @param  \App\Models\Post  $post
     */
    public function like(Post $post)
    {
        $post->likes()->detach(Auth::id());
        $post->likes()->attach(Auth::id());
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
