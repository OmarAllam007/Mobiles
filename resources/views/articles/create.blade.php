@extends('layout.admin')

@section('header')
    <div class="col-11">
        <h4>{{t('Add Review')}}</h4>
    </div>
    <div class="col-1">
        <a href="{{route('review.index')}}" class="btn btn-outline-info"><i class="fa fa-chevron-left"></i>
        </a>
    </div>

@stop

@section('body')

    <form action="{{route('review.store')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}} {{method_field('post')}}
        @include('reviews._form')
    </form>

@stop
