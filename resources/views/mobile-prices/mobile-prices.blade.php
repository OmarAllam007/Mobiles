@extends('layout.app')

@section('body')
    <mobile-prices :brands="{{$brands}}"
                   :t="{{json_encode(\App\Translation::getPricesComponent())}}">
    </mobile-prices>
@endsection