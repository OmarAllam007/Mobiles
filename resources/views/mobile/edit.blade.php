@extends('layout.app')

@section('header')
    <div class="col-11">
        <h4>{{t('Edit Mobile')}}</h4>
    </div>
    <div class="col-1">
        <a href="{{route('mobile.index')}}" class="btn btn-outline-info"><i class="fa fa-chevron-left"></i>
        </a>
    </div>
@endsection


@section('body')
        <form action="{{route('mobile.update',$mobile)}}" class="col-12" method="post" enctype="multipart/form-data">
            {{csrf_field()}} {{method_field('patch')}}
            @include('mobile._form')
        </form>
@endsection

@section('scripts')
    <script>

        $(document).ready(function () {
            window.history.pushState(null, "", window.location.href);

            window.onbeforeunload = function (e) {

            }
            window.onpopstate = function () {
                Confirm('Alert', 'Are you sure you want exit this page ?', 'Yes', 'Cancel', 'Blabla');
            };



            function Confirm(title, msg, $true, $false, $link) { /*change*/
                var $content = "<div class='dialog-ovelay'>" +
                    "<div class='dialog'><header>" +
                    " <h3> " + title + " </h3> " +
                    "<i class='fa fa-close'></i>" +
                    "</header>" +
                    "<div class='dialog-msg'>" +
                    " <p> " + msg + " </p> " +
                    "</div>" +
                    "<footer id='footer'>" +
                    "<div class='controls'>" +
                    " <button class='button button-danger doAction'>" + $true + "</button> " +
                    " <button class='button button-default cancelAction'>" + $false + "</button> " +
                    "</div>" +
                    "</footer>" +
                    "</div>" +
                    "</div>";

                $('body').prepend($content);
                $('.doAction').click(function () {
                    window.history.back();
                    $(this).parents('.dialog-ovelay').fadeOut(500, function () {
                        $(this).remove();
                    });
                });
                $('.cancelAction, .fa-close').click(function () {
                    window.history.pushState(null,"href", window.location.href);

                    $(this).parents('.dialog-ovelay').fadeOut(500, function () {
                        $(this).remove();
                    });
                });

            }


        });

    </script>
@append