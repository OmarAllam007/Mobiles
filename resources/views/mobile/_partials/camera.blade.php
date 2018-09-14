<fieldset>
    <legend>{{t('Camera')}}</legend>
</fieldset>
<div class="form-group {{$errors->has('camera_main_camera')? 'has-error' : ''}}">
    <label for="camera_main_camera">{{t('Main Camera')}}</label>
    <input type="text" class=" form-control-sm form-control" name="camera_main_camera" id="camera_main_camera" value="{{$mobile->camera_main_camera ?? ''}}">
    @if ($errors->has('camera_main_camera'))
        <div class="error-message">{{$errors->first('camera_main_camera')}}</div>
    @endif
</div>

<div class="form-group {{$errors->has('camera_flash')? 'has-error' : ''}}">
    <label for="camera_flash">{{t('Flash')}}</label>
    <input type="text" class=" form-control-sm form-control" name="camera_flash" id="camera_flash" value="{{$mobile->camera_flash ?? ''}}">
    @if ($errors->has('camera_flash'))
        <div class="error-message">{{$errors->first('camera_flash')}}</div>
    @endif
</div>

<div class="form-group {{$errors->has('camera_lens_aperture')? 'has-error' : ''}}">
    <label for="camera_lens_aperture">{{t('Aperture')}}</label>
    <input type="text" class=" form-control-sm form-control" name="camera_lens_aperture" id="camera_lens_aperture" value="{{$mobile->camera_lens_aperture ?? ''}}">
    @if ($errors->has('camera_lens_aperture'))
        <div class="error-message">{{$errors->first('camera_lens_aperture')}}</div>
    @endif
</div>

<div class="form-group {{$errors->has('camera_focal_length')? 'has-error' : ''}}">
    <label for="camera_focal_length">{{t('Focal Length')}}</label>
    <input type="text" class=" form-control-sm form-control" name="camera_focal_length" id="camera_focal_length" value="{{$mobile->camera_focal_length ?? ''}}">
    @if ($errors->has('camera_focal_length'))
        <div class="error-message">{{$errors->first('camera_focal_length')}}</div>
    @endif
</div>

<div class="form-group {{$errors->has('camera_sensor_size')? 'has-error' : ''}}">
    <label for="camera_sensor_size">{{t('Sensor Size')}}</label>
    <input type="text" class=" form-control-sm form-control" name="camera_sensor_size" id="camera_sensor_size" value="{{$mobile->camera_sensor_size ?? ''}}">
    @if ($errors->has('camera_sensor_size'))
        <div class="error-message">{{$errors->first('camera_sensor_size')}}</div>
    @endif
</div>

<div class="form-group {{$errors->has('camera_other_features')? 'has-error' : ''}}">
    <label for="camera_other_features">{{t('Other Features')}}</label>
    <input type="text" class=" form-control-sm form-control" name="camera_other_features" id="camera_other_features" value="{{$mobile->camera_other_features ?? ''}}">
    @if ($errors->has('camera_other_features'))
        <div class="error-message">{{$errors->first('camera_other_features')}}</div>
    @endif
</div>

<div class="form-group {{$errors->has('camera_video')? 'has-error' : ''}}">
    <label for="camera_video">{{t('Video')}}</label>
    <input type="text" class=" form-control-sm form-control" name="camera_video" id="camera_video" value="{{$mobile->camera_video ?? ''}}">
    @if ($errors->has('camera_video'))
        <div class="error-message">{{$errors->first('camera_video')}}</div>
    @endif
</div>

<div class="form-group {{$errors->has('camera_front_camera')? 'has-error' : ''}}">
    <label for="camera_front_camera">{{t('Front Camera')}}</label>
    <input type="text" class=" form-control-sm form-control" name="camera_front_camera" id="camera_front_camera" value="{{$mobile->camera_front_camera ?? ''}}">
    @if ($errors->has('camera_front_camera'))
        <div class="error-message">{{$errors->first('camera_front_camera')}}</div>
    @endif
</div>

<div class="form-group {{$errors->has('camera_front_camera_features')? 'has-error' : ''}}">
    <label for="camera_front_camera_features">{{t('Front Camera Features')}}</label>
    <input type="text" class=" form-control-sm form-control" name="camera_front_camera_features" id="camera_front_camera_features" value="{{$mobile->camera_front_camera_features ?? ''}}">
    @if ($errors->has('camera_front_camera_features'))
        <div class="error-message">{{$errors->first('camera_front_camera_features')}}</div>
    @endif
</div>