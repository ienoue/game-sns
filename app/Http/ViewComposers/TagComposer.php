<?php

namespace App\Http\ViewComposers;

use App\Models\Tag;
use Illuminate\View\View;

class TagComposer
{
    public function compose(View $view)
    {
        $tags = Tag::ranking(50);
        $view->with(compact('tags'));
    }
}
