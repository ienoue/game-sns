<?php

namespace App\Listeners;

use App\Events\UserLiked;
use App\Models\Battle;
use App\Models\Post;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

class MakeBattle
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * 対戦結果からBattleモデルを作成する
     *
     * @param  \App\Events\UserLiked  $event
     * @return void
     */
    public function handle(UserLiked $event)
    {
        $user = Auth::user();
        $post = $event->post;
        if ($user->isBattledWith($post)) {
            return;
        }
        $winner = $this->battle($post);

        Battle::create([
            'user_id' => $user->id,
            'post_id' => $post->id,
            'user_monster_id' => $user->partner->id,
            'post_monster_id' => $post->user->partner->id,
            'win_user_id' => $winner->id,
            'defeat_user_id' => $user->is($winner) ? $post->user->id : $user->id,
        ]);
    }

    /**
     * 対戦を行い、勝者となったUserモデルを返す
     * アルゴリズムは重み付きの抽選
     */
    public function battle(Post $post)
    {
        $user = Auth::user();
        $entries = collect([$user, $post->user]);

        $sum = $entries->sum(function ($entry) {
            return $entry->partner->attack;
        });

        $rand = rand(1, $sum);

        return $entries->first(function ($entry, $key) use (&$sum, $rand) {
            return ($sum -= $entry->partner->attack) < $rand;
        });
    }
}
