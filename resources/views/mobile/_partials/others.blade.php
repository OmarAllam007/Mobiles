<fieldset>
    <legend>{{t('Other Features')}}</legend>
</fieldset>

<div class="form-group {{$errors->has('others_gps')? 'has-error' : ''}}">
    <label for="others_gps">{{t('GPS')}}</label>
    <input type="text" class=" form-control-sm form-control" name="others_gps" id="others_gps" value="{{$mobile->others_gps ?? ''}}">
    @if ($errors->has('others_gps'))
        <div class="error-message">{{$errors->first('others_gps')}}</div>
    @endif
</div>

<div class="form-group {{$errors->has('others_sensors')? 'has-error' : ''}}">
    <label for="others_sensors">{{t('Sensors')}}</label>
    <input type="text" class=" form-control-sm form-control" name="others_sensors" id="others_sensors" value="{{$mobile->others_sensors ?? ''}}">
    @if ($errors->has('others_sensors'))
        <div class="error-message">{{$errors->first('others_sensors')}}</div>
    @endif
</div>

<div class="form-group">
    <p>{{t('How to Open')}}</p>
    <label class="checkbox-inline custom-checkbox">
        <input type="checkbox" value="1" name="others_open_device[]"
               @if(isset($mobile['others_open_device']) && in_array(1,$mobile['others_open_device'])) checked
                @endif
        > {{t('Face ID')}}
    </label>
    <label class="checkbox-inline custom-checkbox">
        <input type="checkbox" value="2" name="others_open_device[]"
               @if(isset($mobile['others_open_device']) && in_array(2,$mobile['others_open_device'])) checked
                @endif
        > {{t('Finger Print')}}
    </label>
</div>


<div class="form-group">
    <label class="checkbox-inline custom-checkbox">
        <input type="checkbox" name="others_vr_support"  @if(isset($mobile) && $mobile->others_vr_support) checked @endif> {{t('VR Support')}}
    </label>
</div>

<div class="form-group">
    <label class="checkbox-inline custom-checkbox">
        <input type="checkbox"  name="others_notification_led_support" @if(isset($mobile) && $mobile->others_notification_led_support) checked @endif> {{t('Notification LED')}}
    </label>
</div>

<div class="form-group">
    <label class="checkbox-inline custom-checkbox">
        <input type="checkbox"  name="others_additional_microphone_exist" @if(isset($mobile) && $mobile->others_additional_microphone_exist) checked @endif> {{t('Additional Microphone')}}
    </label>
</div>