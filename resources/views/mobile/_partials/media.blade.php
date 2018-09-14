<fieldset>
    <legend>{{t('Media')}}</legend>
</fieldset>

<div class="form-group {{$errors->has('media_speaker')? 'has-error' : ''}}">
    <label for="media_speaker">{{t('Speaker')}}</label>
    <input type="text" class=" form-control-sm form-control" name="media_speaker" id="media_speaker" value="{{$mobile->media_speaker ?? ''}}">
    @if ($errors->has('media_speaker'))
        <div class="error-message">{{$errors->first('media_speaker')}}</div>
    @endif
</div>

<div class="form-group {{$errors->has('media_radio_exist')? 'has-error' : ''}}">
    <input type="checkbox"  name="media_radio_exist" id="media_radio_exist" @if($mobile->media_radio_exist) checked @endif>
    <label for="media_radio_exist">{{t('Radio')}}
    </label>
    @if ($errors->has('media_radio_exist'))
        <div class="error-message">{{$errors->first('media_radio_exist')}}</div>
    @endif
</div>
<div class="form-group {{$errors->has('media_is_35_mm_slot')? 'has-error' : ''}}">
    <input type="checkbox"  name="media_is_35_mm_slot" id="media_is_35_mm_slot" @if($mobile->media_is_35_mm_slot) checked @endif>
    <label for="media_is_35_mm_slot">{{t('3.5mm Slot')}}
    </label>
    @if ($errors->has('media_is_35_mm_slot'))
        <div class="error-message">{{$errors->first('media_is_35_mm_slot')}}</div>
    @endif
</div>