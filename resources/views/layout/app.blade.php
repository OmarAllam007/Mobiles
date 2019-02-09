<!doctype html>
{{--lang="ar" dir="rtl"--}}
<html>
<head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if(isset($mobile))
        <title property="og:title">{{$mobile->name}} - Full specifications </title>
        <meta name="og:title" content="{{$mobile->name}}">
        <meta name="og:description" content="{{$mobile->name}} - Full specifications">
    @else
        <title property="">{{env('APP_NAME')}} - Mobile Phones Reviews, news, comparisons and more... </title>
        <meta name="og:title" content="MobArrow">
        <meta name="og:description" content="{{env('APP_NAME')}} - Mobile Phones Reviews, news, comparisons and more... ">
    @endif


    <link rel="stylesheet" href="{{asset('css/app.css?123')}}">
    <link rel="stylesheet" href="{{asset('css/fontawesome-all.css')}}">
    {{--<link rel="stylesheet" href="{{asset('css/select2.css')}}">--}}
    @yield('styles')

    <style>


    </style>

    <meta name="description" content="موب ارو - عرض مواصفات وأسعار الموبايلات بالسعر العالمي ومقارنات ومراجعات لها">
    <meta name="keywords"
          content="mobarrow ,سهم الجوالات , اسعار الموبايلات في مصر,السعر العالمي للجوالات , موبيلات, جوالات , سعر, تليفونات, سامسونج, سوق الموبايلات, نوكيا, موبايل">
    <meta content='شفرة تحقق جوجل' name='google-site-verification'/>
    <meta content='article' property='og:type'/>
    {{--<meta content='عنوان قصير لموقعك' name='title'/>--}}
    {{--<meta content='mobiles specifications, reviews and articles' name='description'/>--}}
    {{--<meta content='mobile,iphone,galaxy,huwawi,honor' name='keywords'/>--}}
    <meta content='أسمك' name='Author'/>
    {{--<meta content='بريدك الالكترونى' name='Email'/>--}}
    <meta content='global' name='distribution'/>
    <meta content='5 days' name='revisit'/>
    <meta content='5 days' name='revisit-after'/>
    <meta content='document' name='resource-type'/>
    <meta content='all' name='audience'/>
    <meta content='general' name='rating'/>
    <meta content='all' name='robots'/>
    <meta content='index, follow' name='robots'/>
    {{--<meta content='اللغة المسستخدمه ar او en' name='language'/>--}}
    {{--<meta content='بلدك' name='country'/>--}}
    {{--<meta content='blogger' name='generator'/>--}}


    <meta content='(c) 2019' name='copyright'/>
    <meta expr:content='data:blog.title' property='og:site_name'/>
    <meta expr:content='data:blog.pageName' property='og:title'/>
    <b:if cond='data:blog.pageType == &quot;item&quot;'>
        <meta expr:content='data:blog.pageName + data:blog.title' name='Description'/>
    </b:if>
    <b:if cond='data:blog.pageType == &quot;index&quot;'>
        <title>
            <data:blog.pageTitle/>
        </title>
        <b:else/>
        <title>
            <data:blog.pageName/>
            -
            <data:blog.title/>
        </title>
    </b:if>


    @if(\Session::get('personalized-language-ar'))
        <style>
            input, label, textarea {

                direction: rtl;
            }

            h5 {
                text-align: right;
            }

            li.list-group-item {
                direction: rtl;
            }

            /*.navbar {*/
            /*direction: rtl;*/
            /*}*/

            .btn {
                direction: rtl;
            }

            table {
                direction: rtl;
                text-align: right;
            }

            a, p {
                direction: rtl;
            }

            #search-box p {
                text-align: right;
            }

            #mobileDetails {
                direction: rtl;
                background: linear-gradient(-90deg, white 20%, #1b998b 70%);
            }
        </style>
@endif


{{--<meta name="google-site-verification" content="RDXegnp82JQCC1Sm-vIGwaDKry4bm10oiNpIjp8g1HA"/>--}}
<!-- Styles -->


</head>
<body>
@php

    $mobiles = \App\Mobile::topHits()->get()->each(function ($mobile){
    if($mobile->brand){
    $mobile['show_url'] = route('mobiles.display',[$mobile,strtolower($mobile->brand->name),str_slug($mobile->name)]);
    $mobile['image_path'] = asset('storage'.$mobile->image_path);
    }
    });
@endphp
<div id="header">
    <header>
        {{--lang="ar" dir="rtl"--}}
        <nav class="navbar nav-top  navbar-expand-lg navbar-dark navbar-top-blue">

            @if(!\Session::get('personalized-language-ar'))
                <a class="navbar-brand" href="{{url('/')}}" title="Home Page">
                    {{env('APP_NAME')}}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('mobiles.prices')}}" title="Prices Page">
                                <i class="fa fa-mobile-alt"></i>
                                {{t('Prices')}}</a>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('compare.index')}}" title="Compare Page">
                                <i class="fa fa-exchange-alt"></i> {{t('Compare')}}</a>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('choose.me')}}" title="Choose for you Page">
                                <i class="fa fa-hand-holding-heart"></i>

                                {{t('Choose For me')}}</a>
                        </li>


                        @if(\Auth::check() && \Auth::user()->isAdmin())
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                   data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false" title="Admin Panel Page">
                                    <i class="fa fa-lock"></i> {{t('AdPanel')}}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a href="{{route('brand.index')}}" class="dropdown-item"
                                       title="Brands Page">{{ t('Brands') }}</a>
                                    <a href="{{route('mobiles.index')}}"
                                       class="dropdown-item" title="Mobiles Index Page">{{ t('Mobiles') }}</a>
                                    <a href="{{route('review.index')}}"
                                       class="dropdown-item" title="Reviews Page">{{ t('Reviews') }}</a>
                                </div>
                            </li>
                        @endif
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false" title="Translation Page">
                                <i class="fa fa-globe"></i> {{ t(\App\Translation::$languages[\Session::get('personalized-language-ar') ?? 0])}}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @if(\Session::get('personalized-language-ar'))
                                    <a href="{{route('language.change',0)}}"
                                       class="dropdown-item">{{ t('English') }}</a>
                                @else
                                    <a href="{{route('language.change',1)}}" class="dropdown-item">{{ t('Arabic') }}</a>
                                @endif
                            </div>
                        </li>

                    </ul>


                    <ul class="navbar-nav ml-auto">
                        <li>
                            <search-mobile
                                    :t="{{json_encode(\App\Translation::getSearchComponent())}}"
                            ></search-mobile>
                        </li>

                        @guest
                            <li class="nav-item">
                                <a class="nav-link" role="button" href="{{ route('login') }}" data-toggle="tooltip"
                                   title="{{t('Login')}}">
                                    <i class="fa fa-sign-in-alt"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}" data-toggle="tooltip"
                                   title="{{t('Sign Up')}}"><i
                                            class="fa fa-user-plus"></i></a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ t('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            @endif


            @if(\Session::get('personalized-language-ar'))
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" role="button" href="{{ route('login') }}" data-toggle="tooltip"
                                   title="{{t('Login')}}">
                                    <i class="fa fa-sign-in-alt"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}" data-toggle="tooltip"
                                   title="{{t('Sign Up')}}"><i
                                            class="fa fa-user-plus"></i></a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ t('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>

                    <search-mobile :mobiles="{{$mobiles}}"
                                   :t="{{json_encode(\App\Translation::getSearchComponent())}}"
                    ></search-mobile>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-globe"
                                   title="Language Change"></i> {{ t(\App\Translation::$languages[\Session::get('personalized-language-ar') ?? 0])}}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @if(\Session::get('personalized-language-ar'))
                                    <a href="{{route('language.change',0)}}"
                                       class="dropdown-item">{{ t('English') }}</a>
                                @else
                                    <a href="{{route('language.change',1)}}" class="dropdown-item">{{ t('Arabic') }}</a>
                                @endif
                            </div>
                        </li>


                        @if(\Auth::check() && \Auth::user()->isAdmin())
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                   data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false" title="Admin Panel">
                                    <i class="fa fa-lock"></i> {{t('AdPanel')}}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a href="{{route('brand.index')}}" class="dropdown-item">{{ t('Brands') }}</a>
                                    <a href="{{route('mobiles.index')}}"
                                       class="dropdown-item" title="Mobiles Page">{{ t('Mobiles') }}</a>
                                    <a href="{{route('review.index')}}"
                                       class="dropdown-item" title="Reviews Page">{{ t('Reviews') }}</a>
                                </div>
                            </li>
                        @endif


                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('choose.me')}}"
                               title="Choose for you Page"
                            >
                                <i class="fa fa-hand-holding-heart"></i>

                                {{t('Choose For me')}}</a>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('compare.index')}}" title="Compare Page">
                                <i class="fa fa-exchange-alt"></i> {{t('Compare')}}</a>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('mobiles.prices')}}" title="Prices Page">
                                <i class="fa fa-mobile-alt"></i>
                                {{t('Prices')}}</a>
                        </li>

                    </ul>

                </div>
                <a class="navbar-brand" href="{{url('/')}}" title="Home  Page">{{env('APP_NAME')}}</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

            @endif
        </nav>
    </header>
</div>

<div id="app">
    <main class="container-fluid" style="margin-bottom: 100px">
        <br>

        <div class="title-bar">
            <div class="row">
                @yield('header')
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-2"></div>

            <div class="col-md-2"></div>
        </div>
        <div class="row">
            <div class="col-md-3">
                @yield('right')
            </div>
            <div class="col-md-6">
                @yield('body')
            </div>
            <div class="col-md-3">
                @yield('left')
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                @yield('footer')
            </div>
            <div class="col-md-3"></div>
        </div>

    </main>

    {{--<nav class="navbar fixed-bottom navbar-expand-lg navbar-dark navbar-bottom-blue"--}}
    {{-->--}}
    {{--<p style="color: white">Copyright <a href="{{url('/')}}" class="site-link">@MobArrow</a> 2018-2019</p>--}}
    {{--</nav>--}}
</div>

<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
<script>


</script>
@yield('scripts')

<script type="text/javascript">

    $(function () {
        $('[data-toggle="popover"]').popover()
        $('[data-toggle="tooltip"]').tooltip();
    })
    $('.popover-dismiss').popover({
        trigger: 'focus'
    })

    function openModal() {
        document.getElementById('myModal').style.display = "block";
    }

    // Close the Modal
    function closeModal() {
        document.getElementById('myModal').style.display = "none";
    }

    var slideIndex = 0;
    showSlides(slideIndex);

    // Next/previous controls
    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    // Thumbnail image controls
    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        var captionText = document.getElementById("caption");

        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        // captionText.innerHTML = dots[slideIndex-1].alt;
    }

    // $(document).ready(function () {
    //     $('.select2').select2({tags: true});
    // });
</script>

<script>


</script>
</body>

</html>