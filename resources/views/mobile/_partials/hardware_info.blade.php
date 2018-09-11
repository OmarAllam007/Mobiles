<fieldset>
    <legend>{{t('Hardware')}}</legend>
</fieldset>
<div class="form-group {{$errors->has('processor')? 'has-error' : ''}}">
    <label for="processor">{{t('Processor')}}</label>
    <input type="text" class=" form-control-sm form-control" name="processor" id="processor"
           value="{{$mobile->processor ?? ''}}">
    @if ($errors->has('processor'))
        <div class="error-message">{{$errors->first('processor')}}</div>
    @endif
</div>

<div class="form-group {{$errors->has('chipset')? 'has-error' : ''}}">
    <label for="chipset">{{t('Chipset')}}</label>
    <input type="text" class=" form-control-sm form-control" name="chipset" id="chipset"
           value="{{$mobile->chipset ?? ''}}">
    @if ($errors->has('chipset'))
        <div class="error-message">{{$errors->first('chipset')}}</div>
    @endif
</div>

<div class="form-group {{$errors->has('graphical_processor')? 'has-error' : ''}}">
    <label for="graphical_processor">{{t('Graphical Processor')}}</label>
    <input type="text" class=" form-control-sm form-control" name="graphical_processor" id="graphical_processor"
           value="{{$mobile->graphical_processor ?? ''}}">
    @if ($errors->has('graphical_processor'))
        <div class="error-message">{{$errors->first('graphical_processor')}}</div>
    @endif
</div>