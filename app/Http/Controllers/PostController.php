<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Tag;

class PostController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Post::class, 'post');
    }

    /**
     * 投稿を一覧表示
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with(['likes', 'tags', 'user'])->orderByDesc('updated_at')->paginate(10);

        return view('posts.index', compact('posts'));
    }

    /**
     * 投稿を新規保存
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request, Post $post)
    {
        $post->fill($request->all());
        $post->user_id = $request->user()->id;
        $post->save();
        $request->storeTags($post);

        return redirect()->route('posts.index');
    }

    /**
     * 投稿を詳細表示
     *
     * @param  \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }


    /**
     * 投稿を更新
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $post->fill($request->all());
        $post->save();

        $request->storeTags($post);


        return [
            'text' => $request->text,
            'id' => $post->id,
            'tags' => $request->tags,
            'visual' => Tag::tagBtnState()['btnVisual'],
        ];
    }

    /**
     * 投稿を削除
     *
     * @param  \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}
