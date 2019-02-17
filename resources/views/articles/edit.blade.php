@extends('layout.admin')

@section('header')
    <div class="col-9">
        <h4 class="pull-left">{{t('Edit Review')}}</h4>

    </div>
    <div class="col-3">
        <form action="{{route('review.destroy', $review)}}" class="pull-right" method="post">
            {{csrf_field()}} {{method_field('delete')}}
            <a href="{{route('review.index')}}" class="btn btn-outline-primary"><i class="fa fa-chevron-left"></i></a>
            <button class="btn btn-outline-danger" type="submit"><i class="fa fa-trash"></i></button>
        </form>
    </div>

@stop


@section('body')
    <div class="col-12">
        <form action="{{route('review.update',$review)}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}} {{method_field('patch')}}
            @include('articles._form')
        </form>
    </div>
@stop
