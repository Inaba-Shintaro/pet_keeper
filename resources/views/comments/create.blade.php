@extends('layouts.app')

@section('content')
<div class="jumbotron">

<div class="container p-5">

@include('errors.form_errors')


{!! Form::open(['route' => 'comments.store']) !!} <!-- routenameとidをpatchで渡してあげる -->
    <!-- 【Partial】petsディレクトリ配下のform.blade.phpファイルの読み込み -->
        @include('comments.form', ['submitButton'=> "コメントする"])
        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
        <input type="hidden" name="post_id" value="{{ $post->id }}">
{!! Form::close() !!} <!-- フォームの閉じタグ生成 -->
</div>

</div>
@endsection
