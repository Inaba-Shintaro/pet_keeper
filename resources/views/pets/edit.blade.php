@extends('layouts.app')

@section('content')
<div class="jumbotron">
<div class="icon">マイページ編集</div>
<div class="container p-5">

@include('errors.form_errors')

{!! Form::open(['method' => 'PATCH','route' => ['pets.update', $pet->id],'files' => true]) !!} <!-- routenameとidをpatchで渡してあげる -->
    <!-- 【Partial】petsディレクトリ配下のform.blade.phpファイルの読み込み -->
        @include('pets.form', ['pet'=>$pet,'pettypes'=>$pettypes,'submitButton'=> "上書き保存する"])
        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
{!! Form::close() !!} <!-- フォームの閉じタグ生成 -->

{!! Form::open(['method' => 'DELETE','route' => ['pets.destroy', $pet->id],'files' => true]) !!} 
<button type="submit" class="btn btn-danger">ペット登録を削除する</button>
{!! Form::close() !!} <!-- フォームの閉じタグ生成 -->

</div>
</div>
@endsection
