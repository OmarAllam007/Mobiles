@extends('layout.app')

@section('header')
    <div class="col-11">
        <h4>{{t('Mobiles')}}</h4>
    </div>
    <div class="col-1">
        <a class="btn btn-outline-success" href="{{route('mobile.create')}}" role="button"><i
                    class="fa fa-plus"></i></a>
    </div>
@stop

@section('body')

    @if ($mobiles->count())
        <div class="row" style="margin-top: 10px" id="mobiles">
            @foreach($mobiles as $mobile)
                <div class="col-2" style="padding:2px">
                    <div class="card text-center" style="align-items: center">
                        <img class="card-img-top img-fluid img-rounded img-responsive" src="{{asset('storage'.$mobile->image_path)}}"
                             style="width: 70px;height: 80px;margin:3px auto;overflow:scroll">
                        <div class="card-body">
                            <h5 class="card-title">{{$mobile->name}}</h5>
                            <form action="{{route('mobile.destroy', $mobile)}}" method="post">
                                <a href="{{route('mobile.edit', $mobile)}}" class="btn btn-sm btn-primary">
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
            el:'#mobiles',
            data:{
                  mobiles:[]
            },
            created(){
                this.mobiles = mobiles
            }
        })

    </script>
@endsection
