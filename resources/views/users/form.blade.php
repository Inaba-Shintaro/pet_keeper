    <div class="row">
            <div class="col-4">名前</div>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror col-4" name="name" value="{{ $auth->name }}" required autocomplete="name" autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            @if(!isset($auth->image))
            <div class="col-3"><img src="{{asset('images/no-image.png')}}" alt="エラー発生中"></div>
            @else
            <div class="col-3"><img src="{{asset('images/'.$auth->image)}}" alt="エラー発生中"></div>
            @endif
    </div>

    <div class="form-group row">
        <label for="image" class="col-4">画像</label>
        <input name="image" type="file" class="form-control-file col-4" id="image">
    </div>

    <div class="form-group row">
        <label class="col-4 col-form-label" for="exampleFormControlSelect1">ペット歴</label>
        <div class="col-6">
            <select name="host_experience" class="form-control col-5  @error('exampleFormControlSelect1') is-invalid @enderror" id="exampleFormControlSelect1" value="{{ old('exampleFormControlSelect1') }}" required autocomplete="exampleFormControlSelect1">
                <option selected></option>
                <option name="host_experience"<?= $auth->host_experience == "1年未満" ? 'selected' : "" ?>>1年未満</option>
                <option name="host_experience"<?= $auth->host_experience == "1~5年" ? 'selected' : "" ?>>1~5年</option>
                <option name="host_experience"<?= $auth->host_experience == "5~10年" ? 'selected' : "" ?>>5~10年</option>
                <option name="host_experience"<?= $auth->host_experience == "10年以上" ? 'selected' : "" ?>>10年以上</option>
            </select>
            @error('exampleFormControlSelect1')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    
    <div class="form-group row">
        <label class="col-4 col-form-label" for="checkbox">預かり可能なペットの種類</label>
        <div class="col-6 ml-3">
            <div class="ml-4 mt-1 d-inline-block">
                    <input <?= in_array('小型犬',$pettype_names) ? 'checked' : "" ?> value="小型犬" name="pettypes[]" multiple="multiple" type="checkbox" class="form-check-input  @error('checkbox') is-invalid @enderror" id="exampleCheck1">
                    <label  class="form-check-label" for="exampleCheck1">小型犬</label>
            </div>
            <div class="ml-4 mt-1 d-inline-block">
                    <input <?= in_array('大型犬',$pettype_names) ? 'checked' : "" ?> value="大型犬" name="pettypes[]" multiple="multiple" type="checkbox" class="form-check-input  @error('checkbox') is-invalid @enderror" id="exampleCheck1">
                    <label  class="form-check-label" for="exampleCheck1">大型犬</label>
            </div>
            <div class="ml-4 mt-1 d-inline-block">
                    <input <?= in_array('小鳥',$pettype_names)  ? 'checked' : "" ?> value="小鳥" name="pettypes[]" multiple="multiple" type="checkbox" class="form-check-input  @error('checkbox') is-invalid @enderror" id="exampleCheck1">
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
        <label class="col-4 col-form-label" for="exampleFormControlSelect2">お住まいの地域</label>
        <div class="col-6">
            <select name="area" class="form-control col-5  @error('exampleFormControlSelect2') is-invalid @enderror" id="exampleFormControlSelect2" value="{{ old('exampleFormControlSelect2') }}" required autocomplete="exampleFormControlSelect2">
            <option type="hidden" name="area" <?= $auth->area == "北海道" ? 'selected' : "" ?>>北海道</option>
            <option type="hidden" name="area" <?= $auth->area == "東北地方" ? 'selected' : "" ?>>東北地方</option>
            <option type="hidden" name="area" <?= $auth->area == "関東" ? 'selected' : "" ?>>関東</option>
            <option type="hidden" name="area" <?= $auth->area == "関西" ? 'selected' : "" ?>>関西</option>
            <option type="hidden" name="area" <?= $auth->area == "四国" ? 'selected' : "" ?>>四国</option>
            <option type="hidden" name="area" <?= $auth->area == "九州" ? 'selected' : "" ?>>九州</option>
            <option type="hidden" name="area" <?= $auth->area == "沖縄" ? 'selected' : "" ?>>沖縄</option>
            </select>
            @error('exampleFormControlSelect2')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-9">
        <div class="form-group">
            <label for="exampleFormControlTextarea1">預ける方への留意事項など</label>
            <textarea name="comment" class="form-control mt-3 bg-white" id="exampleFormControlTextarea1" rows="3">{{$auth->comment}}</textarea>
        </div>
        </div>
    </div>


    <div class="form-group d-inline"><!-- bootstrapのクラス -->
        {!! Form::submit($submitButton, ['class' => 'btn btn-primary form-control']) !!}<!-- input[type=submit]タグを生成 -->
    </div>
