@extends('layout.app')


@section('body')

    @php
        $mobiles = \App\Mobile::all()->each(function ($mobile){

        if($mobile->brand){
                $mobile['show_url'] = route('mobile.display',[$mobile,strtolower($mobile->brand->name),str_slug($mobile->name)]);
                $mobile['image_path'] = asset('storage'.$mobile->image_path);
        }
     });

    $top_prices = \App\Mobile::byprice()->get()->each(function ($mobile){

        if($mobile->brand){
                $mobile['show_url'] = route('mobile.display',[$mobile,strtolower($mobile->brand->name),str_slug($mobile->name)]);
                $mobile['image_path'] = asset('storage'.$mobile->image_path);
        }
     });

    $top_love = \App\Mobile::topfans()->get();
    @endphp

    <choose-for-me :brands="{{\App\Brand::all()}}" :mobiles="{{$mobiles}}"
                   :top_prices="{{$top_prices}}" :top_love="{{$top_love}}"></choose-for-me>
@endsection

