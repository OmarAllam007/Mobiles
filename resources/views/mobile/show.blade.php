@extends('layout.app')

@section('left')
    <div class="col-md-12 col-sm-12 flex-fill">
        <section class="section-side">
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
        </section>

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

    <div id="show">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-layout " id="mobileDetails">
                    <div class="row no-gutters">
                        <div class="col-auto">
                            @if($mobile->image_path)
                                <img width="200" class="img-fluid" src="{{asset('storage'.$mobile->image_path)}}"
                                     alt="{{$mobile->name ?? ''}}">
                            @else
                                <img width="200" class="img-fluid" src="{{asset('storage'.$mobile->image_path)}}"
                                     alt="{{$mobile->name .' Image ' ?? ''}}">
                            @endif
                        </div>
                        <div class="col">
                            <div class="card-block px-2">
                                <h4 class="card-title">{{$mobile->name}}</h4>
                                <p class="card-text"><span><i class="fa fa-calendar-alt"></i></span>
                                    <span>{{$mobile->released_date}}</span></p>
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
                        <div class="col">
                            <div class="card-block px-2">
                                <h4 class="card-title"></h4>
                                <p class="card-text">
                                    <i class="fa fa-2x fa-chart-line"></i>
                                    <span style="font-size: 1.3em;font-weight: 400">{{$mobile->number_of_hits ?? 0}}
                                        {{t('HITS')}}</span>
                                </p>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card-block px-1">
                                <h4 class="card-title"></h4>
                                <p class="card-text">
                                    <like-component :mobile="{{$mobile->id}}"
                                                    :auth="{{\Auth::check() ? 1 : 0}}"
                                                    :likes="{{ $mobile->number_of_fans ?? 0 }}"
                                                    :favourite="{{ $is_favourite }}"
                                                    :t="{{json_encode(\App\Translation::getLikeComponent())}}"
                                    ></like-component>
                                </p>
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
                                <i class="fa fa-3x fa-battery-full"></i>
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
    <section class="section-side">
        <h5>
            {{t('Top 10 By Interest')}}
        </h5>
        <ul class="list-group">
            @foreach(\App\Mobile::tophits()->get() as $like)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{route('mobile.display',[$like, strtolower($like->brand->name), str_slug($like->name)])}}">
                        {{$like->name}}
                    </a>
                    <span class="badge  badge-pill">
                {{$like->number_of_hits ?? 0}}
                </span>
                </li>
            @endforeach

        </ul>
    </section>
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

@append