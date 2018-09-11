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
    <section class="col-12">
        @if ($brands->count())
            @foreach($brands as $brand)
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{asset($brand->image_path)}}">
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
            @endforeach

        @else
            <div class="alert alert-info"><i class="fa fa-exclamation-circle"></i>
                <strong>{{t('No Brands found')}}</strong>
            </div>
        @endif
    </section>
@stop
