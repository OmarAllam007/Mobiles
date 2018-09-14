<fieldset>
    <legend>{{t('Communications')}}</legend>
</fieldset>

<div class="form-group {{$errors->has('communication_bluetooth')? 'has-error' : ''}}">
    <label for="communication_bluetooth">{{t('Bluetooth')}}</label>
    <input type="text" class=" form-control-sm form-control" name="communication_bluetooth" id="communication_bluetooth" value="{{$mobile->communication_bluetooth ?? ''}}">
    @if ($errors->has('communication_bluetooth'))
        <div class="error-message">{{$errors->first('communication_bluetooth')}}</div>
    @endif
</div>

<div class="form-group {{$errors->has('communication_wifi')? 'has-error' : ''}}">
    <label for="communication_wifi">{{t('WIFI')}}</label>
    <input type="text" class=" form-control-sm form-control" name="communication_wifi" id="communication_wifi" value="{{$mobile->communication_wifi ?? ''}}">
    @if ($errors->has('communication_wifi'))
        <div class="error-message">{{$errors->first('communication_wifi')}}</div>
    @endif
</div>

<div class="form-group {{$errors->has('communication_usb')? 'has-error' : ''}}">
    <label for="communication_usb">{{t('USB')}}</label>
    <input type="text" class=" form-control-sm form-control" name="communication_usb" id="communication_usb" value="{{$mobile->communication_usb ?? ''}}">
    @if ($errors->has('communication_usb'))
        <div class="error-message">{{$errors->first('communication_usb')}}</div>
    @endif
</div>


<div class="form-group">
    <p>{{t('Network')}}</p>
    <label class="checkbox-inline custom-checkbox">
        <input type="checkbox" value="1" name="communication_network[]"> 2G
    </label>
    <label class="checkbox-inline custom-checkbox">
        <input type="checkbox" value="2" name="communication_network[]"> 3G
    </label>
    <label class="checkbox-inline custom-checkbox">
        <input type="checkbox" value="3" name="communication_network[]"> 4G
    </label>

    <label class="checkbox-inline custom-checkbox">
        <input type="checkbox" value="4" name="communication_network[]"> 5G
    </label>
</div>



<div class="form-group {{$errors->has('communication_hotspot')? 'has-error' : ''}}">
    <label for="communication_hotspot">{{t('Hotspot')}}
        <input type="checkbox"  name="communication_hotspot" id="communication_hotspot"  @if($mobile->communication_hotspot) checked @endif>
    </label>
    @if ($errors->has('communication_hotspot'))
        <div class="error-message">{{$errors->first('communication_hotspot')}}</div>
    @endif
</div>

<div class="form-group {{$errors->has('communication_nfc')? 'has-error' : ''}}">
    <label for="communication_nfc">{{t('NFC')}}
        <input type="checkbox"  name="communication_nfc" id="communication_nfc"  @if($mobile->communication_nfc) checked @endif>
    </label>
    @if ($errors->has('communication_nfc'))
        <div class="error-message">{{$errors->first('communication_nfc')}}</div>
    @endif
</div>



<div class="form-group {{$errors->has('communication_otg')? 'has-error' : ''}}">
    <label for="communication_otg">{{t('OTG')}}
        <input type="checkbox"  name="communication_otg" id="communication_otg"  @if($mobile->communication_otg) checked @endif>
    </label>
    @if ($errors->has('communication_otg'))
        <div class="error-message">{{$errors->first('communication_otg')}}</div>
    @endif
</div>

<div class="form-group {{$errors->has('communication_ir')? 'has-error' : ''}}">
    <label for="communication_ir">{{t('IR')}}
        <input type="checkbox"  name="communication_ir" id="communication_ir"  @if($mobile->communication_ir) checked @endif>
    </label>
    @if ($errors->has('communication_ir'))
        <div class="error-message">{{$errors->first('communication_ir')}}</div>
    @endif
</div>