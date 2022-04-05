<?php

namespace App\Http\Controllers;

use App\Models\Monster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPSTORM_META\type;

class GachaController extends Controller
{
    /**
     * 投稿を一覧表示
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('gacha.index');
    }

    public function result()
    {
        $monster = $this->randWeighted(Monster::all());
        Auth::user()->monsters()->attach($monster);
        return view('gacha.result', compact('monster'));
    }

    public function randWeighted($entries)
    {
        $sum = $entries->sum(function ($entry) {
            return $entry->rarity->weight;
        });
        $rand = rand(1, $sum);
        $result = $entries->first(function ($entry, $key) use (&$sum, $rand) {
            return ($sum -= $entry->rarity->weight) < $rand;
        });
        if (!$result) {
            throw new \Exception('結果が存在しませんでした');
        }
        return $result;
    }
}
