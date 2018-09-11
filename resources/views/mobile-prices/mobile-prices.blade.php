@extends('layout.app')

@section('body')
    <mobile-prices :brands="{{$brands}}">
    </mobile-prices>
@endsection