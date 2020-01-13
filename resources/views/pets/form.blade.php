<div class="form-group"><!-- bootstrapのクラス -->
    {!! Form::label('name', 'ペットのお名前:') !!}<!-- labelタグを生成 -->
    {!! Form::text('name', $pet->name ?? null, ['class' => 'form-control']) !!}<!-- input[type=text]タグを生成 -->
</div>

@if(!isset($pet->image))
<div class="col-3"><img src="{{asset('images/no-image.png')}}" alt="エラー発生中"></div>
@else
<div class="col-3"><img src="{{asset('images/'.$pet->image)}}" alt="エラー発生中"></div>
@endif

<div class="form-group"><!-- bootstrapのクラス -->
    {!! Form::label('image', '画像:') !!}<!-- labelタグを生成 -->
    {!! Form::file('image');!!}<!-- input[type=text]タグを生成 -->
</div>


{!! Form::label('pettype_id', 'ペットの種類:') !!}<!-- labelタグを生成 -->
<div class="form-group"><!-- bootstrapのクラス -->
    @foreach($pettypes as $pettype)
    {!! Form::label('pettype_id', $pettype->type_name) !!}<!-- labelタグを生成 -->
        @if(!isset($pet))
        <input type="radio" name="pettype_id" value="{{$pettype->id}}">
        @else
        <input type="radio" name="pettype_id" value="{{$pettype->id}}"<?= $pet->pettype_id == $pettype->id  ? 'checked' : "" ?>>
        @endif
    @endforeach
</div>


{!! Form::label('gender', '性別:') !!}<!-- labelタグを生成 -->
<div class="form-group"><!-- bootstrapのクラス -->
@if(!isset($pet))
        {!! Form::label('gender', 'オス') !!}<!-- labelタグを生成 -->
        {!!Form::radio('gender', '1')!!}
        {!! Form::label('gender', 'メス') !!}<!-- labelタグを生成 -->
        {!!Form::radio('gender', '2')!!}
@else
    @if($pet->gernder == 1)
        {!! Form::label('gender', 'オス') !!}<!-- labelタグを生成 -->
        {!!Form::radio('gender', '1',true)!!}
        {!! Form::label('gender', 'メス') !!}<!-- labelタグを生成 -->
        {!!Form::radio('gender', '2')!!}
    @else
        {!! Form::label('gender', 'オス') !!}<!-- labelタグを生成 -->
        {!!Form::radio('gender', '1',true)!!}
        {!! Form::label('gender', 'メス') !!}<!-- labelタグを生成 -->
        {!!Form::radio('gender', '2',true)!!}
    @endif
@endif

</div>

<div class="form-group"><!-- bootstrapのクラス -->
    {!! Form::label('characteristic', 'ペットの特徴、留意事項など') !!}<!-- labelタグを生成 -->
    {!! Form::textarea('characteristic', $pet->characteristic ?? null, ['class' => 'form-control']) !!}<!-- textareaタグを生成 -->
</div>

<div class="form-group d-inline"><!-- bootstrapのクラス -->
    {!! Form::submit($submitButton, ['class' => 'btn btn-primary form-control']) !!}<!-- input[type=submit]タグを生成 -->
</div>



