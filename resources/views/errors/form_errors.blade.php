
<!-- resources/views/errors/form_errors.blade.php -->

@if ($errors->any())<!-- もしエラーがあった場合 -->
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)<!-- エラーの数だけ繰り返し＝エラー全て表示 -->
            <li>{{ $error }}</li><!-- エラー文表示 -->
        @endforeach
    </ul>
@endif