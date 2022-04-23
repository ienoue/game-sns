<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

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
        $posts = Post::with(['likes', 'tags', 'user', 'user.partner', 'comments'])->orderByDesc('updated_at')->paginate(10)->onEachSide(2);

        return view('posts.index', compact('posts'));
    }

    /**
     * 投稿を新規保存
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request, Post $post)
    {
        $post->fill($request->all());
        $post->user_id = $request->user()->id;
        $post->save();
        $request->storeTags($post);
        $request->session()->regenerateToken();
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
        $comments = $post->comments()->with('user.partner', 'post')->paginate(10)->onEachSide(2);
        return view('posts.show', compact('post', 'comments'));
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
            'tags' => $request->tagsWithLinks,
            'btnVisual' => Tag::tagBtnStatus()['btnVisual'],
            'containerVisual' => Tag::tagBtnStatus()['containerVisual'],
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
        // 直前にアクセスしたURLが記事詳細画面かどうか
        if (app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName() === 'posts.show') {
            return redirect()->route('posts.index');
        }
        
        return back();
    }
}
