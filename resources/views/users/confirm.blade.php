@extends('layouts.app')

@section('content')
<div class="jumbotron">
<div class="icon">マイページ編集</div>
<div class="container p-5">

@include('errors.form_errors')

<form action="/users/{{$auth->id}}" method="POST" enctype="multipart/form-data">
@method('PATCH')
@csrf

アイうろ
    <!-- 【Partial】petsディレクトリ配下のform.blade.phpファイルの読み込み -->
    <div class="row">
            <div class="col-4">名前</div>
            <input readonly name="area" class="form-control col-5 bg-white" type="text" value="{{$request->name}}">
                @if(!isset($auth->image))
                    <div class="col-3"><img src="{{asset('images/no-image.png')}}" alt="エラー発生中"></div>
                @else
                    <div class="col-3"><img src="{{asset('images/'.$auth->image)}}" alt="エラー発生中"></div>
                @endif
    </div>

    <div class="form-group row">
        <label class="col-4 col-form-label" for="host_experience">ペット歴</label>
        <div class="col-6">
            <input readonly name="host_experience" class="form-control col-5 bg-white" type="text" value="{{$request->host_experience}}">
        </div>
    </div>

    
    <div class="form-group row">
        <label class="col-4 col-form-label" for="checkbox">預かり可能なペットの種類</label>
        <div class="col-6 ml-3">
            <div class="ml-4 mt-1 d-inline-block">
                    <input <?= in_array('小型犬',$pettype_names) ? 'disabled' : "disabled checked" ?> value="小型犬" name="pettypes[]" multiple="multiple" type="checkbox" class="form-check-input  @error('checkbox') is-invalid @enderror" id="checkbox">
                    <label  class="form-check-label" for="checkbox">小型犬</label>
            </div>
            <div class="ml-4 mt-1 d-inline-block">
                    <input <?= in_array('大型犬',$pettype_names) ? 'disabled' : "disabled checked" ?> value="大型犬" name="pettypes[]" multiple="multiple" type="checkbox" class="form-check-input  @error('checkbox') is-invalid @enderror" id="checkbox">
                    <label  class="form-check-label" for="checkbox">大型犬</label>
            </div>
            <div class="ml-4 mt-1 d-inline-block">
                    <input <?= in_array('小鳥',$pettype_names)  ? 'disabled' : "disabled checked" ?> value="小鳥" name="pettypes[]" multiple="multiple" type="checkbox" class="form-check-input  @error('checkbox') is-invalid @enderror" id="checkbox">
                    <label  class="form-check-label" for="checkbox">小鳥</label>
            </div>
        </div>
    </div>


    <div class="form-group row">
        <label class="col-4 col-form-label" for="area">お住まいの地域</label>
        <div class="col-6">
            <input readonly name="area" class="form-control col-5 bg-white" type="text" value="{{$request->area}}">
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-9">
        <div class="form-group">
            <label for="comment">預ける方への留意事項など</label>
            <textarea readonly name="comment" class="form-control mt-3 bg-white" id="comment" rows="3">{{$request->comment}}</textarea>
        </div>
        </div>
    </div>

    <div class="form-group d-inline"><!-- bootstrapのクラス -->
        <input type="submit" value="送信" class="btn btn-primary">
    </div>

    <input type="hidden" name="user_id" value="{{ Auth::id() }}">

</form>

</div>
</div>
@endsection
