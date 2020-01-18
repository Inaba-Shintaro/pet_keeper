@extends('layouts.app')

@section('content')
<div class="jumbotron">

<div class="container p-5">

@include('errors.form_errors')


{!! Form::open(['method'=>'PATCH','route' => ['comments.update',$comment->id]]) !!} <!-- routenameとidをpatchで渡してあげる -->
    <!-- 【Partial】petsディレクトリ配下のform.blade.phpファイルの読み込み -->
        @include('comments.form', ['comment'=>$comment,'submitButton'=> "編集する"])
        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
        <input type="hidden" name="post_id" value="{{ $post->id }}">
{!! Form::close() !!} <!-- フォームの閉じタグ生成 -->

<!-- <form action="{{route('comments.destroy',['comment'=>$comment->id])}}" method="POST"> -->
<form action="{{route('comments.destroy',$comment->id)}}" method="POST">
{{ csrf_field() }}
{{ method_field('DELETE') }}
  <button type="submit" class="btn btn-danger">コメントを削除する</button>
</form>





</div>

</div>
@endsection
