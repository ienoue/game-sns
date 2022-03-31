<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'followee_id', 'follower_id')->withTimestamps()->latest('updated_at');
    }

    public function followees()
    {
        return $this->belongsToMany(User::class, 'follows','follower_id', 'followee_id')->withTimestamps()->latest('updated_at');
    }

    public function isFollowedBy(?User $user)
    {
        if (!$user) {
            return false;
        }

        return $this->followers->where('id', $user->id)->isNotEmpty();
    }

    public function buttonState() {
        if ($this->isFollowedBy(Auth::user())) {
            $btnVisual = 'btn btn-follow btn-primary rounded-pill text-white';
            $btnText = 'フォロー中';
        } else {
            $btnVisual = 'btn btn-follow btn-outline-primary rounded-pill';
            $btnText = 'フォローする';
        }
        
        return compact('btnVisual', 'btnText');
    }
}
