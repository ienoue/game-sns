<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monster extends Model
{
    use HasFactory;

    public function rarity()
    {
        return $this->belongsTo(Rarity::class);
    }
}
