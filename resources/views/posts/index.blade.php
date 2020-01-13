@extends('layouts.app')

@section('content')


<div class="container">
    <div class="container">
            <div class="row row-cols-1 row-cols-md-4">
            @foreach($posts as $post)
                <div class="col mb-4">
                    <a href="{{ route( 'posts.show',$post->id ,['post'=>$post]) }}">
                    <div class="card">
                        <img src="{{asset('images/'.$post->user->pets->first()->image)}}" class="card-img-top" alt="#">
                        <div class="card-body">
                            <p class="card-text">いつから：{{$post->term_start}}</p>
                            <p class="card-text">いつまで：{{$post->term_end}}</p>
                            <p class="card-text">地域：{{$post->user->area}}</p>
                            <p class="card-text">報酬：{{$post->price}}</p>
                        </div>
                    </div>
                    </a>
                </div>            
            @endforeach
        </div>
    </div>
</div>

{{ $posts->links() }}
@endsection
