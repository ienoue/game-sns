<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $gachaLimit = 3;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'monster_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class)->latest('updated_at');
    }

    public function likes()
    {
        return $this->belongsToMany(Post::class, 'likes')->withTimestamps()->latest('updated_at');
    }

    public function partner()
    {
        return $this->belongsTo(Monster::class, 'monster_id');
    }

    public function monsters()
    {
        return $this->belongsToMany(Monster::class, 'gacha_results')->withTimestamps()->latest('pivot_updated_at');
    }

    /**
     * このユーザをフォローしているユーザを返す
     */
    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'followee_id', 'follower_id')->withTimestamps()->latest('updated_at');
    }

    /**
     * このユーザがフォローしているユーザを返す
     */
    public function followees()
    {
        return $this->belongsToMany(User::class, 'follows', 'follower_id', 'followee_id')->withTimestamps()->latest('updated_at');
    }

    /**
     * 引数のユーザによってフォローされているかどうかを返す
     */
    public function isFollowedBy(?User $user)
    {
        if (!$user) {
            return false;
        }

        return $this->followers->where('id', $user->id)->isNotEmpty();
    }

    /**
     * フォローボタンの要素の値とClass属性の値を返す
     */
    public function followBtnState()
    {
        if ($this->isFollowedBy(Auth::user())) {
            $btnVisual = 'btn btn-follow btn-primary rounded-pill text-white';
            $btnText = 'フォロー中';
        } else {
            $btnVisual = 'btn btn-follow btn-outline-primary rounded-pill';
            $btnText = 'フォローする';
        }

        return compact('btnVisual', 'btnText');
    }

    /**
     * 本日の残りガチャ回数を返す
     */
    public function remainingGachaCount()
    {
        $count = $this->monsters->filter(function ($monster) {
            return $monster->pivot->updated_at->isToday();
        })->count();

        // ユーザ新規作成時に選ばれるモンスターはカウントしない
        if ($this->created_at->isToday()) {
            $count -= 1;
        }
        return $this->gachaLimit - $count;
    }
}
