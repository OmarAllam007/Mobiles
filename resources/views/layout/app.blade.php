<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{env('APP_NAME')}}</title>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- mobile -->
    <ins class="adsbygoogle"
         style="display:block"
         data-ad-client="ca-pub-1518734753701301"
         data-ad-slot="9346035778"
         data-ad-format="auto"
         data-full-width-responsive="true"></ins>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
    <!-- Fonts -->
    {{--<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">--}}


    {{--<link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.0.0/css/bootstrap.min.css" integrity="sha384-P4uhUIGk/q1gaD/NdgkBIl3a6QywJjlsFJFk7SPRdruoGddvRVSwv5qFnvZ73cpz" crossorigin="anonymous">--}}
    <link rel="stylesheet" href="{{asset('css/app.css?asdadsad')}}">
    <link rel="stylesheet" href="{{asset('css/fontawesome-all.css')}}">
    {{--<link rel="stylesheet" href="{{asset('css/select2.css')}}">--}}
    @yield('styles')

    <style>
        .nav-item:hover {
            border-radius: 10px;
            background-color: #1b998b;
            transition: .5s;
        }


    </style>
    <meta name="google-site-verification" content="RDXegnp82JQCC1Sm-vIGwaDKry4bm10oiNpIjp8g1HA" />
    <!-- Styles -->
</head>
<body>
@php
    $mobiles = \App\Mobile::all()->each(function ($mobile){
    if($mobile->brand){
    $mobile['show_url'] = route('mobile.display',[$mobile,strtolower($mobile->brand->name),str_slug($mobile->name)]);
    $mobile['image_path'] = asset('storage'.$mobile->image_path);
    }
    })
@endphp
<div id="header">


    <header>
        <nav class="navbar navbar-expand-lg navbar-dark"
             style="background-color: #2d3047 ;border-bottom: 4px #1b998b solid">
            <a class="navbar-brand" href="{{url('/')}}">{{env('APP_NAME')}}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('mobile.prices')}}">
                            <i class="fa fa-mobile-alt"></i>
                            {{t('Prices')}}</a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('compare.index')}}">
                            <i class="fa fa-exchange-alt"></i> {{t('Compare')}}</a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link" href="#">
                            <i class="fa fa-newspaper"></i>
                            {{t('News')}}
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('choose.me')}}">
                            <i class="fa fa-hand-holding-heart"></i>

                            {{t('Choose For me')}}</a>
                    </li>

                    @if(\Auth::check() && \Auth::user()->isAdmin())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-lock"></i> {{t('Admin')}}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a href="{{route('brand.index')}}" class="dropdown-item">{{ t('Brands') }}</a>
                                <a href="{{route('mobile.index')}}"
                                   class="dropdown-item">{{ t('Mobiles') }}</a>
                                <a
                                        class="dropdown-item">{{ t('News') }}</a>
                            </div>
                        </li>
                    @endif

                </ul>


                <search-mobile :mobiles="{{$mobiles}}"></search-mobile>

                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" role="button" href="{{ route('login') }}" data-toggle="tooltip"
                               title="Login">
                                <i class="fa fa-sign-in-alt"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}" data-toggle="tooltip" title="Sign Up"><i
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
        </nav>
    </header>
</div>
{{--<script src="https://cdn.rtlcss.com/bootstrap/v4.0.0/js/bootstrap.min.js" integrity="sha384-54+cucJ4QbVb99v8dcttx/0JRx4FHMmhOWi4W+xrXpKcsKQodCBwAvu3xxkZAwsH" crossorigin="anonymous"></script>--}}
<br>
<div id="app">
    <main class="container-fluid">
        <div class="title-bar">
            <div class="row">
                @yield('header')
            </div>
        </div>
        <div class="clearfix"></div>
        @yield('body')

    </main>
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