@extends('layout.app')

@section('header')
    <div class="col-11">
        <h4>{{t('Add Mobile')}}</h4>
    </div>
    <div class="col-1">
        <a href="{{route('mobile.index')}}" class="btn btn-outline-info"><i class="fa fa-chevron-left"></i>
        </a>
    </div>

@stop

@section('body')
    <div class="col-12">
        <form action="{{route('mobile.store')}}" class="row" method="post" enctype="multipart/form-data">
            {{csrf_field()}} {{method_field('post')}}
            @include('mobile._form')
        </form>
    </div>
@stop
