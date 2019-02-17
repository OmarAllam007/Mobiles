@extends('layout.admin')

@section('header')
    <div class="d-flex">
        <div class="mr-auto p-2">
            <h4>{{t('Reviews')}}</h4>

        </div>
        <div class="p-2"><a class="btn btn-outline-success" href="{{route('review.create')}}"
                                         role="button"><i
                        class="fa fa-plus"></i></a></div>
    </div>
    {{--<div class="col-11">--}}
    {{--</div>--}}
    {{--<div class="col-1">--}}

    {{--</div>--}}

@stop

@section('body')
    @if ($reviews->count())
        <div class="row" style="margin-top: 10px">
            @foreach($reviews as $review)
                <div class="col-2" style="margin-top: 10px">
                    <div class="card">
                        <img class="card-img-top" src="{{asset('storage'.$review->cover_image)}}"
                             style="height:170px;width: 120px;margin: 0 auto; object-fit: inherit;">
                        <div class="card-body">
                            <h5 class="card-title">{{$review->subject}}</h5>
                            <form action="{{route('review.destroy', $review)}}" method="post">
                                <a href="{{route('review.edit', $review)}}" class="btn btn-sm btn-primary">
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
            <strong>{{t('No Reviews found')}}</strong>
        </div>
    @endif
@stop
