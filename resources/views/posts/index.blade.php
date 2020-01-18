@extends('layouts.app')

@section('content')


<div class="container">
    <div class="container">
            <div class="row row-cols-1 row-cols-md-4">
            
            @if($posts->isEmpty())
            <p>現在ペットを預けたい方はいません、、</p>
            @else
            @foreach($posts as $post)
                <div class="col mb-4">
                    <a href="{{ route( 'posts.show',$post->id ,['post'=>$post]) }}">
                    <div class="card">                    
                        <img src="{{asset('images/'.$post->pet->image)}}" class="card-img-top" alt="#">
                        <div class="card-body">
                            <p class="card-text">いつから：{{date('Y年m月d日',strtotime($post->term_start))}}</p>
                            <p class="card-text">いつまで：{{date('Y年m月d日',strtotime($post->term_end))}}</p>
                            <p class="card-text">地域：{{$post->user->area}}</p>
                            <p class="card-text">報酬：{{$post->price}}</p>
                        </div>
                    </div>
                    </a>
                </div>            
            @endforeach
            @endif
        </div>
    </div>
</div>

@if($posts->isEmpty())

@else
{{ $posts->links() }}
@endif

@endsection
