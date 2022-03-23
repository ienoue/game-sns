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
        $tags = Tag::join('post_tag', 'tags.id', '=', 'post_tag.tag_id')
        ->select('tags.name', DB::raw('count(*)'))
        // ->whereDate('post_tag.created_at', '>=', $diffYear)
        ->groupBy('tags.name')
        ->orderBy(DB::raw('count(*)'), 'desc')
        ->take(50)
        ->get();

        $tag = $request->tag;
        if(!$tag) {
            return redirect()->route('posts.index');
        }

        $tag = Tag::where('name', $tag)->first();

        return view('search.index', compact('tags', 'tag'));
    }
}
