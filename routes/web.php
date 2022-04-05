<?php

use App\Http\Controllers\FollowController;
use App\Http\Controllers\GachaController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::resource('/posts', PostController::class)->except(['index', 'create', 'edit', 'show'])->middleware('auth');
Route::resource('/posts', PostController::class)->only(['show']);

Route::get('/Search', [SearchController::class, 'index'])->name('search');

Route::post('/like/{post}', [LikeController::class, 'toggle'])->name('like')->middleware('auth');

Route::post('/follow/{name}', [FollowController::class, 'toggle'])->name('follow')->middleware('auth');

Auth::routes([
    'reset'    => false,  // パスワードリセット用のルート
]);

Route::prefix('users')->name('users.')->group(function () {
    Route::get('/{name}', [UserController::class, 'index'])->name('index');
    Route::get('/{name}/likes', [UserController::class, 'likes'])->name('likes');
    Route::get('/{name}/followers', [UserController::class, 'followers'])->name('followers');
    Route::get('/{name}/followees', [UserController::class, 'followees'])->name('followees');
});

Route::get('/gacha', [GachaController::class, 'index'])->name('gacha.index');
Route::get('/gacha/result', [GachaController::class, 'result'])->name('gacha.result');
