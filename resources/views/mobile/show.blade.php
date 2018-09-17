@extends('layout.app')

@section('header')

@stop


@section('body')
    @php
        $google = '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- mobile -->
    <ins class="adsbygoogle"
         style="display:block"
         data-ad-client="ca-pub-1518734753701301"
         data-ad-slot="9346035778"
         data-ad-format="auto"
         data-full-width-responsive="true"></ins>
    <script>
    (adsbygoogle = window.adsbygoogle || []).push({});
    </script>';

        echo $google;
    @endphp


    @php
        $is_favourite = 0;
        if(\Auth::check()) { if($mobile->users()->where('user_id', \Auth::id())->count()){$is_favourite = 1;} };
    @endphp

    <div id="show">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                @if(isset($mobile->advertisements[0]) && $mobile->advertisements[0])
                    <div class="card">
                        {{Adsense::get('example')}}
                    </div>
                @endif

                <div class="card " style="padding: 20px;background: linear-gradient(-90deg,#1b998b 10%, white 70%);">
                    <div class="row no-gutters">
                        <div class="col-auto">
                            @if($mobile->image_path)
                                <img width="200" class="img-fluid" src="{{asset('storage'.$mobile->image_path)}}"
                                     alt="{{$mobile->name ?? ''}}">
                            @else
                                <img width="200" class="img-fluid" src=""
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
                                        HITS</span>
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
                                    ></like-component>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                        </div>
                        <ul class="list-unstyled" style="padding-right: 0;margin: 10px">
                            <li class="text-center" style="display: inline-block;padding-left: 80px;">
                                <i class="fa fa-3x fa-camera-retro"></i>
                                <p style="margin: 0;font-size: 1.7em;font-weight: 800">{{$mobile->main_camera_pixels_description ?? 0}}</p>
                                <span>MP</span>
                            </li>

                            <li class="text-center" style="display: inline-block;padding-left: 80px;">
                                <i class="fa fa-3x fa-memory"></i>
                                <p style="margin: 0;font-size: 1.7em;font-weight: 800">{{$mobile->main_ram_description ?? 0}}</p>
                                @if(!in_array($mobile->main_ram_description,[128,256,512]))
                                    <span>GB</span>
                                @else
                                    <span>MB</span>
                                @endif
                            </li>

                            <li class="text-center" style="display: inline-block;padding-left: 80px;">
                                <i class="fa fa-3x fa-battery-full"></i>
                                <p style="margin: 0;font-size: 1.7em;font-weight: 800">{{$mobile->main_battery_description ?? 0}}</p>
                                <span>mAh</span>
                            </li>
                            <li class="text-center" style="display: inline-block;padding-left: 80px;">
                                <i class="fa fa-3x fa-hand-holding-usd"></i>
                                <p style="margin: 0;font-size: 1.7em;font-weight: 800">{{$mobile->main_price_description ?? 0 }}</p>
                                <span>$</span>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-1"></div>
        </div>

        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                @include('mobile._show._first_half')
                @include('mobile._show._second_half')
            </div>
            <div class="col-1"></div>
        </div>
    </div>


@endsection

@section('scripts')

@append