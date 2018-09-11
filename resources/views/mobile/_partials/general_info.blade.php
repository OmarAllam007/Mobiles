<fieldset>
    <legend>{{t('General')}}</legend>
</fieldset>


<div class="form-group {{$errors->has('brand_id')? 'has-error' : ''}}">
    <label for="brand_id">{{t('Brand')}}</label>
    <select name="brand_id" class="form-control" id="brand_id">
        <option value="0">{{t('Select Brand')}}</option>
        @foreach(\App\Brand::all() as $brand)
            <option value="{{$brand->id}}" @if(isset($mobile) && $brand->id == $mobile->brand_id) selected @endif>{{$brand->name}}</option>
        @endforeach
    </select>
    @if ($errors->has('brand_id'))
        <div class="error-message">{{$errors->first('brand_id')}}</div>
    @endif
</div>

<div class="form-group {{$errors->has('name')? 'has-error' : ''}}">
    <label for="name">{{t('Name')}}</label>
    <input type="text" class=" form-control-sm form-control" name="name" id="name" value="{{$mobile->name ?? ''}}">
    @if ($errors->has('name'))
        <div class="error-message">{{$errors->first('name')}}</div>
    @endif
</div>

<div class="form-group {{$errors->has('released_date')? 'has-error' : ''}}">
    <label for="released_date">{{t('Released Date')}}</label>
    <input type="date" class=" form-control-sm form-control" name="released_date" id="released_date"
           value="{{$mobile->released_date ?? ''}}">
    @if ($errors->has('released_date'))
        <div class="error-message">{{$errors->first('released_date')}}</div>
    @endif
</div>

<div class="form-group {{$errors->has('operating_system')? 'has-error' : ''}}">
    <label for="operating_system">{{t('Operating System')}}</label>
    <input type="text" class=" form-control-sm form-control" name="operating_system" id="operating_system"
           value="{{$mobile->operating_system ?? ''}}">
    @if ($errors->has('operating_system'))
        <div class="error-message">{{$errors->first('operating_system')}}</div>
    @endif
</div>

<div class="form-group {{$errors->has('device_dimension')? 'has-error' : ''}}">
    <label for="device_dimension">{{t('Device Dimensions')}}</label>
    <input type="text" class=" form-control-sm form-control" name="device_dimension" id="device_dimension"
           value="{{$mobile->device_dimension ?? ''}}">
    @if ($errors->has('device_dimension'))
        <div class="error-message">{{$errors->first('device_dimension')}}</div>
    @endif
</div>


<div class="form-group {{$errors->has('device_weight')? 'has-error' : ''}}">
    <label for="device_weight">{{t('Device Weight')}}</label>
    <input type="text" class=" form-control-sm form-control" name="device_weight" id="device_weight"
           value="{{$mobile->device_weight ?? ''}}">
    @if ($errors->has('device_weight'))
        <div class="error-message">{{$errors->first('device_weight')}}</div>
    @endif
</div>

<div class="form-group {{$errors->has('device_m_o_m')? 'has-error' : ''}}">
    <label for="device_m_o_m">{{t('Material of Manufacture')}}</label>
    <input type="text" class=" form-control-sm form-control" name="device_m_o_m" id="device_m_o_m"
           value="{{$mobile->device_m_o_m ?? ''}}">
    @if ($errors->has('device_m_o_m'))
        <div class="error-message">{{$errors->first('device_m_o_m')}}</div>
    @endif
</div>

<div class="form-group {{$errors->has('device_number_of_sims')? 'has-error' : ''}}">
    <label for="device_number_of_sims">{{t('Number of SIMs')}}</label>
    <input type="text" class=" form-control-sm form-control" name="device_number_of_sims" id="device_number_of_sims"
           value="{{$mobile->device_number_of_sims ?? ''}}">
    @if ($errors->has('device_number_of_sims'))
        <div class="error-message">{{$errors->first('device_number_of_sims')}}</div>
    @endif
</div>

<div class="form-group {{$errors->has('device_size_of_sim')? 'has-error' : ''}}">
    <label for="device_size_of_sim">{{t('Size of SIM')}}</label>
    <input type="text" class=" form-control-sm form-control" name="device_size_of_sim" id="device_size_of_sim"
           value="{{$mobile->device_size_of_sim ?? ''}}">
    @if ($errors->has('device_size_of_sim'))
        <div class="error-message">{{$errors->first('device_size_of_sim')}}</div>
    @endif
</div>