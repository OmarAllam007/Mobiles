@extends('layout.app')

@section('header')
    <div class="col-11">
        <h4>{{t('Edit Mobile')}}</h4>
    </div>
    <div class="col-1">
        <a href="{{route('mobile.index')}}" class="btn btn-outline-info"><i class="fa fa-chevron-left"></i>
        </a>
    </div>
@stop


@section('body')
        <form action="{{route('mobile.update',$mobile)}}" class="col-12" method="post" enctype="multipart/form-data">
            {{csrf_field()}} {{method_field('patch')}}
            @include('mobile._form')
        </form>
@stop