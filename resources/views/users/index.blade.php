@extends('layouts.app')

@section('content')
<div class="jumbotron">
<div class="icon">自己紹介</div>
<div class="container p-5">
    <div class="row">
        <div class="col-4">名前</div>
        <div class="col-5">{{$user->name}}</div>
        @if(!isset($user->image))
        <div class="col-3"><img src="{{asset('images/no-image.png')}}" alt="エラー発生中"></div>
        @else
        <div class="col-3"><img src="{{asset('images/'.$user->image)}}" alt="エラー発生中"></div>
        @endif
    </div>

    <div class="form-group row mt-5">
        <label class="col-4" for="exampleFormControlSelect1">ペット歴</label>
        <div class="col-5">{{$user->host_experience}}</div>
    </div>

    <div class="form-group row mt-5">
        <label class="col-4" for="exampleFormControlSelect1">預かれるペットの種類</label>
            @foreach($user->pettypes as $pettype)
                <p class="col-5">{{$pettype->type_name}}</p>
            @endforeach
    </div>

    <div class="form-group row mt-5">
        <label class="col-4" for="exampleFormControlSelect1">お住まいの地域</label>
        <div class="col-5">{{$user->area}}</div>
    </div>
    <div class="row mt-5">
        <div class="col-9">
        <div class="form-group">
            <label for="exampleFormControlTextarea1">預ける方への留意事項など</label>
            <textarea readonly  class="form-control mt-3 bg-white" id="exampleFormControlTextarea1" rows="3">{{$user->comment}}</textarea>
        </div>
        </div>
        <div class="col-3 p-5">
        @if(Auth::id() == $user->id)
            <div><a class="btn btn-primary" href="{{route('users.edit',$user->id)}}" role="button">編集する</a></div>
            <div><a class="btn btn-success" href="{{route('users.account_edit',$user->id)}}" role="button">アカウント情報</a></div>
        @else
        @endif
        </div>
    </div>
</div>
  
  <hr class="my-4">
  <div class="icon">ペット詳細</div>
<div class="container">

<div class="row mt-5">


@if($user->pets->first() == null)
    <div class="col-9"><h3>ペット登録がされていません</h3></div>
    @if(Auth::id() == $user->id)
    <div class="col-3"><a class="btn btn-primary btn-lg" href="{{route('pets.create')}}" role="button">ペット登録をする</a></div>
    @else
    @endif
@else

@foreach($pet as $pet)
<div class="row">
        <div class="col-4">名前</div>
        <div class="col-5">{{$pet->name}}</div>
        <div class="col-3"><img src="{{asset('images/'.$pet->image)}}" alt="エラー発生中"></div>
</div>

<div class="row">
        <div class="col-4">種類</div>
        <div class="col-5">{{$pet->pettype->type_name}}</div>
</div>

<div class="row">
        <div class="col-4">性別</div>
        
        @if($pet->gender == 1)
        <div class="col-5">オス</div>
        @else
        <div class="col-5">メス</div>
        @endif
</div>

<div class="row">
        <div class="col-4">このペットの特徴</div>
        <div class="col-5">{{$pet->characteristic}}</div>
</div>

    @if(Auth::id() == $user->id)
        {!! Form::open( ['method' => 'GET', 'route' => ['pets.edit', $pet->id],'files' => true],['class' => 'd-inline-block']) !!} <!-- 「pets.edit」にidを「GET」で渡してあげる --> 
        {!!Form::submit('編集する',['class' => 'btn btn-primary btn-lg d-inline-block ml-5'])!!}
        {!! Form::close() !!}
    @else
    @endif
@endforeach
    @if(Auth::id() == $user->id)
    <div class="col-3"><a class="btn btn-primary btn-lg" href="{{route('pets.create')}}" role="button">ペット登録をする</a></div>
    @else
    @endif
@endif

</div>
</div>

  
</div>
@endsection
