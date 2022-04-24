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

    // 一日のガチャ可能回数
    protected $gachaLimit = 100;

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
        return $this->belongsToMany(Monster::class, 'gacha_results')->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->latest('created_at');
    }

    /**
     * このUserに紐づくbattleモデルを全て返す
     * 結果は対戦を挑まれた場合も含める
     */
    public function battles()
    {
        return Battle::where(function ($query) {
            $query->where('win_user_id', $this->id)->orWhere('defeat_user_id', $this->id);
        })->latest('updated_at');
    }

    /**
     * ユーザが保持しているモンスターを指定したカラムでソートする
     */
    public function monstersSortedBy(?String $sort)
    {
        $monster = $this->monsters();

        switch ($sort) {
            case 'name':
                return $monster->orderBy('name', 'asc');
            case 'attack':
                return $monster->orderBy('attack', 'desc');
            case 'rarity':
                return $monster->orderBy('rarity_id', 'desc');
            case 'updated':
                return $monster->latest('pivot_updated_at');
            default:
                return $monster->latest('pivot_updated_at');
        }
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
     * フォローボタンの要素とClass属性の値を返す
     */
    public function followBtnStatus()
    {
        if ($this->isFollowedBy(Auth::user())) {
            $btnVisual = 'btn btn-follow btn-primary';
            $btnText = 'フォロー中';
        } else {
            $btnVisual = 'btn btn-follow btn-outline-primary';
            $btnText = 'フォローする';
        }

        return compact('btnVisual', 'btnText');
    }

    /**
     * 引数のMonsterモデルと相棒かどうかを返す
     */
    public function isPartner(Monster $monster)
    {
        return $this->partner()->is($monster);
    }

    /**
     * 引数のMonsterモデルに対応する相棒ボタンの要素とClass属性の値を返す
     */
    public function partnerBtnStatus(Monster $monster)
    {
        $btn = $this->partnerBtnData();
        if ($this->isPartner($monster)) {
            return $btn['active'];
        } else {
            return $btn['inactive'];
        }
    }

    /**
     * 相棒ボタンの選択・未選択状態の値を返す
     */
    public function partnerBtnData()
    {
        return [
            'active' => [
                'btnVisual' => 'btn btn-partner btn-primary',
                'btnText' => '現在の相棒',
                'btnDisabled' => 'disabled',
            ],
            'inactive' => [
                'btnVisual' => 'btn btn-partner btn-outline-primary',
                'btnText' => '相棒にする',
                'btnDisabled' => '',
            ]
        ];
    }

    /**
     * 引数のMonsterモデルを保持しているかどうか
     */
    public function hasMonster(Monster $monster)
    {
        return $this->monsters->where('id', $monster->id)->isNotEmpty();
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

    /**
     * 引数のPostモデルに対して紐づけを既に行っているかどうか
     */
    public function isBattledWith(Post $post)
    {
        return Battle::where('post_id', $post->id)->where('user_id', $this->id)->exists();
    }

    /**
     * 引数のPostモデルとの対戦について勝利したかどうか
     */
    public function hasWonFor(Post $post)
    {
        return Battle::where('post_id', $post->id)->where('win_user_id', $this->id)->exists();
    }

    /**
     * 昨日、このUserが挑んだ対戦で１度でも勝利したかどうか
     */
    public function hasWonYesterday()
    {
        $date = Carbon::yesterday();
        return Battle::where('user_id', $this->id)
            ->where('win_user_id', $this->id)
            ->whereDate('created_at', $date)
            ->exists();
    }
}
