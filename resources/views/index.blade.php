@extends('layout.app')

@section('body')
    <div class="row">
        <div class="col-md-4 col-sm-6">
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
                            <span class="badge  badge-pill">{{$mobile->number_of_fans ?? 0}} </span>
                        </li>
                    @endforeach

                </ul>
            </section>
        </div>
        <div class="col-md-4 col-sm-6">
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
                            <span class="badge  badge-pill">{{$mobile->number_of_fans ?? 0}} </span>
                        </li>
                    @endforeach

                </ul>
            </section>
        </div>
        <div class="col-md-4 col-sm-6">
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
                            <span class="badge  badge-pill">{{$mobile->number_of_fans ?? 0}} </span>
                        </li>
                    @endforeach

                </ul>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="big-banner ">
                <p class="text-center">
                    Advertisement Place
                </p>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>




    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <div class="big-banner ">
                <p class="text-center">
                    Advertisement Place
                </p>
            </div>
        </div>
        <div class="col-2">
        </div>
    </div>


@endsection

