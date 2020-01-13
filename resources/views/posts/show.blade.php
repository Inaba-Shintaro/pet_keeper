@extends('layouts.app')

@section('content')
<div class="jumbotron">
<div class="icon">募集要項</div>
<div class="container p-5">
<label class="col-4" for="exampleFormControlSelect1">預けたい期間</label>


    <div class="form-group row mt-5">
        <label class="col-4">お預け開始日</label>
        <p class="form-control col-3">{{$post->term_start}}</p>
    </div>

    <div class="form-group row mt-5">
        <label class="col-4">お預け終了日</label>
        <p class="form-control col-3">{{$post->term_end}}</p>
    </div>

    <div class="form-group row mt-5">
        <label class="col-4">報酬</label>
        <p class="form-control col-3">{{$post->price}}円</p>
    </div>

    <div class="row mt-5">
        <div class="col-9 bg-info">
            <div class="form-group h-100">
                <label for="exampleFormControlTextarea1">ホストへのお願い留意事項など</label>
                <p class="bg-white h-100">{{$post->content}}</p>
            </div>
        </div>
    </div>



    <div class="col-3">
        @if($post->user->id == $auth->id)
        <form action="{{route('posts.edit', $post->id)}}" method="GET">
        @csrf
            <button type="submit" class="btn btn-primary">編集する</button>
        </form>
        @else
        @endif
    </div>

    <hr>

    <div class="icon">自己紹介</div>

    <div class="form-group row mt-5">
        <label class="col-4">飼い主の名前</label>
        <p class="form-control col-3">{{$post->user->name}}</p>
        @if(!isset($post->user->image))
        <div class="col-3"><img src="{{asset('images/no-image.png')}}" alt="エラー発生中"></div>    
        @else
        <div class="col-3"><img src="{{asset('images/'.$post->user->image)}}" alt="エラー発生中"></div>
        @endif
    </div>

    <hr>

    <div class="icon">ペット詳細</div>

    <div class="form-group row mt-5">
        <label class="col-4">ペットの名前</label>
        <p class="form-control col-3">{{$post->user->pets->first()->name}}</p>
        <div class="col-3"><img src="{{asset('images/'.$post->user->pets->first()->image)}}" alt="エラー発生中"></div>
    </div>

    <div class="form-group row mt-5">
        <label class="col-4">種類</label>
        <p class="form-control col-3">{{$post->user->pets->first()->pettype->type_name}}</p>
    </div>

    <div class="form-group row mt-5">
        <label class="col-4">種類</label>
        @if($post->user->pets->first()->gender == 1)
            <p class="form-control col-3">オス</p>
        @else
            <p class="form-control col-3">メス</p>
        @endif
    </div>

    <div class="row mt-5">
        <div class="col-9 bg-info">
            <div class="form-group h-100">
                <label for="exampleFormControlTextarea1">ホストへのお願い留意事項など</label>
                <p class="bg-white h-100">{{$post->user->pets->first()->characteristic}}</p>
            </div>
        </div>
    </div>

    <hr>

    <h2 class="text-center">コメント</h2>

    @if($post->comments->first() == null)
    <h3 class="text-center">コメントはありません</h3>
    
    @else

    <div class="row mt-5">
        <div class="col-9 bg-info">
            <div class="form-group">
                @foreach($post->comments as $comment)
                    @if(Auth::id() == $comment->user_id)
                        <a class="btn btn-primary" href="{{route('comments.edit',$comment->id)}}" role="button">編集する</a>
                    @else
                    @endif
                <p class="bg-white">{{$comment->comment}}</p>
                @endforeach
            </div>
        </div>
    </div>
    @endif
    <a class="btn btn-primary" href="{{route('comments.create', ['post' => $post])}}" role="button">コメントする</a>

        <input type="hidden" name="user_id" value="{{ $post->id }}">
        <input type="hidden" name="completed" value="{{ 1 }}">
   
</div>

</div>
@endsection
