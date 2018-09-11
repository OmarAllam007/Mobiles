@extends('layout.app')

@section('header')
    <div class="col-11">
        <h4>{{t('Add Brand')}}</h4>
    </div>
    <div class="col-1">
        <a href="{{route('brand.index')}}" class="btn btn-outline-info"><i class="fa fa-chevron-left"></i>
        </a>
    </div>

@stop

@section('body')
    <div class="col-6">
        <form action="{{route('brand.store')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}} {{method_field('post')}}
            @include('brands._form')
        </form>
    </div>
@stop
