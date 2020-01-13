@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('新規登録') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('名前') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="exampleFormControlSelect1">ペット歴</label>
                            <div class="col-md-6">
                                <select name="host_experience" class="form-control col-5  @error('exampleFormControlSelect1') is-invalid @enderror" id="exampleFormControlSelect1" value="{{ old('exampleFormControlSelect1') }}" required autocomplete="exampleFormControlSelect1">
                                    <option selected></option>
                                    <option name="host_experience">1年未満</option>
                                    <option name="host_experience">1~5年</option>
                                    <option name="host_experience">5~10年</option>
                                    <option name="host_experience">10年以上</option>
                                </select>
                                @error('exampleFormControlSelect1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="checkbox">預かり可能なペットの種類</label>
                            <div class="col-md-6 ml-3">
                                <div class="ml-4 mt-1 d-inline-block">
                                        <input value="小型犬" name="pettypes[]" multiple="multiple" type="checkbox" class="form-check-input  @error('checkbox') is-invalid @enderror" id="exampleCheck1">
                                        <label  class="form-check-label" for="exampleCheck1">小型犬</label>
                                </div>
                                <div class="ml-4 mt-1 d-inline-block">
                                        <input value="大型犬" name="pettypes[]" multiple="multiple" type="checkbox" class="form-check-input  @error('checkbox') is-invalid @enderror" id="exampleCheck1">
                                        <label  class="form-check-label" for="exampleCheck1">大型犬</label>
                                </div>
                                <div class="ml-4 mt-1 d-inline-block">
                                        <input value="小鳥" name="pettypes[]" multiple="multiple" type="checkbox" class="form-check-input  @error('checkbox') is-invalid @enderror" id="exampleCheck1">
                                        <label  class="form-check-label" for="exampleCheck1">小鳥</label>
                                </div>
                                @error('checkbox')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="exampleFormControlSelect2">お住まいの地域</label>
                            <div class="col-md-6">
                                <select name="area" class="form-control col-5  @error('exampleFormControlSelect2') is-invalid @enderror" id="exampleFormControlSelect2" value="{{ old('exampleFormControlSelect2') }}" required autocomplete="exampleFormControlSelect2">
                                <option type="hidden" name="area">北海道</option>
                                <option type="hidden" name="area">東北地方</option>
                                <option type="hidden" name="area">関東</option>
                                <option type="hidden" name="area">関西</option>
                                <option type="hidden" name="area">四国</option>
                                <option type="hidden" name="area">九州</option>
                                <option type="hidden" name="area">沖縄</option>
                                </select>
                                @error('exampleFormControlSelect2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('パスワード（確認）') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('登録する') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
