@extends('layout.app')

@section('body')

    <div class="row">
        <div class="col-md-4 col-sm-12">
            <div class="section-side">
                <h5>
                    {{t('Top 10 By Hits')}}
                </h5>
                <ul class="list-group">
                    @foreach(\App\Mobile::tophits()->get() as $newMob)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="{{route('mobile.display',[$newMob, strtolower($newMob->brand->name), str_slug($newMob->name)])}}">
                                {{$newMob->name}}
                            </a>
                            <span class="badge  badge-pill">{{$newMob->number_of_hits ?? 0}} </span>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
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
        <div class="col-md-4 col-sm-12">
            <div class="section-side ">
                <h5>
                    {{t('Top 10 Latest Mobiles')}}
                </h5>
                <ul class="list-group">
                    @foreach(\App\Mobile::latestmobiles()->get() as $newMob)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="{{route('mobile.display',[$newMob, strtolower($newMob->brand->name), str_slug($newMob->name)])}}">
                                {{$newMob->name}}
                            </a>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <div class="big-banner ">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- MobArrow-responsive -->
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-1864972736029501"
                     data-ad-slot="7077188983"
                     data-ad-format="auto"
                     data-full-width-responsive="true"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
        </div>
        <div class="col-2">
        </div>
    </div>

    <div class="row" >
        <div class="col-md-12">
            <div class="section-side container-brands" style="background-color: white;border-radius: 5px;">
                <h5>
                    {{t('BRANDS')}}
                </h5>
                <div class="d-flex flex-wrap  flex-row bd-highlight mb-3">
                    @foreach(\App\Brand::all() as $brand)
                    <div class="p-2 bd-highlight">
                        <a class="brand-url" href="#">
                            <img class="brand-image" src="{{asset('storage'.$brand->image_path)}}">
                            <p>{{$brand->name}}</p>
                        </a>
                    </div>

                    @endforeach
                </div>
            </div>


        </div>
    </div>

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="big-banner ">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- MobArrow-responsive -->
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-1864972736029501"
                     data-ad-slot="7077188983"
                     data-ad-format="auto"
                     data-full-width-responsive="true"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="section-side container-brands" style="background-color: white;border-radius: 5px;">
                <h5>
                    {{t('LATEST DEVICES')}}
                </h5>
                <div class="d-flex flex-wrap  flex-row bd-highlight mb-3" style="margin-top: 20px">
                    @foreach(\App\Mobile::latestmobiles()->get() as $newMob)
                        <a class="brand-url" href="{{route('mobile.display',[$newMob, strtolower($newMob->brand->name), str_slug($newMob->name)])}}">
                            <img style="width: 100px;height: 100px" src="{{asset('storage'.$newMob->image_path)}}">

                            <p>{{$newMob->name}}</p>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

