@extends('layouts.app')

@section('content')
<div class="jumbotron">
<div class="icon">メールアドレス</div>
<div class="container p-5">

@include('errors.form_errors')

<form action="{{route('users.update',$auth->id)}}" method="POST">
{{ csrf_field() }}
{{ method_field('PATCH') }}
    <div class="form-group row">
        <label for="exampleInputEmail1">メールアドレス</label>
        <input name="email" value="{{$auth->email}}" type="email" class="form-control" id="exampleInputEmail1">
    </div>
    <input name="email_update" value="{{$auth->email}}" type="hidden" class="form-control" id="exampleInputEmail1">
    <button type="submit" class="btn btn-primary">メールアドレスを変更する</button>
</form>

</div>
</div>
</div>
@endsection
