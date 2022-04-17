<?php

namespace App\Http\Controllers;

use App\Models\Monster;
use App\Models\Rarity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Collection;

class GachaController extends Controller
{
    /**
     * ガチャ準備ページを表示
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('gacha')) {
            return view('gacha.error');
        }
        $hasWonYesterday = Auth::user()->hasWonYesterday();
        return view('gacha.index', compact('hasWonYesterday'));
    }

    /**
     * ガチャ結果を表示
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function result(Request $request)
    {
        if (!Gate::allows('gacha')) {
            return view('gacha.error');
        }

        $user = Auth::user();
        $n = $user->hasWonYesterday() ? 1 : 0;
        $monster = $this->randWeighted(Monster::with('rarity')->get(), Rarity::nth($n));
        
        $user->monsters()->attach($monster);
        $user->refresh();
        $request->session()->regenerateToken();
        $partnerBtn = $user->partnerBtnStatus($monster);
        return view('gacha.result', compact('monster', 'partnerBtn'));
    }

    /**
     * 重み付きの抽選を行う
     * 
     * @param  \Illuminate\Database\Eloquent\Collection  $monsters
     * @param  \App\Models\Rarity  $lowerLimit
     * @return \App\Models\Monster
     */
    public function randWeighted(Collection $monsters, Rarity $lowerLimit)
    {
        $entries = $monsters->filter(function ($monster) use ($lowerLimit) {
            return $monster->rarity->rarity_rank >= $lowerLimit->rarity_rank;
        });

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
