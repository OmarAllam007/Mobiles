<fieldset>
    <legend>{{t('Screen')}}</legend>
</fieldset>
<div class="form-group {{$errors->has('screen_size')? 'has-error' : ''}}">
    <label for="screen_size">{{t('Screen Size')}}</label>
    <input type="text" class=" form-control-sm form-control" name="screen_size" id="screen_size"
           value="{{$mobile->screen_size ?? ''}}">
    @if ($errors->has('screen_size'))
        <div class="error-message">{{$errors->first('screen_size')}}</div>
    @endif
</div>

<div class="form-group {{$errors->has('screen_size_percentage')? 'has-error' : ''}}">
    <label for="screen_size_percentage">{{t('Screen Size Percentage')}}</label>
    <input type="text" class=" form-control-sm form-control" name="screen_size_percentage" id="screen_size_percentage"
           value="{{$mobile->screen_size_percentage ?? ''}}">
    @if ($errors->has('screen_size_percentage'))
        <div class="error-message">{{$errors->first('screen_size_percentage')}}</div>
    @endif
</div>

<div class="form-group {{$errors->has('screen_resolution')? 'has-error' : ''}}">
    <label for="screen_resolution">{{t('Screen Resolution')}}</label>
    <input type="text" class=" form-control-sm form-control" name="screen_resolution" id="screen_resolution"
           value="{{$mobile->screen_resolution ?? ''}}">
    @if ($errors->has('screen_resolution'))
        <div class="error-message">{{$errors->first('screen_resolution')}}</div>
    @endif
</div>

<div class="form-group {{$errors->has('screen_dimensions')? 'has-error' : ''}}">
    <label for="screen_dimensions">{{t('Screen Dimensions')}}</label>
    <input type="text" class=" form-control-sm form-control" name="screen_dimensions" id="screen_dimensions"
           value="{{$mobile->screen_dimensions ?? ''}}">
    @if ($errors->has('screen_dimensions'))
        <div class="error-message">{{$errors->first('screen_dimensions')}}</div>
    @endif
</div>

<div class="form-group {{$errors->has('screen_density_of_pixels')? 'has-error' : ''}}">
    <label for="screen_density_of_pixels">{{t('Density of Pixels')}}</label>
    <input type="text" class=" form-control-sm form-control" name="screen_density_of_pixels" id="screen_density_of_pixels"
           value="{{$mobile->screen_density_of_pixels ?? ''}}">
    @if ($errors->has('screen_density_of_pixels'))
        <div class="error-message">{{$errors->first('screen_density_of_pixels')}}</div>
    @endif
</div>

<div class="form-group {{$errors->has('screen_technology')? 'has-error' : ''}}">
    <label for="screen_technology">{{t('Screen Technology')}}</label>
    <input type="text" class=" form-control-sm form-control" name="screen_technology" id="screen_technology"
           value="{{$mobile->screen_technology ?? ''}}">
    @if ($errors->has('screen_technology'))
        <div class="error-message">{{$errors->first('screen_technology')}}</div>
    @endif
</div>

<div class="form-group {{$errors->has('screen_colors')? 'has-error' : ''}}">
    <label for="screen_colors">{{t('Screen Colors')}}</label>
    <input type="text" class=" form-control-sm form-control" name="screen_colors" id="screen_colors"
           value="{{$mobile->screen_colors ?? ''}}">
    @if ($errors->has('screen_colors'))
        <div class="error-message">{{$errors->first('screen_colors')}}</div>
    @endif
</div>

<div class="form-group {{$errors->has('screen_touch_features')? 'has-error' : ''}}">
    <label for="screen_touch_features">{{t('Touch')}}</label>
    <input type="text" class=" form-control-sm form-control" name="screen_touch_features" id="screen_touch_features"
           value="{{$mobile->screen_touch_features ?? ''}}">
    @if ($errors->has('screen_touch_features'))
        <div class="error-message">{{$errors->first('screen_touch_features')}}</div>
    @endif
</div>

<div class="form-group {{$errors->has('screen_protection')? 'has-error' : ''}}">
    <label for="screen_protection">{{t('Screen Protection')}}</label>
    <input type="text" class=" form-control-sm form-control" name="screen_protection" id="screen_protection"
           value="{{$mobile->screen_protection ?? ''}}">
    @if ($errors->has('screen_protection'))
        <div class="error-message">{{$errors->first('screen_protection')}}</div>
    @endif
</div>

<div class="form-group {{$errors->has('screen_extra_features')? 'has-error' : ''}}">
    <label for="screen_extra_features">{{t('Screen Extra Features')}}</label>
    <input type="text" class=" form-control-sm form-control" name="screen_extra_features" id="screen_extra_features"
           value="{{$mobile->screen_extra_features ?? ''}}">
    @if ($errors->has('screen_extra_features'))
        <div class="error-message">{{$errors->first('screen_extra_features')}}</div>
    @endif
</div>