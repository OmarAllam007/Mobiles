@extends('layout.app')

@section('header')
    <div class="col-11">
        <h4>{{t('Upload Mobiles')}}</h4>
    </div>
    <div class="col-1">
        <a href="{{route('mobiles.index')}}" class="btn btn-outline-info"><i class="fa fa-chevron-left"></i>
        </a>
    </div>

@stop

@section('body')
    <div class="col-6">
        <form action="{{route('mobiles.upload')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}} {{method_field('post')}}
            <div class="form-group {{$errors->has('mobiles')? 'has-error' : ''}}">
                <label for="mobiles" class="control-label">{{t('File')}}</label>
                <input type="file" name="mobiles" class="form-control" id="mobiles">
                @if ($errors->has('mobiles'))
                    <div class="error-message">{{$errors->first('mobiles')}}</div>
                @endif
            </div>

            <div class="form-group">
                <button class="btn btn-success"><i class="fa fa-save"></i> {{t('Save')}}</button>
            </div>

        </form>
    </div>
@stop
