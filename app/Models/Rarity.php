<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rarity extends Model
{
    use HasFactory;

    /**
     * レア度が低いものからn番目のモデルを返す
     * nは0から開始する
     */
    public static function nth($n)
    {
        return self::orderBy('rarity_rank')->get()->skip($n)->first();
    }
}
