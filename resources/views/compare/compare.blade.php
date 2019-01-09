@extends('layout.app')

@section('body')
    <h1 class="text-center">
        Compare, select then enjoy :)
    </h1>
    <br>
    <compare :t="{{json_encode(\App\Translation::getCompareComponent())}}"></compare>
@endsection