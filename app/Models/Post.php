<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes')->withTimestamps();
    }

    public function isLikedby(?User $user)
    {
        if (!$user) {
            return false;
        }
        return $this->likes->where('id', $user->id)->isNotEmpty();
    }

    public function likeBtnState() {
        if ($this->isLikedby(Auth::user())) {
            $btnVisual = 'fa-solid fa-heart text-red';
        } else {
            $btnVisual = 'fa-regular fa-heart';
        }
        
        return compact('btnVisual');
    }
}
