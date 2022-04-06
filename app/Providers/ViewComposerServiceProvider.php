<?php

namespace App\Providers;

use App\Http\ViewComposers\TagComposer;
use App\Http\ViewComposers\GachaComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['posts.index', 'users.likes', 'users.index', 'search.index', 'posts.show'], TagComposer::class);
        View::composer(['posts.index', 'gacha.result'], GachaComposer::class);
    }
}
