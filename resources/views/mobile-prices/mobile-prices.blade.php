@extends('layout.app')
@section('left')
    <div class="col-md-12 col-sm-12">
        <div class="mobile-banner-container">
            <div class="mobile-banner-container-title">
                <h5>
                    {{t('Top 10 By Fans')}}
                </h5>
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
    </div>
@endsection
@section('body')
    <h1 class="text-center">Get the mobile suitable for your pocket</h1>
    <mobile-prices
                   :t="{{json_encode(\App\Translation::getPricesComponent())}}">
    </mobile-prices>
@endsection

@section('right')

    <div class="mobile-banner-container">
        <div class="mobile-banner-container-title">
            <h5>{{t('Top 10 By Price')}}</h5>
        </div>

        @foreach(\App\Mobile::byprice()->get() as $newMob)
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

                        <p class="badge badge-pill mobile-banner-container-item-badge"> {{$newMob->main_price_description ?? 0}} $
                        </p>
                    </div>

                </a>
            </div>
        @endforeach
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