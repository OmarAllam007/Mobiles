@extends('layout.app')

@section('left')
    <div class="col-md-12 col-sm-12">
        <div class="section-side">
            <h5>
                {{t('Top 10 By Fans')}}
            </h5>
            <ul class="list-group">
                @foreach(\App\Mobile::topfans()->get() as $newMob)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="{{route('mobile.display',[$newMob, strtolower($newMob->brand->name), str_slug($newMob->name)])}}">
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
            style="display:block"
    >
    </Adsense>
@endsection
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
@section('right')
    <div class="col-md-12 col-sm-12">
        <div class="section-side">
            <h5>
                {{t('Top 10 By Price')}}
            </h5>
            <ul class="list-group">
                @foreach(\App\Mobile::byprice()->get() as $newMob)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="{{route('mobile.display',[$newMob, strtolower($newMob->brand->name), str_slug($newMob->name)])}}">
                            {{$newMob->name}}
                        </a>
                        <span class="badge  badge-pill">{{$newMob->main_price_description ?? 0}} </span>
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

