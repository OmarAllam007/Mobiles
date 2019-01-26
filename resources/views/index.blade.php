@extends('layout.app')


@section('right')
    <div class="col-md-12 col-sm-12">
        <div class="mobile-banner-container">
            <div class="mobile-banner-container-title">
                <h5> {{t('Top 10 By Hits')}}</h5>
            </div>

            @foreach(\App\Mobile::tophits()->get() as $newMob)
                <div>
                    <a title="{{$newMob->name}}" class="mobile-banner-container-item"
                       href="{{route('mobiles.display',[$newMob, strtolower($newMob->brand->name), str_slug($newMob->name)])}}">
                        <div class="image-container">
                            <img class="mobile-banner-container-item-image"
                                 src="{{$newMob->image_path ? asset('storage' . $newMob->image_path) : asset('storage/no-phone.png')}}">
                        </div>
                        <div class="mobile-banner-container-item-text">
                            <p class="mobile-banner-container-item-name">
                                {{$newMob->name}}
                            </p>

                            <p class="badge badge-pill mobile-banner-container-item-badge">{{$newMob->number_of_hits ?? 0}} </p>
                        </div>

                    </a>
                </div>
            @endforeach
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
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="mobile-banner-container">
                <div class="mobile-banner-container-title">
                    <h5>
                        {{t('Top 10 Latest Mobiles')}}
                    </h5>
                </div>

                @foreach(\App\Mobile::latestmobiles()->get() as $newMob)
                    <div>
                        <a title="{{$newMob->name}}" class="mobile-banner-container-item"
                           href="{{route('mobiles.display',[$newMob, strtolower($newMob->brand->name), str_slug($newMob->name)])}}">
                            <div class="image-container">
                                <img class="mobile-banner-container-item-image"
                                     src="{{$newMob->image_path ? asset('storage' . $newMob->image_path) : asset('storage/no-phone.png')}}">
                            </div>
                            <div class="mobile-banner-container-item-text">
                                <p class="mobile-banner-container-item-name">
                                    {{$newMob->name}}
                                </p>

                                <p class="badge badge-pill mobile-banner-container-item-badge">{{$newMob->number_of_hits ?? 0}} </p>
                            </div>

                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="section-side container-brands" style="background-color: white;border-radius: 5px;">
                <h5 class="text-center">
                    {{t('BRANDS')}}
                </h5>

                @php
                    $topMobiles = \App\Mobile::tophits()->get()->pluck('brand_id');
                    $brands = \App\Brand::whereIn('id',$topMobiles)->get()->take(9)->sortBy('name');
                @endphp

                <div class="brands-container">
                    @foreach($brands as $key=>$brand)
                            <a title="{{$brand->name}}" class="brands-tile-container"   href="{{route('brand.mobiles',$brand)}}">
                                <img class="brands-tile-image" src="{{asset('storage'.$brand->image_path)}}">
                                <p>{{$brand->name}}</p>
                            </a>
                    @endforeach


                        <a title="All Brands" class="brands-tile-container" style="justify-content: center;align-items: flex-start"  href="{{route('brand.all')}}">
                            <p>{{t('All Brands')}}</p>
                        </a>

                </div>
            </div>
        </div>
    </div>
@endsection


@section('left')
    <div class="col-md-12 col-sm-12">
        <div class="mobile-banner-container">
            <div class="mobile-banner-container-title">
                {{t('Top 10 By Fans')}}
            </div>

            @foreach(\App\Mobile::topfans()->get() as $newMob)
                <div>
                    <a title="{{$newMob->name}}" class="mobile-banner-container-item"
                       href="{{route('mobiles.display',[$newMob, strtolower($newMob->brand->name), str_slug($newMob->name)])}}">
                        <div class="image-container">
                            <img class="mobile-banner-container-item-image"
                                 src="{{$newMob->image_path ? asset('storage' . $newMob->image_path) : asset('storage/no-phone.png')}}">
                        </div>
                        <div class="mobile-banner-container-item-text">
                            <p class="mobile-banner-container-item-name">
                                {{$newMob->name}}
                            </p>

                            <p class="badge badge-pill mobile-banner-container-item-badge">{{$newMob->number_of_fans ?? 0}} </p>
                        </div>

                    </a>
                </div>
            @endforeach
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

