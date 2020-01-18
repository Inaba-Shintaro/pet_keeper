@extends('layouts.app')

@section('content')
<div class="jumbotron">
<div class="icon">募集要項</div>
<div class="container p-5">
@if($user->pets->isEmpty())
<p>ペットを預けるにはペット登録が必要です</p>
<div class="col-3"><a class="btn btn-primary btn-lg" href="{{route('pets.create')}}" role="button">ペット登録をする</a></div>
@else
@include('errors.form_errors')

{!! Form::open(['route' => 'posts.store']) !!} <!-- routenameとidをpatchで渡してあげる -->
    <!-- 【Partial】petsディレクトリ配下のform.blade.phpファイルの読み込み -->
        @include('posts.form', ['user'=>$user,'submitButton'=> "ホストを募集する"])
        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
        <input type="hidden" name="completed" value="{{ 1 }}">
{!! Form::close() !!} <!-- フォームの閉じタグ生成 変更点 -->

@endif
</div>

</div>
@endsection
