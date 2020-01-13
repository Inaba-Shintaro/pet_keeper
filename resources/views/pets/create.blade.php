@extends('layouts.app')

@section('content')
<div class="jumbotron">
<div class="icon">ペット詳細</div>
<div class="container p-5">

@include('errors.form_errors')

{!! Form::open(['route' => 'pets.store','files' => true]) !!} <!-- routenameとidをpatchで渡してあげる -->
    <!-- 【Partial】petsディレクトリ配下のform.blade.phpファイルの読み込み -->
        @include('pets.form', ['pettypes'=>$pettypes,'submitButton'=> "ペット登録する"])
        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
{!! Form::close() !!} <!-- フォームの閉じタグ生成 -->


</div>
</div>
@endsection
