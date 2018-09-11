<fieldset>
    <legend>{{t('Affiliate URLs')}}</legend>
</fieldset>
<div class="form-group {{$errors->has('url_souq')? 'has-error' : ''}}">
    <label for="url_souq">{{t('Souq')}}</label>
    <input type="text" class=" form-control-sm form-control" name="url_souq" id="url_souq"
           value="{{$mobile->url_souq ?? ''}}">
    @if ($errors->has('url_souq'))
        <div class="error-message">{{$errors->first('url_souq')}}</div>
    @endif
</div>

<div class="form-group {{$errors->has('url_jumia')? 'has-error' : ''}}">
    <label for="url_jumia">{{t('Jumia')}}</label>
    <input type="text" class=" form-control-sm form-control" name="url_jumia" id="url_jumia"
           value="{{$mobile->url_jumia ?? ''}}">
    @if ($errors->has('url_jumia'))
        <div class="error-message">{{$errors->first('url_jumia')}}</div>
    @endif
</div>

<div class="form-group {{$errors->has('url_amazon')? 'has-error' : ''}}">
    <label for="url_amazon">{{t('Amazon')}}</label>
    <input type="text" class=" form-control-sm form-control" name="url_amazon" id="url_amazon"
           value="{{$mobile->url_amazon ?? ''}}">
    @if ($errors->has('url_amazon'))
        <div class="error-message">{{$errors->first('url_amazon')}}</div>
    @endif
</div>