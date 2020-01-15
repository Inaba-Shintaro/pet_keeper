@extends('layouts.app')

@section('content')

<p>チャット一覧画面</p>
<div class="container bg-info">

@if($search_check == 1)

  <p class="display-4">お相手がいません</p>

@else


  <h4>預けたお相手</h4>
  <!-- 変更点 -->

  @if($pet_keepers == null)
    <p>預けていません</p>
  @else
    @foreach($pet_keepers as $pet_keeper)
    <div class="bg-success mt-5">
    <p class="display-4">{{$pet_keeper->name}}</p>
    <a class="btn btn-primary btn-lg" href="#" role="button">チャットする</a>
    </div>
    @endforeach
  @endif

    <hr>  

    <h4>預かったお相手</h4>
    <!-- 変更点 -->
    
    @if($pet_holders == null)
      <p>預かっていません</p>
    @else
      @foreach($pet_holders as $pet_holder)
      <div class="bg-success mt-5">
      <p class="display-4">{{$pet_holder->name}}</p>
      <a class="btn btn-primary btn-lg" href="#" role="button">チャットする</a>
      </div>
      @endforeach
    @endif



@endif

  
  
</div>
@endsection
