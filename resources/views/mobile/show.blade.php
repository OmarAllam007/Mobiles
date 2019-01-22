@extends('layout.app')

@section('left')
    <div class="col-md-12 col-sm-12 flex-fill">
        <div class="mobile-banner-container">
            <div class="mobile-banner-container-title">
                <h5> {{t('Top 10 By Fans In '.$mobile->brand->name)}}</h5>
            </div>
            @foreach(\App\Mobile::where('brand_id',$mobile->brand->id)->topfans()->get() as $newMob)
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

                            <p class="badge badge-pill mobile-banner-container-item-badge"> {{$newMob->number_of_fans ?? 0}}
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
    </div>
@endsection
@section('body')
    @php
        $is_favourite = 0;
        if(\Auth::check()) { if($mobile->users()->where('user_id', \Auth::id())->count()){$is_favourite = 1;} };
    @endphp
    <h1 class="text-center h2-title" style="color: white">{{$mobile->name}}</h1>
    <div class="row">
        <div class="col-md-12 col-sm-12" style="margin: 10px 0">
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
    </div>
    <input id="mobile_name" type="hidden" value="{{$mobile->id}}">
{{--    <h2 class="h2-title">{{$mobile->name}} -{{t('Specifications')}}</h2>--}}

    <div id="show">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-layout " id="mobileDetails">
                    <div class="row no-gutters">
                        <div class="col-md-5">
                            @if($mobile->image_path)
                                <img width="200" class="img-fluid" src="{{asset('storage'.$mobile->image_path)}}"
                                     alt="{{$mobile->name ?? ''}}">
                            @else
                                <img width="200" class="img-fluid" src="{{asset('storage'.$mobile->image_path)}}"
                                     alt="{{$mobile->name .' Image ' ?? ''}}">
                            @endif
                        </div>
                        <div class="col-md-4 col-sm-3">
                            <div class="card-block ">
                                <h4 class="card-title">{{$mobile->name}}</h4>
                                <p class="card-text"><span><i class="fa fa-calendar-alt"></i></span>
                                    <span>
                                                            {{$mobile->released_date ? \Carbon\Carbon::parse($mobile->released_date)->format('Y/M/d') : ''}}

                                    </span></p>
                                <p class="card-text">
                                    <span><i class="fa fa-mobile-alt"></i></span>
                                    <span>{{$mobile->device_dimension}}</span>
                                </p>
                                <p class="card-text">
                                    <span><i class="fa fa-code"></i></span>
                                    <span>{{$mobile->operating_system}}</span>
                                </p>
                                <p class="card-text">
                                    <i class="fa fa-broadcast-tower"></i>
                                    <span>{{$mobile->network_names}}</span>
                                </p>

                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="card-block">
                                <h4 class="card-title"></h4>
                                <p class="card-text">
                                    <i class="fa fa-2x fa-chart-line"></i>
                                    <span style="font-size: 1.3em;font-weight: 400">
                                        <strong>{{$mobile->number_of_hits ?? 0}}</strong>
                                    </span>

                                    <span style="margin-left:10px ">
                                         <like-component :mobile="{{$mobile->id}}"
                                                         :auth="{{\Auth::check() ? 1 : 0}}"
                                                         :likes="{{ $mobile->number_of_fans ?? 0 }}"
                                                         :favourite="{{ $is_favourite }}"
                                                         :t="{{json_encode(\App\Translation::getLikeComponent())}}"
                                         ></like-component>
                                    </span>
                                </p>
                                <div class="card-text">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <ul class="col-md-12 list-unstyled d-flex  bd-highlight flex-wrap">
                            <li class="text-center p-md-4 p-xl-4 p-sm-4 flex-fill bd-highlight">
                                <i class="fa fa-3x fa-camera-retro"></i>
                                <p style="margin: 0;font-size: 1.7em;font-weight: 800">{{$mobile->main_camera_pixels_description ?? 0}}</p>
                                <span>{{t('MP')}}</span>
                            </li>

                            <li class="text-center  p-md-4 p-xl-4 p-sm-4 p-lg-4 p- flex-fill bd-highlight">
                                <i class="fa fa-3x fa-memory"></i>
                                <p style="margin: 0;font-size: 1.7em;font-weight: 800">{{$mobile->main_ram_description ?? 0}}</p>
                                @if(!in_array($mobile->main_ram_description,[128,256,512]))
                                    <span>{{t('GB')}}</span>
                                @else
                                    <span>{{t('MB')}}</span>
                                @endif
                            </li>

                            <li class="text-center  p-md-4 p-xl-4 p-sm-4 p-lg-4 flex-fill bd-highlight">
                                @if($mobile->main_battery_description >= 3000 )
                                    <i class="fa fa-3x fa-battery-full"></i>
                                @elseif($mobile->main_battery_description >= 2000 && $mobile->main_battery_description <= 3000)
                                    <i class="fa fa-3x fa-battery-three-quarters"></i>
                                @else
                                    <i class="fa fa-3x fa-battery-half"></i>
                                @endif
                                <p style="margin: 0;font-size: 1.7em;font-weight: 800">{{$mobile->main_battery_description ?? 0}}</p>
                                <span>{{t('mAh')}}</span>
                            </li>
                            <li class="text-center  p-md-4 p-xl-4 p-sm-4 p-lg-4 flex-fill bd-highlight">
                                <i class="fa fa-3x fa-hand-holding-usd"></i>
                                <p style="margin: 0;font-size: 1.7em;font-weight: 800">{{$mobile->main_price_description ?? 0 }}</p>
                                <span>$</span>
                            </li>

                        </ul>
                    </div>
                </div>
                <br>
            </div>
        </div>

        {{----}}
        {{----}}
        {{----}}
        @include('mobile._show._first_half')
        @include('mobile._show._second_half')

    </div>


@endsection

@section('right')

    <div class="mobile-banner-container">
        <div class="mobile-banner-container-title">
            <h5> {{t('Top 10 By Price In '.$mobile->brand->name)}}</h5>
        </div>
        @foreach(\App\Mobile::where('brand_id',$mobile->brand->id)->byprice()->get() as $newMob)
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

                        <p class="badge badge-pill mobile-banner-container-item-badge"> {{$newMob->main_price_description ?? 0}}
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

@section('footer')

    <div class="comments-form">
        @include('mobile._show._comments')

    </div>
@endsection
@section('scripts')
    <script>
        // import Session from '../../assets/js/components/Session';
        // window.sessionStorage.clear()
        let id = $('#mobile_name').val()

        let visited_mobiles = [];
        if (window.localStorage.getItem('mobarrow_visited')) {
            visited_mobiles = localStorage.getItem('mobarrow_visited');
        }
        if (visited_mobiles.length > 0) {
            visited_mobiles = JSON.parse(visited_mobiles);

            if (visited_mobiles.length <= 3) {
                if (visited_mobiles.indexOf(id) !== -1) {
                    visited_mobiles.splice(visited_mobiles.indexOf(id), 1);
                    visited_mobiles.push(id);
                } else {
                    visited_mobiles.push(id);
                }
            } else {
                if (visited_mobiles.indexOf(id) !== -1) {
                    visited_mobiles.splice(visited_mobiles.indexOf(id), 1);
                    visited_mobiles.push(id);
                } else {
                    visited_mobiles.splice(0,1);
                    visited_mobiles.push(id);
                }
            }

        }


        localStorage.setItem('mobarrow_visited', JSON.stringify(visited_mobiles))


    </script>
@stop