@extends('layout.app')

@section('left')
    <div class="col-md-12 col-sm-12">
        <div class="section-side">
            <h5>
                {{t('Top 10 By Fans')}}
            </h5>
            <ul class="list-group">
                @foreach(\App\Mobile::topfans()->get() as $newMob)
                    <li class="list-group-item d-flex justify-content-between align-items-center sweep-to-right">
                        <a href="{{route('mobiles.display',[$newMob, strtolower($newMob->brand->name), str_slug($newMob->name)])}}">
                            <img src="{{$newMob->image_path ? asset('storage' . $newMob->image_path) : asset('storage/no-phone.png')}}" style="width: 50px;height: 50px">
                            {{$newMob->name}}
                        </a>
                        <span class="badge  badge-pill">{{$newMob->number_of_fans ?? 0}} </span>
                    </li>
                @endforeach

            </ul>
        </div>
    </div>
    <br>
    <Adsense
            data-ad-client="ca-pub-1864972736029501"
            data-ad-slot="7077188983"
            data-ad-format="auto"
            data-full-width-responsive="true"
            class="adsbygoogle"
            style="display:block">
    </Adsense>
@endsection
@section('body')
    <h1 class="text-center">Search your criteria to get your ambition</h1>
    <br>
    @php
    $top_prices = \App\Mobile::byprice()->get()->each(function ($mobile){

        if($mobile->brand){
                $mobile['show_url'] = route('mobiles.display',[$mobile,strtolower($mobile->brand->name),str_slug($mobile->name)]);
                $mobile['image_path'] = asset('storage'.$mobile->image_path);
        }
     });

    $top_love = \App\Mobile::topfans()->get();
    @endphp

    <choose-for-me :brands="{{\App\Brand::all()}}"
                   :top_prices="{{$top_prices}}" :top_love="{{$top_love}}"
                   :t="{{json_encode(\App\Translation::getChooseComponent())}}"></choose-for-me>
@endsection
@section('right')
    <div class="col-md-12 col-sm-12">
        <div class="section-side">
            <h5>
                {{t('Top 10 By Price')}}
            </h5>
            <ul class="list-group">
                @foreach(\App\Mobile::byprice()->get() as $newMob)
                    <li class="list-group-item d-flex  justify-content-between align-items-center sweep-to-right">
                        <img src="{{$newMob->image_path ? asset('storage' . $newMob->image_path) : asset('storage/no-phone.png')}}" style="width: 50px;height: 50px">

                        <a href="{{route('mobiles.display',[$newMob, strtolower($newMob->brand->name), str_slug($newMob->name)])}}">
                            {{$newMob->name}}
                        </a>
                        <span class="badge badge-pill">{{$newMob->main_price_description ?? 0}} </span>
                    </li>
                @endforeach

            </ul>
        </div>
    </div>
    <br>
    <Adsense
            data-ad-client="ca-pub-1864972736029501"
            data-ad-slot="7077188983"
            data-ad-format="auto"
            data-full-width-responsive="true"
            class="adsbygoogle"
            style="display:block"
    >
    </Adsense>
@endsection

