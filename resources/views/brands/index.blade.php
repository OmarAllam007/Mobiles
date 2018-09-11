@extends('layout.app')

@section('header')
    <div class="col-11">
        <h4>{{t('Brands')}}</h4>
    </div>
    <div class="col-1">
        <a class="btn btn-outline-success" href="{{route('brand.create')}}" role="button"><i
                    class="fa fa-plus"></i></a>
    </div>

@stop

@section('body')
    @if ($brands->count())
        <div class="row" style="margin-top: 10px">
            @foreach($brands as $brand)
                <div class="col-3" style="margin-top: 10px">
                    <div class="card">
                        <img class="card-img-top" src="{{asset('storage'.$brand->image_path)}}"
                             style="height: 20rem;object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{$brand->name}}</h5>
                            <form action="{{route('brand.destroy', $brand)}}" method="post">
                                <a href="{{route('brand.edit', $brand)}}" class="btn btn-primary">
                                    <i class="fa fa-edit"></i>
                                    {{t('Edit')}}
                                </a>
                                {{csrf_field()}} {{method_field('delete')}}
                                <button class="btn  btn-danger"><i class="fa fa-trash"></i>
                                    {{t('Delete')}}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info" style="margin-top: 10px"><i class="fa fa-exclamation-circle"></i>
            <strong>{{t('No Brands found')}}</strong>
        </div>
    @endif
@stop
