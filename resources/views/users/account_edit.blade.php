@extends('layouts.app')

@section('content')
<div class="jumbotron">
<div class="icon">アカウント情報</div>
<div class="container p-5">

@include('errors.form_errors')

<div class="form-group row mt-5">
    <label class="col-3" for="exampleFormControlSelect1">メールアドレス</label>
    <div class="col-5">{{$auth->email}}</div>
    <div class="col-4"><a class="btn btn-primary" href="{{route('users.account_email',$auth->id)}}" role="button">メールアドレスを変更する</a></div>
</div>

<div class="form-group row mt-5">
    <label class="col-3" for="exampleFormControlSelect1">パスワード</label>
    <div class="col-5">********</div>
    <div class="col-4"><a class="btn btn-primary" href="{{route('users.edit',$auth->id)}}" role="button">パスワードを変更する</a></div>
</div>

    <div class="row mt-5">
        <div class="col-12 p-5">
            <div><a class="btn btn-danger" href="{{route('users.account_delete',$auth->id)}}" role="button">アカウントを削除する</a></div>
        </div>
    </div>
</div>

</div>
</div>
@endsection
