<?php

namespace App\Http\Controllers;

use App\Models\Monster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MonsterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
