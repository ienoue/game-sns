<?php

namespace App\Http\ViewComposers;

use App\Models\Tag;
use Illuminate\View\View;

class TagComposer
{
    /**
     * よく使用されているタグをビューに紐付ける
     *
     * @param View $view
     */
    public function compose(View $view)
    {
        $tags = Tag::ranking(50);
        $view->with(compact('tags'));
    }
}
