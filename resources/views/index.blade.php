@extends('layout.app')

@section('right')
    <div class="col-md-12 col-sm-12">
        <div class="section-side" >
            <h5 class="text-center">
                {{t('Top 10 By Hits')}}
            </h5>
            <ul class="list-group">
                @foreach(\App\Mobile::tophits()->get() as $newMob)
                    <li class="list-group-item d-flex justify-content-between sweep-to-right align-items-center">
                        <img src="{{$newMob->image_path ? asset('storage' . $newMob->image_path) : asset('storage/no-phone.png')}}" style="width: 50px;height: 50px">

                        <a title="Mobile Display Page" href="{{route('mobile.display',[$newMob, strtolower($newMob->brand->name), str_slug($newMob->name)])}}">
                            {{$newMob->name}}
                        </a>
                        <span class="badge  badge-pill">{{$newMob->number_of_hits ?? 0}} </span>
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
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="section-side">
                <h1 class="text-center">
                    {{t('Top 10 Latest Mobiles')}}
                </h1>
                <ul class="list-group">
                    @foreach(\App\Mobile::latestmobiles()->get() as $newMob)

                        <li class="list-group-item d-flex justify-content-between sweep-to-right align-items-center">

                            <a title="Mobile Display Page" href="{{route('mobile.display',[$newMob, strtolower($newMob->brand->name), str_slug($newMob->name)])}}">
                                <img src="{{$newMob->image_path ? asset('storage' . $newMob->image_path) : asset('storage/no-phone.png')}}" style="width: 50px;height: 50px">
                                {{$newMob->name}}
                            </a>
                        </li>
                    @endforeach

                </ul>
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
                <div class="d-flex flex-wrap  flex-row bd-highlight mb-3">
                    @foreach(\App\Brand::all() as $brand)
                        <div class="p-2 bd-highlight">
                            <a title="Mobile Brand Page" class="brand-url" href="{{route('brand.mobiles',$brand)}}">
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
        <div class="col-md-12">
            <div class="section-side container-brands" style="background-color: white;border-radius: 5px;">
                <h5 class="text-center">
                    {{t('LATEST DEVICES')}}
                </h5>
                <div class="d-flex flex-wrap  flex-row bd-highlight mb-3" style="margin-top: 20px">
                    @foreach(\App\Mobile::latestmobiles()->get() as $newMob)
                        <a class="brand-url" title="Mobile Display Page"
                           href="{{route('mobile.display',[$newMob, strtolower($newMob->brand->name), str_slug($newMob->name)])}}">
                            <img style="width: 100px;height: 100px" src="{{asset('storage'.$newMob->image_path)}}">

                            <p>{{$newMob->name}}</p>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection


@section('left')
    <div class="col-md-12 col-sm-12">
        <div class="section-side">
            <h5 class="text-center">
                {{t('Top 10 By Fans')}}
            </h5>
            <ul class="list-group">
                @foreach(\App\Mobile::topfans()->get() as $newMob)
                    <li class="list-group-item d-flex sweep-to-right justify-content-between align-items-center">
                        <img src="{{$newMob->image_path ? asset('storage' . $newMob->image_path) : asset('storage/no-phone.png')}}" style="width: 50px;height: 50px">

                        <a title="Mobile Display Page" href="{{route('mobile.display',[$newMob, strtolower($newMob->brand->name), str_slug($newMob->name)])}}">
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

