@extends('layout.app')

@section('body')
    <compare :mobiles="{{$mobiles}}"
             :t="{{json_encode(\App\Translation::getCompareComponent())}}"
    >

    </compare>
@endsection