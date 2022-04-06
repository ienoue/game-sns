<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // いいねが行えるかどうか
        Gate::define('toggle-like', function (User $user, Post $post) {
            return $user->id !== $post->user_id;
        });

        // フォローが行えるかどうか
        Gate::define('toggle-follow', function (User $user, User $target) {
            return $user->id !== $target->id;
        });

        // ガチャが出来るかどうか
        Gate::define('gacha', function (User $user) {
            return $user->remainingGachaCount() > 0;
        });
    }
}
