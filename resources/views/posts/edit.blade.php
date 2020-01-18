@extends('layouts.app')

@section('content')
<div class="jumbotron">
<div class="icon">募集要項</div>
<div class="container p-5">
<!-- <label class="col-4" for="exampleFormControlSelect1">預けたい期間</label> -->

@include('errors.form_errors')

{!! Form::open(['method' => 'PATCH','route' => ['posts.update',$post->id]]) !!} <!-- routenameとidをpatchで渡してあげる -->
    <!-- 【Partial】petsディレクトリ配下のform.blade.phpファイルの読み込み -->
        @include('posts.form', ['user'=>$user,'submitButton'=> "ホストを募集する"])
        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
        <input type="hidden" name="completed" value="{{ 0 }}">
{!! Form::close() !!} <!-- フォームの閉じタグ生成 -->

{!! Form::open( ['method' => 'DELETE', 'route' => ['posts.destroy', $post]],['class' => 'd-inline-block']) !!} <!-- 「posts.edit」にidを「GET」で渡してあげる --> 
{!!Form::submit('この募集を削除する',['class' => 'btn btn-danger btn-lg d-inline-block'])!!}
{!! Form::close() !!}
    
</div>

</div>
@endsection
