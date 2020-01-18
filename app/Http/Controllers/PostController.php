<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Pet;
use App\User;
use Illuminate\Support\Facades\Auth;//Auth使うにはこれが必要だった

use App\Http\Requests\PostRequest;

use Carbon\Carbon;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $pets = Pet::all();
        // dd($pets);
        

        // $pets_a = $pets->all();
        // $pets = [];
        // foreach($pets_a as $pet){
        //     $pets[] = $pet;
        // }  
        
        // $posts = Post::with('user.pets')->latest()->paginate(8);
        $posts = Post::all();

        
        $posts->load('pet');
        // dd($posts->first()->pets); 
        
        
        // foreach(array_map(null,$pets, $posts) as [$pet, $post] ){
        //     dd($pet);
        //     dd($post); 
        // }
        $posts = Post::with('user')->latest()->paginate(8);
        return view('posts.index',["posts"=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

        $auth = Auth::user();
        $user = User::find($auth->id);
        $user->load('pets');
        
        // dd($user);
        
        // $pets = User::with('pets');
        

        return view('posts.create',['user'=>$user]);
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
            $post->pet_id = $request->pet_id;
            $post->term_start = $request->term_start;
            $post->term_end =  $request->term_end;
            $post->price = $request->price;
            $post->content = $request->content;
            $post->completed = $request->completed;
    
        $post->save();


        // $posts = Post::latest()->paginate(8);
        $posts = Post::with('user')->latest()->paginate(8);
        $posts->load('pet');
        // dd($posts->first());
        // dd($posts);
        
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
        
        $pet = Pet::find($post->pet_id);
        $pet->load('pettype');
        $post->comments->load('user');
        // dd($post->comments->load('user'));
        // dd($post->comments->user);
        
        return view('posts.show',['post'=>$post,'auth'=>$auth,'pet'=>$pet]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        
        $auth = Auth::user();
        
        $user = User::find($auth->id);
        $user->load('pets');

        return view('posts.edit',['post'=>$post,'user'=>$user]);
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
        
        $post->pet_id = $request->pet_id;
        $post->term_start = $request->term_start;
        $post->term_end =  $request->term_end;
        $post->price = $request->price;
        $post->content = $request->content;
        $post->completed = $request->completed;

        $post->save();
        
        $auth = Auth::user();
        
        $pet = Pet::find($post->pet_id);
        $pet->load('pettype');
        $post->comments->load('user');
        // dd($post->comments->load('user'));
        // dd($post->comments->user);
        
        return view('posts.show',['post'=>$post,'auth'=>$auth,'pet'=>$pet]);

        // return view('posts.show',['post'=>$post,'auth'=>$auth]);
    
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

        $posts = Post::all();

        $posts = Post::with('user')->latest()->paginate(8);
        $posts->load('pet');
        // dd($posts->first());
        // dd($posts);
        
        return view('posts.index',["posts"=>$posts]);

        // return view('post.index')
        // return redirect('/posts');
    }
}
