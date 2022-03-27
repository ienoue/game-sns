<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
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
    public function index(SearchRequest $request)
    {
        $tag = Tag::where('name', $request->tag)->first();
        return view('search.index', compact('tag'));
    }
}
