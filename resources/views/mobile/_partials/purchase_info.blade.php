<fieldset>
    <legend>{{t('Purchase Information')}}</legend>
</fieldset>
<div class="form-group {{$errors->has('colors')? 'has-error' : ''}}">
    <label for="colors">{{t('Colors')}}</label>
    <input type="text" class=" form-control-sm form-control" name="colors" id="colors"
           value="{{$mobile->colors ?? ''}}">
    @if ($errors->has('colors'))
        <div class="error-message">{{$errors->first('colors')}}</div>
    @endif
</div>

<div class="form-group {{$errors->has('price')? 'has-error' : ''}}">
    <label for="price">{{t('Price')}}</label>
    <input type="text" class=" form-control-sm form-control" name="price" id="price"
           value="{{$mobile->price ?? ''}}">
    @if ($errors->has('price'))
        <div class="error-message">{{$errors->first('price')}}</div>
    @endif
</div>