<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Battle extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_id',
        'user_monster_id',
        'post_monster_id',
        'win_user_id',
        'defeat_user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function postUser()
    {
        return $this->post->user;
    }

    public function userMonster()
    {
        return $this->belongsTo(Monster::class, 'user_monster_id');
    }

    public function postMonster()
    {
        return $this->belongsTo(Monster::class, 'post_monster_id');
    }

    public function winUser()
    {
        return $this->belongsTo(User::class, 'win_user_id');
    }

    public function defeatUser()
    {
        return $this->belongsTo(User::class, 'defeat_user_id');
    }
}
