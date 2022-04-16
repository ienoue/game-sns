<?php

namespace Database\Seeders;

use App\Models\Battle;
use App\Models\Monster;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Tag::factory(10)->create();
        $tags = Tag::all();
        $monsters = Monster::all();

        User::factory(20)->create()->each(function ($user) use ($monsters) {
            Post::factory(rand(2, 3))->create(['user_id' => $user]);

            // 特定のレア度のgacha_resultsテーブルのレコードをランダムに作成
            $user->monsters()->attach($monsters->where('rarity_id', '<=', 2)->random(rand(5, 9))->pluck('id')->toArray());
        });

        $users = User::all();
        $users->each(function ($user) use ($users) {
            // 相棒モンスターを保持しているモンスターから選ぶ
            $user->update(['monster_id' => $user->monsters->random(1)->first()->id]);

            // 自身以外に対してfollowsテーブルのレコードをランダムに作成
            $user->followers()->attach($users->except($user->id)->random(rand(2, 3))->pluck('id')->toArray());
        });

        Post::all()->each(function ($post) use ($users, $tags, $monsters) {
            $randUsers = $users->except($post->user_id)->random(rand(2, 3));

            // 自身の投稿以外に対してlikesテーブルのレコードをランダムに作成
            $post->likes()->attach($randUsers->pluck('id')->toArray());

            // 自身の投稿以外に対してbattlesテーブルのレコードをランダムに作成
            $randUsers->each(function ($user) use ($post) {
                $shuffleIDs = collect([$user->id, $post->user->id])->shuffle();
                Battle::create([
                    'user_id' => $user->id,
                    'post_id' => $post->id,
                    'user_monster_id' => $user->partner->id,
                    'post_monster_id' => $post->user->partner->id,
                    'win_user_id' => $shuffleIDs->first(),
                    'defeat_user_id' => $shuffleIDs->last(),
                ]);
            });

            // post_tagテーブルのレコードをランダムに作成
            $post->tags()->attach($tags->random(rand(0, 3))->pluck('id')->toArray());
        });

        User::first()->update([
            'name' => 'ゲストユーザー',
            'email' => 'test@test.com',
            'password' => bcrypt('hogehoge'),
        ]);
    }
}
