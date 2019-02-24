@extends('layout.app')

@section('header')
    <div class="col-11">
        <h4>{{t('Add Article')}}</h4>
    </div>
    <div class="col-1">
        <a href="{{route('article.index')}}" class="btn btn-outline-info"><i class="fa fa-chevron-left"></i>
        </a>
    </div>

@endsection

@section('body')

    <form action="{{route('article.store')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}} {{method_field('post')}}
        @include('articles._form')
    </form>

@endsection
