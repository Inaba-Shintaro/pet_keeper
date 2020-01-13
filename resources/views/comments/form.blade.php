

<div class="form-group"><!-- bootstrapのクラス -->
    {!! Form::label('comment', '新規コメント') !!}<!-- labelタグを生成 -->
    {!! Form::textarea('comment', $comment->comment ?? null, ['class' => 'form-control']) !!}<!-- textareaタグを生成 -->
</div>


<div class="form-group d-inline"><!-- bootstrapのクラス -->
    {!! Form::submit($submitButton, ['class' => 'btn btn-primary form-control']) !!}<!-- input[type=submit]タグを生成 -->
</div>