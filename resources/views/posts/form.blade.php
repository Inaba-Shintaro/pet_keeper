

    <div class="form-group row mt-5">
        {!! Form::label('term_start', 'お預け開始日') !!}<!-- labelタグを生成 -->
        {!!Form::date('term_start', \Carbon\Carbon::now(),['class' => 'form-control col-3' ]);!!}
    </div><!-- dateの初期値は　value="2018-01-11"　みたいに書けばいけそう -->

    <div class="form-group row mt-5">
        {!! Form::label('term_end', 'お預け終了日') !!}<!-- labelタグを生成 -->
        {!!Form::date('term_end', \Carbon\Carbon::now(),['class' => 'form-control col-3' ]);!!}
    </div><!-- dateの初期値は　value="2018-01-11"　みたいに書けばいけそう -->

    <div class="form-group"><!-- bootstrapのクラス -->
        {!! Form::label('price', 'お値段:') !!}<!-- labelタグを生成 -->
        {!! Form::text('price', $post->price ?? null, ['class' => 'form-control']) !!}<!-- input[type=text]タグを生成 -->
    </div>

    <div class="form-group"><!-- bootstrapのクラス -->
        {!! Form::label('content', 'ペットの特徴、留意事項など') !!}<!-- labelタグを生成 -->
        {!! Form::textarea('content', $post->content ?? null, ['class' => 'form-control']) !!}<!-- textareaタグを生成 -->
    </div>

    <div class="form-group d-inline"><!-- bootstrapのクラス -->
        {!! Form::submit($submitButton, ['class' => 'btn btn-primary form-control']) !!}<!-- input[type=submit]タグを生成 -->
    </div>