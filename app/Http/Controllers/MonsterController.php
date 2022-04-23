<?php

namespace App\Http\Controllers;

use App\Models\Monster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class MonsterController extends Controller
{
    /**
     * モンスターを詳細表示
     *
     * @param  \App\Models\Monster $monster
     * @return \Illuminate\Http\Response
     */
    public function show(Monster $monster)
    {
        $partnerBtn = Auth::user()?->partnerBtnStatus($monster);
        return view('monsters.show', compact('monster', 'partnerBtn'));
    }

    /**
     * 相棒モンスターを設定
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Monster $monster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Monster $monster)
    {
        abort_if(!Gate::allows('editMonster', $monster), 403);

        $user = $request->user();
        $user->monster_id = $monster->id;
        $user->save();

        $btn = $user->partnerBtnData();

        return [
            'name' => $monster->name,
            'id' => $monster->id,
            'active' => $btn['active'],
            'inactive' => $btn['inactive'],
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
