<?php

namespace Database\Seeders;

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
        $monster = Monster::all();

        User::factory(20)->create()->each(function ($user) use ($monster) {
            Post::factory(rand(10, 15))->create(['user_id' => $user]);
            $user->monsters()->attach($monster->where('rarity_id', '<=', 2)->random(rand(5, 9))->pluck('id')->toArray());
        });

        $users = User::all();
        $users->each(function ($user) use ($users) {
            $user->followers()->attach($users->except($user->id)->random(rand(10, 15))->pluck('id')->toArray());
        });

        Post::all()->each(function ($post) use ($users, $tags) {
            //自身の投稿以外に対してlikesテーブルのレコードをランダムに作成
            $post->likes()->attach($users->except($post->user_id)->random(rand(8, 10))->pluck('id')->toArray());

            //post_tagテーブルのレコードをランダムに作成
            $post->tags()->attach($tags->random(rand(0, 3))->pluck('id')->toArray());
        });

        User::first()->update([
            'name' => 'ゲストユーザー',
            'email' => 'test@test.com',
            'password' => bcrypt('hogehoge'),
        ]);
    }
}
