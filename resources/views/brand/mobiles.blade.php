@extends('layout.app')
@section('left')
    <div class="col-md-12 col-sm-12 flex-fill">
        <section class="section-side">
            <h5>
                {{t('Top 10 By Fans')}}
            </h5>
            <ul class="list-group">
                @foreach(\App\Mobile::topfans()->get() as $newMob)
                    <li class="list-group-item d-flex justify-content-between sweep-to-right align-items-center">
                        <img src="{{$newMob->image_path ? asset('storage' . $newMob->image_path) : asset('storage/no-phone.png')}}" style="width: 50px;height: 50px">

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
    <section class="section-side">
        <img  style="display: block;
    margin-left: auto;
    margin-right: auto;
    width: 40%;" src="{{asset('storage'.$brand->image_path)}}">
        <h5>
            {{$brand->name}}
        </h5>
        <ul class="list-group">
            @foreach($brand->mobiles as $mobile)
                <li class="list-group-item d-flex justify-content-between sweep-to-right align-items-center">
                    <img src="{{$mobile->image_path ? asset('storage' . $mobile->image_path) : asset('storage/no-phone.png')}}" style="width: 50px;height: 50px">
                    <a href="{{route('mobile.display',[$mobile, strtolower($mobile->brand->name), str_slug($mobile->name)])}}">
                        {{$mobile->name}}
                    </a>
                    <span class="badge  badge-pill">
                {{$mobile->main_price_description ?? 0}}
                </span>
                </li>
            @endforeach

        </ul>
    </section>
@endsection

@section('right')
    <section class="section-side">
        <h5>
            {{t('Top 10 By Price')}}
        </h5>
        <ul class="list-group">
            @foreach(\App\Mobile::byprice()->get() as $like)
                <li class="list-group-item d-flex justify-content-between sweep-to-right align-items-center">
                    <img src="{{$like->image_path ? asset('storage' . $like->image_path) : asset('storage/no-phone.png')}}" style="width: 50px;height: 50px">

                    <a href="{{route('mobile.display',[$like, strtolower($like->brand->name), str_slug($like->name)])}}">
                        {{$like->name}}
                    </a>
                    <span class="badge  badge-pill">
                {{$like->main_price_description ?? 0}}
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