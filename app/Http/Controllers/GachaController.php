<?php

namespace App\Http\Controllers;

use App\Models\Monster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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
        return view('gacha.index');
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
        $monster = $this->randWeighted(Monster::with('rarity')->get());
        $user = Auth::user();
        $user->monsters()->attach($monster);
        $user->refresh();
        $request->session()->regenerateToken();
        $partnerBtn = $user->partnerBtnStatus($monster);
        return view('gacha.result', compact('monster', 'partnerBtn'));
    }

    /**
     * 重み付きの抽選を行う
     */
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
