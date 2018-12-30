@extends('layout.app')

@section('header')
    <div class="col-md-11 text-center">
        <h4>{{t('Mobiles')}}</h4>
    </div>
    <div class="col-md-1">
        <a class="btn btn-outline-success" href="{{route('mobiles.create')}}" role="button"><i
                    class="fa fa-plus"></i></a>
    </div>



@stop

@section('body')
    <div class="row">
        <div class="col-md-12">
            <form class="form-inline" method="get" action="{{route('mobile.search')}}">
                <div class="form-group col-md-10 mb-2">
                    <input class="form-control col-md-12" name="q" placeholder="Search by Name">
                </div>
                <div class="form-group mx-sm-2 mb-2">
                    <button class="btn btn-sm btn-outline-info">
                        {{t('Search')}}
                    </button>
                </div>
            </form>
        </div>
    </div>
    @if ($mobiles->count())
        <div class="row" style="margin-top: 10px" id="mobiles">
            @foreach($mobiles as $mobile)
                <div class="col-md-3" style="padding:2px">
                    <div class="card hvr-glow li-item-card text-center" style="align-items: center">
                        <img class="card-img-top img-fluid img-rounded img-responsive"
                             src="{{asset('storage'.$mobile->image_path)}}"
                             style="width: 70px;height: 80px;margin:3px auto;overflow:scroll">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 12pt">{{$mobile->name}}</h5>
                            <form action="{{route('mobiles.destroy', $mobile)}}" method="post">
                                <a href="{{route('mobiles.edit', $mobile)}}" class="btn btn-sm btn-site-primary">
                                    <i class="fa fa-edit"></i>
                                </a>
                                {{csrf_field()}} {{method_field('delete')}}
                                <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info" style="margin-top: 10px">
            <i class="fa fa-exclamation-circle"></i>
            <strong>{{t('No Mobiles found')}}</strong>
        </div>
    @endif

@endsection

@section('scripts')
    <script>
        let mobiles = {!! $mobiles !!}
        new Vue({
            el: '#mobiles',
            data: {
                mobiles: []
            },
            created() {
                this.mobiles = mobiles
            }
        })

    </script>
@endsection
