<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <td style="background-color: #1b998b;color:white" colspan="2">
                    <i class="fa fa-sliders-h"></i> General Feature
                </td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="width: 180px">Name</td>
                <td>{{$mobile->name}}
                </td>
            </tr>
            <tr>
                <td style="width: 180px">Release Date</td>
                <td>
                    {{$mobile->released_date}}
                </td>
            </tr>
            <tr>
                <td style="width: 180px">Operating System</td>
                <td>
                    {{$mobile->operating_system}}
                </td>
            </tr>

            <tr>
                <td style="width: 180px">Size</td>
                <td>
                    {{$mobile->device_dimension}}
                </td>
            </tr>
            <tr>
                <td style="width: 180px">Weight</td>
                <td>
                    {{$mobile->device_weight}}
                </td>
            </tr>
            <tr>
                <td style="width: 180px">Material Of Manfacture</td>
                <td>
                    {{$mobile->device_m_o_m}}
                </td>
            </tr>

            <tr>
                <td style="width: 180px">No. of SIMs</td>
                <td>
                    {{$mobile->device_number_of_sims}}
                </td>
            </tr>
            <tr>
                <td style="width: 180px">Size of SIM</td>
                <td>
                    {{$mobile->device_size_of_sim}}
                </td>
            </tr>
            <tr>

                <td style="width: 100px">{{t('Images')}}</td>
                <td>
                    @foreach($mobile->images as $key=>$image)
                        <img class="hover-shadow" onclick="openModal();currentSlide({{$key+1}})"
                             src="{{asset('storage/'.$image->image_path)}}">
                    @endforeach
                </td>
            </tr>
            </tbody>
        </table>
        @include('mobile._show._image_modal')
    </div>
    <div class="col-md-3"></div>
</div>


<div class="row">
    <div class="col-md-3">
        <div class="big-banner ">
            <Adsense
                    data-ad-client="ca-pub-1864972736029501"
                    data-ad-slot="7077188983"
                    data-ad-format="auto"
                    data-full-width-responsive="true"
                    class="adsbygoogle"
                    style="display:block">
            </Adsense>
        </div>
    </div>
    <div class="col-md-6">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <td style="background-color: #1b998b;color:white" colspan="2">
                    <i class="fa fa-mobile-alt"></i> Screen
                </td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="width: 180px">Screen Size</td>
                <td>
                    {{$mobile->screen_size}}
                </td>
            </tr>
            <tr>
                <td style="width: 180px">Screen Size Percentage</td>
                <td>
                    {{$mobile->screen_size_percentage}}
                </td>
            </tr>

            <tr>
                <td style="width: 180px">Resolution</td>
                <td>
                    {{$mobile->screen_resolution}}
                </td>
            </tr>

            <tr>
                <td style="width: 180px">Screen Dimensions</td>
                <td>
                    {{$mobile->screen_dimensions}}
                </td>
            </tr>
            <tr>
                <td style="width: 180px">Density of Pixels</td>
                <td>
                    {{$mobile->screen_density_of_pixels}}
                </td>
            </tr>
            <tr>
                <td style="width: 180px"> Screen Technology</td>
                <td>
                    {{$mobile->screen_technology}}
                </td>
            </tr>

            <tr>
                <td style="width: 180px">Screen Colors</td>
                <td>
                    {{$mobile->screen_colors}}
                </td>
            </tr>
            <tr>
                <td style="width: 180px">Touch</td>
                <td>
                    {{$mobile->screen_touch_features}}
                </td>
            </tr>
            <tr>
                <td style="width: 180px">Screen Protection</td>
                <td>
                    {{$mobile->screen_protection}}
                </td>
            </tr>

            <tr>
                <td style="width: 180px">Extra Features</td>
                <td>
                    {{$mobile->screen_extra_features}}
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-3">
        <div class="big-banner ">
            <Adsense
                    data-ad-client="ca-pub-1864972736029501"
                    data-ad-slot="7077188983"
                    data-ad-format="auto"
                    data-full-width-responsive="true"
                    class="adsbygoogle"
                    style="display:block">
            </Adsense>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <td style="background-color: #1b998b;color:white" colspan="2">
                    <i class="fa fa-hdd"></i> Storage
                </td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="width: 180px">Internal Storage</td>
                <td>
                    @if($mobile->internal_storage)
                        @foreach($mobile->internal_storage as $internal)
                            <p>{{$internal}} GB</p>
                        @endforeach
                    @endif
                </td>
            </tr>
            <tr>
                <td style="width: 180px">RAM</td>
                <td>
                    @if($mobile->ram)
                        @foreach($mobile->ram as $ram)
                            <p>{{$ram}} GB</p>
                        @endforeach
                    @endif
                </td>
            </tr>
            <tr>
                <td style="width: 180px">External Storage</td>
                <td>
                    @if($mobile->external_storage)
                        @foreach($mobile->external_storage as $external_storage)
                            <p>{{$external_storage}} GB</p>
                        @endforeach
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
