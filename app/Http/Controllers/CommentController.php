<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Post;
use App\Comment;

use Illuminate\Support\Facades\Auth;//Auth使うにはこれが必要だった

use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
        $q = \Request::query();//クエリを受け取る

        $post = Post::find($q)->first();

        return view('comments.create',['post'=>$post]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        $comment =new Comment;

        $comment->user_id = $request->user_id;
        $comment->post_id = $request->post_id;
        $comment->comment = $request->comment;

        $comment->save();

        $post =Post::find($request->post_id)->load('comments');
                    
        // dd($post->comments);

        $auth = Auth::user();
        
        return view('posts.show',['post'=>$post,'auth'=>$auth]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);
        // dd($comment);

        $post = Post::find($comment->post_id);
        // dd($post);

        return view('comments.edit',['post'=>$post,'comment'=>$comment]);
        //このポストのレコードをeditに送る
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CommentRequest $request, Comment $comment)
    {
        $comment->comment = $request->comment;
        
        $comment->save();
        
        $post = Post::where('id',$comment->post_id)->first();
    
        return redirect('posts/'.$post->id);    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment,Post $post)
    {
        $post = Post::find($comment->post_id);

        $comment->delete();

        return redirect('posts/'.$post->id);
    }
}
