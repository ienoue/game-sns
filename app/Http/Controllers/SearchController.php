<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tags = Tag::ranking(50);

        $tag = $request->tag;
        if(!$tag) {
            return redirect()->route('posts.index');
        }

        $tag = Tag::where('name', $tag)->first();

        return view('search.index', compact('tags', 'tag'));
    }
}
