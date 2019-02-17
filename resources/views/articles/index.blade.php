@extends('layout.admin')

@section('header')
    <div class="d-flex">
        <div class="mr-auto p-2">
            <h4>{{t('Articles')}}</h4>

        </div>
        <div class="p-2"><a class="btn btn-outline-success" href="{{route('article.create')}}"
                                         role="button"><i
                        class="fa fa-plus"></i></a></div>
    </div>
    {{--<div class="col-11">--}}
    {{--</div>--}}
    {{--<div class="col-1">--}}

    {{--</div>--}}

@stop

@section('body')
    @if ($articles->count())
        <div class="row" style="margin-top: 10px">
            @foreach($articles as $article)
                <div class="col-2" style="margin-top: 10px">
                    <div class="card">
                        <img class="card-img-top" src="{{asset('storage'.$article->cover_image)}}"
                             style="height:170px;width: 120px;margin: 0 auto; object-fit: inherit;">
                        <div class="card-body">
                            <h5 class="card-title">{{$article->subject}}</h5>
                            <form action="{{route('article.destroy', $article)}}" method="post">
                                <a href="{{route('article.edit', $article)}}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit"></i>
                                </a>
                                {{csrf_field()}} {{method_field('delete')}}
                                <button class="btn btn-sm  btn-danger"><i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info" style="margin-top: 10px"><i class="fa fa-exclamation-circle"></i>
            <strong>{{t('No Articles found')}}</strong>
        </div>
    @endif
@stop
