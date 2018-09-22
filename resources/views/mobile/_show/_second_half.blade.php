<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <!--Hardware-->
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <td   colspan="2" style="background-color: #1b998b;color:white">
                    <i class="fa fa-cog"></i> Hardware
                </td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="width: 180px" >Processor</td>
                <td>
                    {{$mobile->processor}}
                </td>
            </tr>
            <tr>
                <td style="width: 180px" >Graphical Processor</td>
                <td>
                    {{$mobile->graphical_processor}}
                </td>
            </tr>
            <tr>
                <td style="width: 180px" >Chipset</td>
                <td>
                    {{$mobile->chipset}}
                </td>
            </tr>
            </tbody>
        </table>

    </div>
    <div class="col-md-3"></div>
</div>

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <!--Battery-->
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <td style="background-color: #1b998b;color:white" colspan="2">
                    <i class="fa fa-battery-full"></i> Battery
                </td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="width: 180px" >Type</td>
                <td>
                    {{$mobile->battery_type}}
                </td>
            </tr>
            <tr>
                <td style="width: 180px" >Calls</td>
                <td>
                    {{$mobile->battery_calls_until}}
                </td>
            </tr>
            <tr>
                <td style="width: 180px" >Music</td>
                <td>
                    {{$mobile->battery_music_until}}
                </td>
            </tr>
            <tr>
                <td style="width: 180px" >Video</td>
                <td>
                    {{$mobile->battery_video_until}}
                </td>
            </tr>
            <tr>
                <td style="width: 180px" >Flash</td>
                <td>
                    {{$mobile->camera_flash}}
                </td>
            </tr>
            <tr>
                <td style="width: 180px" >Removable</td>
                <td>
                    @if($mobile->battery_is_removable)
                        <i class="fa fa-check text-success"></i>
                    @else
                        <i class="fa fa-times text-danger"></i>
                    @endif
                </td>
            </tr>
            </tbody>
        </table>

    </div>
    <div class="col-md-3"></div>
</div>


<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <!--Media-->
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <td style="background-color: #1b998b;color:white" colspan="2">
                    <i class="fa fa-play"></i> Media
                </td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="width: 180px" >Radio</td>
                <td>
                    @if($mobile->media_radio_exist)
                        <i class="fa fa-check text-success"></i>
                    @else
                        <i class="fa fa-times text-danger"></i>
                    @endif
                </td>

            </tr>
            <tr>
                <td style="width: 180px" >Speakers</td>
                <td>
                    {{$mobile->media_speaker}}
                </td>
            </tr>
            <tr>
                <td style="width: 180px" >3.5mm Slot</td>
                <td>
                    @if($mobile->media_is_35_mm_slot)
                        <i class="fa fa-check text-success"></i>
                    @else
                        <i class="fa fa-times text-danger"></i>
                    @endif
                </td>
            </tr>
            </tbody>
        </table>

    </div>
    <div class="col-md-3"></div>
</div>

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">

        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <td style="background-color: #1b998b;color:white" colspan="2">
                    <i class="fa fa-broadcast-tower"></i> Communication
                </td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="width: 180px" >Network</td>
                <td>
                    {{$mobile->network_names}}
                </td>
            </tr>

            <tr>
                <td style="width: 180px" >Bluetooth</td>
                <td>
                    {{$mobile->communication_bluetooth}}
                </td>
            </tr>

            <tr>
                <td style="width: 180px" >WIFI</td>
                <td>
                    {{$mobile->communication_wifi}}
                </td>
            </tr>

            <tr>
                <td style="width: 180px" >USB</td>
                <td>
                    {{$mobile->communication_usb}}
                </td>
            </tr>

            <tr>
                <td style="width: 180px" >Hotspot</td>
                <td>
                    @if($mobile->communication_hotspot)
                        <i class="fa fa-check text-success"></i>
                    @else
                        <i class="fa fa-times text-danger"></i>
                    @endif
                </td>
            </tr>

            <tr>
                <td style="width: 180px" >NFC</td>
                <td>
                    @if($mobile->communication_nfc)
                        <i class="fa fa-check text-success"></i>
                    @else
                        <i class="fa fa-times text-danger"></i>
                    @endif
                </td>
            </tr>

            <tr>
                <td style="width: 180px" >OTG</td>
                <td>
                    @if($mobile->communication_otg)
                        <i class="fa fa-check text-success"></i>
                    @else
                        <i class="fa fa-times text-danger"></i>
                    @endif
                </td>
            </tr>

            <tr>
                <td style="width: 180px" >IR</td>
                <td>
                    @if($mobile->communication_ir)
                        <i class="fa fa-check text-success"></i>
                    @else
                        <i class="fa fa-times text-danger"></i>
                    @endif
                </td>
            </tr>
            </tbody>
        </table>

    </div>
    <div class="col-md-3"></div>
</div>

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <!--Others-->
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <td style="background-color: #1b998b;color:white" colspan="2">
                    <i class="fa fa-th-list"></i> Others
                </td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="width: 180px" >GPS</td>
                <td>
                    {{$mobile->others_gps}}
                </td>
            </tr>
            <tr>
                <td style="width: 180px" >Sensors</td>
                <td>
                    {{$mobile->others_sensors}}
                </td>
            </tr>
            <tr>
                <td style="width: 180px" >Open By</td>
                <td>
                    <p>
                        {{$mobile->open_device}}
                    </p>
                </td>
            </tr>

            <tr>
                <td style="width: 180px" >VR</td>
                <td>
                    @if($mobile->vr)
                        <i class="fa fa-check text-success"></i>
                    @else
                        <i class="fa fa-times text-danger"></i>
                    @endif
                </td>
            </tr>

            <tr>
                <td style="width: 180px" >Notifications LED</td>
                <td>
                    @if($mobile->others_notification_led_support)
                        <i class="fa fa-check text-success"></i>
                    @else
                        <i class="fa fa-times text-danger"></i>
                    @endif
                </td>
            </tr>
            <tr>
                <td style="width: 180px" >Additional Microphone</td>
                <td>
                    @if($mobile->others_additional_microphone_exist)
                        <i class="fa fa-check text-success"></i>
                    @else
                        <i class="fa fa-times text-danger"></i>
                    @endif
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-3"></div>
</div>

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <td style="background-color: #1b998b;color:white" colspan="2">
                    <i class="fa fa-camera-retro"></i> Camera
                </td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="width: 180px">Main Camera</td>
                <td>
                    {{$mobile->camera_main_camera}}
                </td>
            </tr>
            <tr>
                <td style="width: 180px">Front Camera</td>
                <td>
                    {{$mobile->camera_front_camera}}
                </td>
            </tr>
            <tr>
                <td style="width: 180px">Front Camera Feature</td>
                <td>
                    {{$mobile->camera_front_camera_features}}
                </td>
            </tr>
            <tr>
                <td style="width: 180px">Video</td>
                <td>
                    {{$mobile->camera_video}}
                </td>
            </tr>
            <tr>
                <td style="width: 180px">Flash</td>
                <td>
                    {{$mobile->camera_flash}}
                </td>
            </tr>
            <tr>
                <td style="width: 180px">Aperture</td>
                <td>
                    {{$mobile->camera_lens_aperture}}
                </td>
            </tr>
            <tr>
                <td style="width: 180px">Sensor Size</td>
                <td>
                    {{$mobile->camera_sensor_size}}
                </td>
            </tr>
            <tr>
                <td style="width: 180px">Focal Length</td>
                <td>
                    {{$mobile->camera_focal_length}}
                </td>
            </tr>
            <tr>
                <td style="width: 180px">Other Features</td>
                <td>
                    {{$mobile->camera_other_features}}
                </td>
            </tr>


            </tbody>
        </table>
    </div>
    <div class="col-md-3"></div>
</div>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <!--Purchase-->
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <td style="background-color: #1b998b;color:white" colspan="2">
                    <i class="fa fa-shopping-cart"></i> Purchase
                </td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="width: 180px" >Colors</td>
                <td>
                    {{$mobile->colors}}
                </td>
            </tr>
            <tr>
                <td style="width: 180px" >Price</td>
                <td>
                    {{$mobile->price}}
                </td>
            </tr>

            <tr>
                <td style="width: 180px" >Purchase From</td>
                <td>
                    <p>
                        <a style="min-width:100px" role="button" target="_blank"
                           href="{{$mobile->url_amazon}}" class="btn btn-outline-success">Amazon</a>
                    </p>
                    <p>
                        <a style="min-width:100px" role="button" target="_blank"
                           href="{{$mobile->url_souq}}" class="btn btn-outline-secondary">Souq</a>
                    </p>
                    <p>
                        <a style="min-width:100px" role="button" target="_blank"
                           href="" class="btn btn-outline-primary">JUMIA</a>
                    </p>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-3"></div>
</div>










{{--@if(isset($mobile->advertisements[3]) && $mobile->advertisements[3])--}}
    {{--<div class="card">--}}
        {{--{{$mobile->advertisements[3] ?? ''}}--}}
    {{--</div>--}}
{{--@endif--}}

