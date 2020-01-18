@extends('layouts.app')

@section('content')
<div class="jumbotron">
<div class="icon">マイページ編集</div>
<div class="container p-5">

@include('errors.form_errors')

{!! Form::open(['method' => 'PATCH','route' => ['users.confirm',$auth->id],'files' => true]) !!} <!-- routenameとidをpatchで渡してあげる -->
<form action="{{route('users.confirm',$auth->id)}}" method="POST"enctype="multipart/form-data">
@method('PATCH')
@csrf
    <!-- 【Partial】petsディレクトリ配下のform.blade.phpファイルの読み込み -->
        @include('users.form', ['submitButton'=> "テスト"])
        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
{!! Form::close() !!} <!-- フォームの閉じタグ生成 -->

</div>
</div>
@endsection
