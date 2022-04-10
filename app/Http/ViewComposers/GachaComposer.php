<?php

namespace App\Http\ViewComposers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class GachaComposer
{
    /**
     * 残りガチャ回数をビューに紐付ける
     *
     * @param View $view
     */
    public function compose(View $view)
    {
        if (Auth::check()) {
            $remainingGachaCount = Auth::user()->remainingGachaCount();
        } else {
            $remainingGachaCount = 0;
        }
        $view->with(compact('remainingGachaCount'));
    }
}
