@extends('layout.app')


@section('body')

    @php
        $mobiles = \App\Mobile::all()->each(function ($mobile){

        if($mobile->brand){
                $mobile['show_url'] = route('mobile.display',[$mobile,strtolower($mobile->brand->name),str_slug($mobile->name)]);
                $mobile['image_path'] = asset('storage'.$mobile->image_path ?$mobile->image_path: $mobile->brand->image_path);
        }
     })
    @endphp

    <choose-for-me :brands="{{\App\Brand::all()}}" :mobiles="{{$mobiles}}"></choose-for-me>
@endsection

