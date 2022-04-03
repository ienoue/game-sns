<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    /**
     * タグで記事を絞り込んで一覧表示する
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SearchRequest $request)
    {
        // $tag = Tag::where('name', $request->tag)->first()->load('posts.likes', 'posts.user', 'posts.tags');
        $tag = Tag::where('name', $request->tag)->first();
        if ($tag) {
            $posts = $tag->posts()->with('tags', 'user', 'likes')->paginate(10)->onEachSide(0);
        } else {
            $posts = null;
        }
        return view('search.index', compact('tag', 'posts'));
    }
}
