<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\GachaController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MonsterController;
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

// 投稿
Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::resource('/posts', PostController::class)->except(['index', 'create', 'edit', 'show'])->middleware('auth');
Route::resource('/posts', PostController::class)->only(['show']);

// タグ検索
Route::get('/Search', [SearchController::class, 'index'])->name('search');

// いいね
Route::post('/like/{post}', [LikeController::class, 'toggle'])->name('like')->middleware('auth');

// フォロー
Route::post('/follow/{user}', [FollowController::class, 'toggle'])->name('follow')->middleware('auth');

// 認証
Auth::routes([
    'reset'    => false,  // パスワードリセット用のルート
]);
Route::get('/login/guest', [LoginController::class, 'guestLogin'])->name('login.guest');

// マイページ
Route::prefix('users')->name('users.')->group(function () {
    Route::get('/{user}', [UserController::class, 'index'])->name('index');
    Route::get('/{user}/likes', [UserController::class, 'likes'])->name('likes');
    Route::get('/{user}/followers', [UserController::class, 'followers'])->name('followers');
    Route::get('/{user}/followees', [UserController::class, 'followees'])->name('followees');
    Route::get('/{user}/monsters', [UserController::class, 'monsters'])->name('monsters');
    Route::get('/{user}/battles', [UserController::class, 'battles'])->name('battles');
    Route::get('/{user}/comments', [UserController::class, 'comments'])->name('comments');
});

// ガチャ
Route::prefix('gacha')->middleware('auth')->group(function () {
    Route::get('/', [GachaController::class, 'index'])->name('gacha.index');
    Route::post('/', [GachaController::class, 'result']);
});

// モンスター
Route::resource('/monsters', MonsterController::class)->only(['update', 'show']);

// コメント
Route::resource('posts.comments', CommentController::class)->only(['store', 'destroy', 'update'])->shallow()->middleware('auth');