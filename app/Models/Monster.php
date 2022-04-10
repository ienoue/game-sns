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

    /**
     * 次のモンスターを取得
     * 無ければ最初のモンスターを取得
     */
    public function next()
    {
        $monster = $this->where('id', '>', $this->id)->orderBy('id', 'asc')->first();
        if (!$monster) {
            $monster = $this->orderBy('id', 'asc')->first();
        }
        return $monster;
    }

    /**
     * 前のモンスターを取得
     * 無ければ最後のモンスターを取得
     */
    public function previous()
    {
        $monster =  $this->where('id', '<', $this->id)->orderBy('id', 'desc')->first();
        if (!$monster) {
            $monster = $this->orderBy('id', 'desc')->first();
        }
        return $monster;
    }
}
