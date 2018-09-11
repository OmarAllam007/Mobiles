<div class="form-group {{$errors->has('advertisements[0]')? 'has-error' : ''}}">
    <label for="advertisements[0]">{{t('Advertisement')}} 1</label>
    <input type="text" class=" form-control-sm form-control" name="advertisements[0]" id="advertisements[0]"
           value="{{$mobile->advertisements[0] ?? ''}}">
    @if ($errors->has('advertisements[0]'))
        <div class="error-message">{{$errors->first('advertisements[0]')}}</div>
    @endif
</div>

<div class="form-group {{$errors->has('advertisements[1]')? 'has-error' : ''}}">
    <label for="advertisements[1]">{{t('Advertisement')}} 2</label>
    <input type="text" class=" form-control-sm form-control" name="advertisements[1]" id="advertisements[1]"
           value="{{$mobile->advertisements[1] ?? ''}}">
    @if ($errors->has('advertisements[1]'))
        <div class="error-message">{{$errors->first('advertisements[1]')}}</div>
    @endif
</div>

<div class="form-group {{$errors->has('advertisements[2]')? 'has-error' : ''}}">
    <label for="advertisements[2]">{{t('Advertisement')}} 3</label>
    <input type="text" class=" form-control-sm form-control" name="advertisements[2]" id="advertisements[2]"
           value="{{$mobile->advertisements[2] ?? ''}}">
    @if ($errors->has('advertisements[2]'))
        <div class="error-message">{{$errors->first('advertisements[2]')}}</div>
    @endif
</div>

<div class="form-group {{$errors->has('advertisements[3]')? 'has-error' : ''}}">
    <label for="advertisements[3]">{{t('Advertisement')}} 4</label>
    <input type="text" class=" form-control-sm form-control" name="advertisements[3]" id="advertisements[3]"
           value="{{$mobile->advertisements[3] ?? ''}}">
    @if ($errors->has('advertisements[3]'))
        <div class="error-message">{{$errors->first('advertisements[3]')}}</div>
    @endif
</div>