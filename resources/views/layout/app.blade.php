<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--    <script src="{{asset('js/tinymce.min.js')}}"></script>--}}
    <script>
        // tinymce.init({
        //     selector: 'textarea',
        //     height: 500,
        //     menubar: false,
        //     plugins: [
        //         'advlist autolink lists link image charmap print preview anchor textcolor',
        //         'searchreplace visualblocks code fullscreen',
        //         'insertdatetime media table contextmenu paste code help wordcount'
        //     ],
        //     toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
        // });
    </script>
    <title>{{env('APP_NAME')}}</title>

    <!-- Fonts -->
    {{--<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">--}}


    {{--<link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.0.0/css/bootstrap.min.css" integrity="sha384-P4uhUIGk/q1gaD/NdgkBIl3a6QywJjlsFJFk7SPRdruoGddvRVSwv5qFnvZ73cpz" crossorigin="anonymous">--}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
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
    <!-- Styles -->
</head>
<body>
@php
    $mobiles = \App\Mobile::all()->each(function ($mobile){
    if($mobile->brand){
    $mobile['show_url'] = route('mobile.display',[$mobile,strtolower($mobile->brand->name),str_slug($mobile->name)]);
    }
    })
@endphp
<div id="header">


    <header>
        <nav class="navbar navbar-expand-lg navbar-dark"
             style="background-color: #2d3047 ;border-bottom: 4px #1b998b solid">
            <a class="navbar-brand" href="#">{{env('APP_NAME')}}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('mobile.prices')}}">
                            <i class="fa fa-mobile-alt"></i>
                            {{t('Mobile Prices')}}</a>
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
                        <a class="nav-link" href="#">
                            <i class="fa fa-hand-holding-heart"></i>

                            {{t('Choose For me')}}</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-lock"></i> {{t('Admin Panel')}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a href="{{route('brand.index')}}" class="dropdown-item">{{ t('Brands') }}</a>
                            <a href="{{route('mobile.index')}}"
                               class="dropdown-item">{{ t('Mobiles') }}</a>
                            <a
                                    class="dropdown-item">{{ t('News') }}</a>
                        </div>
                    </li>
                </ul>

                <search-mobile :mobiles="{{$mobiles}}"></search-mobile>
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


<script src="{{asset('js/app.js')}}"></script>
@yield('scripts')


<script>
    $(function () {
        $('[data-toggle="popover"]').popover()
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
</body>

</html>