<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * コメントを新規保存
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment $comment
     * @param  \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Comment $comment, Post $post)
    {
        $comment->fill($request->all());
        $comment->user_id = $request->user()->id;
        $comment->post_id = $post->id;
        $comment->save();
        $request->session()->regenerateToken();
        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
