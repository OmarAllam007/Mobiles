<fieldset>
    <legend>{{t('Battery')}}</legend>
</fieldset>
<div class="form-group {{$errors->has('battery_type')? 'has-error' : ''}}">
    <label for="battery_type">{{t('Battery Type')}}</label>
    <input type="text" class=" form-control-sm form-control" name="battery_type" id="battery_type" value="{{$mobile->battery_type ?? ''}}">
    @if ($errors->has('battery_type'))
        <div class="error-message">{{$errors->first('battery_type')}}</div>
    @endif
</div>

<div class="form-group {{$errors->has('battery_calls_until')? 'has-error' : ''}}">
    <label for="battery_calls_until">{{t('Calls Until')}}</label>
    <input type="text" class=" form-control-sm form-control" name="battery_calls_until" id="battery_calls_until" value="{{$mobile->battery_calls_until ?? ''}}">
    @if ($errors->has('battery_calls_until'))
        <div class="error-message">{{$errors->first('battery_calls_until')}}</div>
    @endif
</div>

<div class="form-group {{$errors->has('battery_music_until')? 'has-error' : ''}}">
    <label for="battery_music_until">{{t('Music Until')}}</label>
    <input type="text" class=" form-control-sm form-control" name="battery_music_until" id="battery_music_until" value="{{$mobile->battery_music_until ?? ''}}">
    @if ($errors->has('battery_music_until'))
        <div class="error-message">{{$errors->first('battery_music_until')}}</div>
    @endif
</div>

<div class="form-group {{$errors->has('battery_video_until')? 'has-error' : ''}}">
    <label for="battery_video_until">{{t('Video Until')}}</label>
    <input type="text" class=" form-control-sm form-control" name="battery_video_until" id="battery_video_until" value="{{$mobile->battery_video_until ?? ''}}">
    @if ($errors->has('battery_video_until'))
        <div class="error-message">{{$errors->first('battery_video_until')}}</div>
    @endif
</div>

<div class="form-group {{$errors->has('battery_is_removable')? 'has-error' : ''}}">
    <label for="battery_is_removable">{{t('Is Removable')}}
        <input type="checkbox"  name="battery_is_removable" id="battery_is_removable" value="{{$mobile->battery_is_removable ?? ''}}">
    </label>
    @if ($errors->has('battery_is_removable'))
        <div class="error-message">{{$errors->first('battery_is_removable')}}</div>
    @endif
</div>