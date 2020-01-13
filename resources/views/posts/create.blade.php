@extends('layouts.app')

@section('content')
<div class="jumbotron">
<div class="icon">募集要項</div>
<div class="container p-5">
<label class="col-4" for="exampleFormControlSelect1">預けたい期間</label>

@include('errors.form_errors')

{!! Form::open(['route' => 'posts.store']) !!} <!-- routenameとidをpatchで渡してあげる -->
    <!-- 【Partial】petsディレクトリ配下のform.blade.phpファイルの読み込み -->
        @include('posts.form', ['submitButton'=> "ホストを募集する"])
        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
        <input type="hidden" name="completed" value="{{ 1 }}">
{!! Form::close() !!} <!-- フォームの閉じタグ生成 変更点 -->


</div>

</div>
@endsection
