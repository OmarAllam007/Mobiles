<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <td style="background-color: #1b998b;color:white" colspan="2">
                    <i class="fa fa-sliders-h"></i> {{t('General Feature')}}
                </td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="width: 180px">{{t('Name')}}</td>
                <td>{{$mobile->name}}
                </td>
            </tr>
            <tr>
                <td style="width: 180px">{{t('Release Date')}}</td>
                <td>
                    {{$mobile->released_date ? \Carbon\Carbon::parse($mobile->released_date)->format('Y/M/d') : ''}}
                </td>
            </tr>

            @if($mobile->operating_system)

                <tr>
                    <td style="width: 180px">{{t('Operating System')}}</td>
                    <td>
                        {{$mobile->operating_system}}
                    </td>
                </tr>
            @endif

            @if($mobile->device_dimension)
                <tr>
                    <td style="width: 180px">{{t('Size')}}</td>
                    <td>
                        {{$mobile->device_dimension}}
                    </td>
                </tr>
            @endif

            @if($mobile->device_weight)
                <tr>
                    <td style="width: 180px">{{('Weight')}}</td>
                    <td>
                        {{$mobile->device_weight}}
                    </td>
                </tr>
            @endif

            @if($mobile->device_m_o_m)
                <tr>
                    <td style="width: 180px">{{('Material Of Manfacture')}}</td>
                    <td>
                        {{$mobile->device_m_o_m}}
                    </td>
                </tr>
            @endif

            @if($mobile->device_number_of_sims)
                <tr>
                    <td style="width: 180px">{{t('No. of SIMs')}}</td>
                    <td>
                        {{$mobile->device_number_of_sims}}
                    </td>
                </tr>
            @endif

            <tr>
                <td style="width: 180px">{{t('Size of SIM')}}</td>
                <td>
                    {{$mobile->device_size_of_sim}}
                </td>
            </tr>

            @if($mobile->images->count())
                <tr>
                    <td style="width: 100px">{{t('Images')}}</td>
                    <td>
                        @foreach($mobile->images as $key=>$image)
                            <img class="hover-shadow" onclick="openModal();currentSlide({{$key+1}})"
                                 src="{{asset('storage/'.$image->image_path)}}">
                        @endforeach
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
        @include('mobile._show._image_modal')
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <td style="background-color: #1b998b;color:white" colspan="2">
                    <i class="fa fa-mobile-alt"></i> {{t('Screen')}}
                </td>
            </tr>
            </thead>
            <tbody>

            @if($mobile->screen_size)
                <tr>
                    <td style="width: 180px">{{t('Screen Size')}}</td>
                    <td>
                        {{$mobile->screen_size}}
                    </td>
                </tr>
            @endif

            @if($mobile->screen_size_percentage)
                <tr>
                    <td style="width: 180px">{{t('Screen Size Percentage')}}</td>
                    <td>
                        {{$mobile->screen_size_percentage}}
                    </td>
                </tr>
            @endif

            @if($mobile->screen_resolution)
                <tr>
                    <td style="width: 180px">{{t('Resolution')}}</td>
                    <td>
                        {{$mobile->screen_resolution}}
                    </td>
                </tr>
            @endif


            @if($mobile->screen_dimensions)
                <tr>
                    <td style="width: 180px">{{t('Screen Dimensions')}}</td>
                    <td>
                        {{$mobile->screen_dimensions}}
                    </td>
                </tr>
            @endif

            @if($mobile->screen_density_of_pixels)
                <tr>
                    <td style="width: 180px">{{t('Density of Pixels')}}</td>
                    <td>
                        {{$mobile->screen_density_of_pixels}}
                    </td>
                </tr>
            @endif

            @if($mobile->screen_technology)
                <tr>
                    <td style="width: 180px">{{t(' Screen Technology')}}</td>
                    <td>
                        {{$mobile->screen_technology}}
                    </td>
                </tr>
            @endif


            @if($mobile->screen_colors)
                <tr>
                    <td style="width: 180px">{{t('Screen Colors')}}</td>
                    <td>
                        {{$mobile->screen_colors}}
                    </td>
                </tr>
            @endif

            @if($mobile->screen_touch_features)
                <tr>
                    <td style="width: 180px">{{t('Touch')}}</td>
                    <td>
                        {{$mobile->screen_touch_features}}
                    </td>
                </tr>
            @endif

            @if($mobile->screen_protection)
                <tr>
                    <td style="width: 180px">{{t('Screen Protection')}}</td>
                    <td>
                        {{$mobile->screen_protection}}
                    </td>
                </tr>
            @endif


            @if($mobile->screen_extra_features)
                <tr>
                    <td style="width: 180px">{{t('Extra Features')}}</td>
                    <td>
                        {{$mobile->screen_extra_features}}
                    </td>
                </tr>
            @endif
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
                    <i class="fa fa-hdd"></i> {{t('Storage')}}
                </td>
            </tr>
            </thead>
            <tbody>

            @if($mobile->internal_storage)
                <tr>
                    <td style="width: 180px">{{t('Internal Storage')}}</td>
                    <td>
                        @if($mobile->internal_storage)
                            @foreach($mobile->internal_storage as $internal)
                                <p>{{$internal}} GB</p>
                            @endforeach
                        @endif
                    </td>
                </tr>
            @endif

            @if($mobile->ram)
                <tr>
                    <td style="width: 180px">{{t('RAM')}}</td>
                    <td>
                        @if($mobile->ram)
                            @foreach($mobile->ram as $ram)
                                <p>{{$ram}} GB</p>
                            @endforeach
                        @endif
                    </td>
                </tr>
            @endif


            @if($mobile->external_storage)
                <tr>
                    <td style="width: 180px">{{t('External Storage')}}</td>
                    <td>
                        @if($mobile->external_storage)
                            @foreach($mobile->external_storage as $external_storage)
                                <p>{{$external_storage}} GB</p>
                            @endforeach
                        @endif
                    </td>
                </tr>
            @endif
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

            @if($mobile->camera_main_camera)
                <tr>
                    <td style="width: 180px">{{t('Main Camera')}}</td>
                    <td>
                        {{$mobile->camera_main_camera}}
                    </td>
                </tr>
            @endif

            @if($mobile->camera_front_camera)
                <tr>
                    <td style="width: 180px">{{t('Front Camera')}}</td>
                    <td>
                        {{$mobile->camera_front_camera}}
                    </td>
                </tr>
            @endif

            @if($mobile->camera_front_camera_features)
                <tr>
                    <td style="width: 180px">{{t('Front Camera Feature')}}</td>
                    <td>
                        {{$mobile->camera_front_camera_features}}
                    </td>
                </tr>
            @endif

            @if($mobile->camera_video)
                <tr>
                    <td style="width: 180px">{{t('Video')}}</td>
                    <td>
                        {{$mobile->camera_video}}
                    </td>
                </tr>
            @endif

            @if($mobile->camera_flash)
                <tr>
                    <td style="width: 180px">{{t('Flash')}}</td>
                    <td>
                        {{$mobile->camera_flash}}
                    </td>
                </tr>
            @endif

            @if($mobile->camera_lens_aperture)
                <tr>
                    <td style="width: 180px">{{t('Aperture')}}</td>
                    <td>
                        {{$mobile->camera_lens_aperture}}
                    </td>
                </tr>
            @endif

            @if($mobile->camera_sensor_size)
                <tr>
                    <td style="width: 180px">{{t('Sensor Size')}}</td>
                    <td>
                        {{$mobile->camera_sensor_size}}
                    </td>
                </tr>
            @endif

            @if($mobile->camera_focal_length)
                <tr>
                    <td style="width: 180px">{{t('Focal Length')}}</td>
                    <td>
                        {{$mobile->camera_focal_length}}
                    </td>
                </tr>
            @endif

            @if($mobile->camera_other_features)
                <tr>
                    <td style="width: 180px">{{t('Other Features')}}</td>
                    <td>
                        {{$mobile->camera_other_features}}
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
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
        <br>
    </div>
</div>