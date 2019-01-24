@extends('layout.app')

@section('header')

@stop

@section('body')
    <div class="col-md-12">
        <form action="{{route('mobiles.post.bycrawler')}}"  method="post" enctype="multipart/form-data">
            {{csrf_field()}} {{method_field('post')}}

            <div class="form-group {{$errors->has('main_battery_description')? 'has-error' : ''}}">
                <label for="brand_id">{{t('Brand')}}</label>
                <select name="brand_id" class="form-control">
                    <option>Select Brand</option>
                    @foreach(\App\Brand::orderBy('name')->get() as $brand)
                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="url">{{t('Mobile URL')}}</label>
                <textarea class="form-control"  name="url" cols="10" rows="10"></textarea>
            </div>
            @if ($errors->has('main_battery_description'))
                <div class="error-message">{{$errors->first('main_battery_description')}}</div>
            @endif
            <div class="form-group">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
    </div>
@endsection