<?php use Carbon\Carbon;?>
    
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right" for="exampleFormControlSelect2">お預けるペット</label>
        <div class="col-md-6">
            <select name="pet_id" class="form-control col-5  @error('exampleFormControlSelect2') is-invalid @enderror" id="exampleFormControlSelect2" value="{{ old('exampleFormControlSelect2') }}" required autocomplete="exampleFormControlSelect2">
            @foreach($user->pets as $pet)
                @isset($post->pet_id)
                <option type="hidden" value="{{$pet->id}}" name="pet_id" <?=$post->pet_id == $pet->id ? 'selected' : ""?>>{{$pet->name}}</option>
                @else
                <option type="hidden" value="{{$pet->id}}" name="pet_id">{{$pet->name}}</option>
                @endisset
            @endforeach
            </select>
            @error('exampleFormControlSelect2')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <label class="col-4" for="exampleFormControlSelect1">預けたい期間</label>

    <div class="form-group row mt-5">
        {!! Form::label('term_start', 'お預け開始日') !!}<!-- labelタグを生成 -->
        @isset($post->term_start)
        <input type="hidden" name="term_start" class="form-control col-3" value="<?=date('Y-m-d', strtotime($post->term_start))?>">
        @else
        <input type="hidden" name="term_start" class="form-control col-3" value="<?=Carbon::now()?>">
        @endisset
    </div><!-- dateの初期値は　value="2018-01-11"　みたいに書けばいけそう -->

    <div class="form-group row mt-5">
        {!! Form::label('term_end', 'お預け終了日') !!}<!-- labelタグを生成 -->
        @isset($post->term_end)
        <input type="hidden" name="term_end" class="form-control col-3" value="<?=date('Y-m-d', strtotime($post->term_end))?>">
        @else
        <input type="hidden" name="term_end" class="form-control col-3" value="<?=Carbon::now()?>">
        @endisset
    </div><!-- dateの初期値は　value="2018-01-11"　みたいに書けばいけそう -->

    <div class="form-group"><!-- bootstrapのクラス -->
        {!! Form::label('price', 'お値段:') !!}<!-- labelタグを生成 -->
        {!!Form::token('price', $post->price ?? null, ['class' => 'form-control'])!!}
    </div>

    <div class="form-group"><!-- bootstrapのクラス -->
        {!! Form::label('content', 'ペットの特徴、留意事項など') !!}<!-- labelタグを生成 -->
        {!! Form::textarea('content', $post->content ?? null, ['class' => 'form-control']) !!}<!-- textareaタグを生成 -->
    </div>

    <div class="form-group d-inline"><!-- bootstrapのクラス -->
        {!! Form::submit($submitButton, ['class' => 'btn btn-primary form-control']) !!}<!-- input[type=submit]タグを生成 -->
    </div>
