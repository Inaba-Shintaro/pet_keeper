<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Pet;
use App\User;
use Illuminate\Support\Facades\Auth;//Auth使うにはこれが必要だった

use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('user.pets')->latest()->paginate(8);
        
        return view('posts.index',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {

        // dd($request);
        

            $post = new Post;//さらのPostレコードを作成

            $post->user_id = $request->user_id;
            $post->term_start = $request->term_start;
            $post->term_end = $request->term_end;
            $post->price = $request->price;
            $post->content = $request->content;
            $post->completed = $request->completed;
    
        
        // dd($post);
        $post->save();


        $posts = Post::latest()->paginate(8);

        return view('posts.index',["posts"=>$posts]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post , Request $request)
    { 

        $auth = Auth::user();

        $post->load('user');//postモデルのrelationをもとに、relationされているレコードの値も一緒にview渡すため
        
        $post->user->load('pets');
        
        $post->user->pets->load('pettype');
        
        return view('posts.show',['post'=>$post,'auth'=>$auth]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit',['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Post $post)
    {
        
        $post->term_start = $request->term_start;
        $post->term_end = $request->term_end;
        $post->price = $request->price;
        $post->content = $request->content;
        $post->completed = $request->completed;

        $post->save();
        
        $auth = Auth::user();

        return view('posts.show',['post'=>$post,'auth'=>$auth]);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/posts');
    }
}
