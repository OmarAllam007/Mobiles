<div class="row">
    <div class="col-md-12">
        <!--Hardware-->
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <td   colspan="2" style="background-color: #1b998b;color:white">
                    <i class="fa fa-cog"></i> {{t('Hardware')}}
                </td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="width: 180px" >{{t('Processor')}}</td>
                <td>
                    {{$mobile->processor}}
                </td>
            </tr>
            <tr>
                <td style="width: 180px" >{{t('Graphical Processor')}}</td>
                <td>
                    {{$mobile->graphical_processor}}
                </td>
            </tr>
            <tr>
                <td style="width: 180px" >{{t('Chipset')}}</td>
                <td>
                    {{$mobile->chipset}}
                </td>
            </tr>
            </tbody>
        </table>

    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <!--Battery-->
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <td style="background-color: #1b998b;color:white" colspan="2">
                    <i class="fa fa-battery-full"></i> {{t('Battery')}}
                </td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="width: 180px" >{{t('Type')}}</td>
                <td>
                    {{$mobile->battery_type}}
                </td>
            </tr>
            <tr>
                <td style="width: 180px" >{{t('Calls')}}</td>
                <td>
                    {{$mobile->battery_calls_until}}
                </td>
            </tr>
            <tr>
                <td style="width: 180px" >{{t('Music')}}</td>
                <td>
                    {{$mobile->battery_music_until}}
                </td>
            </tr>
            <tr>
                <td style="width: 180px" >{{t('Video')}}</td>
                <td>
                    {{$mobile->battery_video_until}}
                </td>
            </tr>
            <tr>
                <td style="width: 180px" >{{t('Flash')}}</td>
                <td>
                    {{$mobile->camera_flash}}
                </td>
            </tr>
            <tr>
                <td style="width: 180px" >{{t('Removable')}}</td>
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
</div>


<div class="row">
    <div class="col-md-12">
        <!--Media-->
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <td style="background-color: #1b998b;color:white" colspan="2">
                    <i class="fa fa-play"></i> {{t('Media')}}
                </td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="width: 180px" >{{t('Radio')}}</td>
                <td>
                    @if($mobile->media_radio_exist)
                        <i class="fa fa-check text-success"></i>
                    @else
                        <i class="fa fa-times text-danger"></i>
                    @endif
                </td>

            </tr>
            <tr>
                <td style="width: 180px" >{{t('Speakers')}}</td>
                <td>
                    {{$mobile->media_speaker}}
                </td>
            </tr>
            <tr>
                <td style="width: 180px" >{{t('3.5mm Slot')}}</td>
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
</div>

<div class="row">
    <div class="col-md-12">

        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <td style="background-color: #1b998b;color:white" colspan="2">
                    <i class="fa fa-broadcast-tower"></i> {{t('Communication')}}
                </td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="width: 180px" >{{t('Network')}}</td>
                <td>
                    {{$mobile->network_names}}
                </td>
            </tr>

            <tr>
                <td style="width: 180px" >{{t('Bluetooth')}}</td>
                <td>
                    {{$mobile->communication_bluetooth}}
                </td>
            </tr>

            <tr>
                <td style="width: 180px" >{{t('WIFI')}}</td>
                <td>
                    {{$mobile->communication_wifi}}
                </td>
            </tr>

            <tr>
                <td style="width: 180px" >{{t('USB')}}</td>
                <td>
                    {{$mobile->communication_usb}}
                </td>
            </tr>

            <tr>
                <td style="width: 180px" >{{t('Hotspot')}}</td>
                <td>
                    @if($mobile->communication_hotspot)
                        <i class="fa fa-check text-success"></i>
                    @else
                        <i class="fa fa-times text-danger"></i>
                    @endif
                </td>
            </tr>

            <tr>
                <td style="width: 180px" >{{t('NFC')}}</td>
                <td>
                    @if($mobile->communication_nfc)
                        <i class="fa fa-check text-success"></i>
                    @else
                        <i class="fa fa-times text-danger"></i>
                    @endif
                </td>
            </tr>

            <tr>
                <td style="width: 180px" >{{t('OTG')}}</td>
                <td>
                    @if($mobile->communication_otg)
                        <i class="fa fa-check text-success"></i>
                    @else
                        <i class="fa fa-times text-danger"></i>
                    @endif
                </td>
            </tr>

            <tr>
                <td style="width: 180px" >{{t('IR')}}</td>
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
</div>

<div class="row">
    <div class="col-md-12">
        <!--Others-->
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <td style="background-color: #1b998b;color:white" colspan="2">
                    <i class="fa fa-th-list"></i> {{t('Others')}}
                </td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="width: 180px" >{{t('GPS')}}</td>
                <td>
                    {{$mobile->others_gps}}
                </td>
            </tr>
            <tr>
                <td style="width: 180px" >{{t('Sensors')}}</td>
                <td>
                    {{$mobile->others_sensors}}
                </td>
            </tr>
            <tr>
                <td style="width: 180px" >{{t('Open By')}}</td>
                <td>
                    <p>
                        {{$mobile->open_device}}
                    </p>
                </td>
            </tr>

            <tr>
                <td style="width: 180px" >{{t('VR')}}</td>
                <td>
                    @if($mobile->vr)
                        <i class="fa fa-check text-success"></i>
                    @else
                        <i class="fa fa-times text-danger"></i>
                    @endif
                </td>
            </tr>

            <tr>
                <td style="width: 180px" >{{t('Notifications LED')}}</td>
                <td>
                    @if($mobile->others_notification_led_support)
                        <i class="fa fa-check text-success"></i>
                    @else
                        <i class="fa fa-times text-danger"></i>
                    @endif
                </td>
            </tr>
            <tr>
                <td style="width: 180px" >{{t('Additional Microphone')}}</td>
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
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <td style="background-color: #1b998b;color:white" colspan="2">
                    <i class="fa fa-camera-retro"></i> {{t('Camera')}}
                </td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="width: 180px">M{{t('ain Camera')}}</td>
                <td>
                    {{$mobile->camera_main_camera}}
                </td>
            </tr>
            <tr>
                <td style="width: 180px">F{{t('ront Camera')}}</td>
                <td>
                    {{$mobile->camera_front_camera}}
                </td>
            </tr>
            <tr>
                <td style="width: 180px">F{{t('ront Camera Feature')}}</td>
                <td>
                    {{$mobile->camera_front_camera_features}}
                </td>
            </tr>
            <tr>
                <td style="width: 180px">V{{t('ideo')}}</td>
                <td>
                    {{$mobile->camera_video}}
                </td>
            </tr>
            <tr>
                <td style="width: 180px">F{{t('lash')}}</td>
                <td>
                    {{$mobile->camera_flash}}
                </td>
            </tr>
            <tr>
                <td style="width: 180px">A{{t('perture')}}</td>
                <td>
                    {{$mobile->camera_lens_aperture}}
                </td>
            </tr>
            <tr>
                <td style="width: 180px">S{{t('ensor Size')}}</td>
                <td>
                    {{$mobile->camera_sensor_size}}
                </td>
            </tr>
            <tr>
                <td style="width: 180px">F{{t('ocal Length')}}</td>
                <td>
                    {{$mobile->camera_focal_length}}
                </td>
            </tr>
            <tr>
                <td style="width: 180px">O{{t('ther Features')}}</td>
                <td>
                    {{$mobile->camera_other_features}}
                </td>
            </tr>


            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <!--Purchase-->
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <td style="background-color: #1b998b;color:white" colspan="2">
                    <i class="fa fa-shopping-cart"></i> {{t('Purchase')}}
                </td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="width: 180px" >{{t('Colors')}}</td>
                <td>
                    {{$mobile->colors}}
                </td>
            </tr>
            <tr>
                <td style="width: 180px" >{{t('Price')}}</td>
                <td>
                    {{$mobile->price}}
                </td>
            </tr>

            <tr>
                <td style="width: 180px" >{{t('Purchase From')}}</td>
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
</div>










{{--@if(isset($mobile->advertisements[3]) && $mobile->advertisements[3])--}}
    {{--<div class="card">--}}
        {{--{{$mobile->advertisements[3] ?? ''}}--}}
    {{--</div>--}}
{{--@endif--}}

