{{csrf_field()}}

    <div class="form-group {{$errors->has('name')? 'has-error' : ''}}">
        <label for="name">{{t('Name')}}</label>
        <input type="text" class="form-control" name="name" id="name" value="{{$brand->name ?? ''}}">
        @if ($errors->has('name'))
            <div class="error-message">{{$errors->first('name')}}</div>
        @endif
    </div>

    <div class="form-group {{$errors->has('image_path')? 'has-error' : ''}}">
        <label for="image_path" class="control-label">{{t('Image')}}</label>
        <input type="file" name="image_path" class="form-control" id="image_path">
        @if ($errors->has('image_path'))
            <div class="error-message">{{$errors->first('image_path')}}</div>
        @endif
    </div>

@if(isset($brand))
    <div style="width: 18rem;">
        <div class="form-group {{$errors->has('image_path')? 'has-error' : ''}}">
            <img  class="card-img-top" src="{{asset($brand->image_path)}}" alt="Card image cap">
        </div>
    </div>
@endif

<div class="form-group">
    <button class="btn btn-success"><i class="fa fa-save"></i> {{t('Save')}}</button>
</div>
