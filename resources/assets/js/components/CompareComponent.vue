<template>
    <div>
        <div v-if="!comparing">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group btn-group-justified form-inline">
                        <input type="text" v-model="search" class="form-control col"
                               :placeholder="t['Enter Mobile Name']"/>
                        <div class="btn-group-justified">
                            <button class="btn btn-outline-success" @click="analayzeCompareProcess"
                                    :disabled="selected_mobiles.length < 2">
                                <i class="fa fa-exchange-alt"></i>
                                {{t['Compare']}}
                            </button>

                            <button class="btn btn-outline-primary" @click="reset"
                                    :disabled="selected_mobiles.length < 2">
                                <i class="fa fa-sync-alt"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-2"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12" style="margin: 10px 0">
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
            </div>
            <div class="loading text-center" v-if="loading">
                <i class="fa fa-spinner fa-1x fa-spin"></i>
            </div>

            <div class="tiles-container" v-else  v-for="row in filtered_mobiles_count">
                <div class="mobiles-container">
                    <div class="text-center tile" v-for="(mobile,index) in row">
                        <div class="add-remove-btn">
                            <button class="btn btn-xs compare-add-button"
                                    style="padding: 3px;opacity: 1;margin: 1px;border: 1px solid"
                                    @click="selectMobile(mobile.id)"
                                    :disabled="selected_mobiles.length > 3 || selected_mobiles.indexOf(mobile.id) !=-1"
                                    v-if="selected_mobiles.length > 3 || selected_mobiles.indexOf(mobile.id) == -1">
                                <i class="fa fa-check-circle"></i>
                            </button>
                            <button class="btn btn-xs btn-danger" style="padding: 3px;opacity: 1;margin: 1px;"
                                    @click="selectMobile(mobile.id)"
                                    v-if="selected_mobiles.length > 3 || selected_mobiles.indexOf(mobile.id) != -1">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                        <div class="tile-content" style="position: relative">
                            <!--<div class="middle">-->
                            <!--<button class="btn compare-add-button btn-middle" @click="selectMobile(mobile.id)"-->
                            <!--:disabled="selected_mobiles.length > 3 || selected_mobiles.indexOf(mobile.id) !=-1"-->
                            <!--v-if="selected_mobiles.length > 3 || selected_mobiles.indexOf(mobile.id) == -1">-->
                            <!--{{t['Add']}}-->
                            <!--</button>-->

                            <!--</div>-->
                            <img class="tile-image" :src="mobile.image">
                            <p class="mobile-name"> {{mobile.name}} </p>
                            <div style="display:flex;flex-direction: row">
                            <span class="badge badge-danger"
                                  style="font-size: 10pt;background-color:#0077aa !important"> {{mobile.main_price_description
                                    ? mobile.main_price_description.toLocaleString()+' $': 0+' $'}}
                            </span>
                            </div>
                        </div>

                        <!--<div class="tile-content">-->

                        <!--</div>-->
                    </div>
                </div>
            </div>

            <!--<div class="row" v-if="filtered_mobiles.length" v-for="row in filtered_mobiles_count">-->
            <!--<div class="col-md-3 col-sm-3" style="padding-bottom:10px;padding: 0" v-for="(mobile,index) in row">-->
            <!--<div style="position: absolute;z-index: 99;padding: 5px;transition:opacity 1s ease-in-out;">-->
            <!--<i class="fa fa-2x fa-check-circle" style="color:green;"-->
            <!--v-show="selected_mobiles.indexOf(mobile.id) !=-1"></i>-->
            <!--</div>-->
            <!--<div class="card hvr-glow li-item-card">-->
            <!--<img class="card-img-top image" :src="mobile.image" style="width: 120px;height: 174px;">-->

            <!--<div class="card-body">-->
            <!--<h6 class="card-title text-center">{{mobile.name}}</h6>-->
            <!--<p class="text-center" >-->
            <!--<span class="badge badge-info" style="font-size: 10pt">-->
            <!--{{mobile.main_price_description.toLocaleString()}} $-->
            <!--</span>-->
            <!--</p>-->
            <!--</div>-->

            <!--</div>-->
            <!--</div>-->
            <!--</div>-->
            <!--<div class="row" v-if="!filtered_mobiles.length">-->
                <!--<div class="col-md-12">-->
                    <!--<div class="alert alert-info"><i class="fa fa-exclamation-circle"></i>-->
                        <!--<strong>{{t['No Mobiles found']}} !</strong>-->
                    <!--</div>-->
                <!--</div>-->
                <!--<div class="col-md-2"></div>-->
            <!--</div>-->
        </div>
        <div v-if="comparing">
            <!--General-->

            <div class="row">
                <div class="col-md-12">
                    <div style="padding-bottom: 10px">
                        <button @click="getBack" class="btn btn-outline-primary">
                            <i class="fa fa-arrow-left"></i> {{t['Back']}}
                        </button>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <td :colspan="selected_mobiles.length+1" style="background-color: #1b998b;color:white">

                                <i class="fa fa-sliders-h"></i> {{t['General Feature']}}
                            </td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>

                            <td style="width: 180px">{{t['Image']}}</td>
                            <td class="text-align: center; "
                                v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                <img :src="selected_mobile_data.image"
                                     style="width:120px;height:200px;display: block;margin:0 auto;">
                            </td>
                        </tr>
                        <tr>

                            <td style="width: 180px">{{t['Name']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.name}}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 180px">{{t['Release Date']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.released_date}}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 180px">{{t['Operating System']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.operating_system}}
                            </td>
                        </tr>

                        <tr>
                            <td style="width: 180px">{{t['Size']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.device_dimension}}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 180px">{{t['Weight']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.device_weight}}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 180px">{{t['Material Of Manufacture']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.device_m_o_m}}
                            </td>
                        </tr>

                        <tr>

                            <td style="width: 180px">{{t['No. of SIMs']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.device_number_of_sims}}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 180px">{{t['Size of SIM']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.device_size_of_sim}}
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
                            <td :colspan="selected_mobiles.length+1" style="background-color: #1b998b;color:white">
                                <i class="fa fa-mobile-alt"></i> {{t['Screen']}}
                            </td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td style="width: 180px">{{t['Screen Size']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.screen_size}}
                            </td>
                        </tr>
                        <tr>

                            <td style="width: 180px">{{t['Screen Size Percentage']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.screen_size_percentage}}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 180px">{{t['Release Date']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.released_date}}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 180px">{{t['Resolution']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.screen_resolution}}
                            </td>
                        </tr>

                        <tr>
                            <td style="width: 180px">{{t['Screen Dimensions']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.screen_dimensions}}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 180px">{{t['Density of Pixels']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.screen_density_of_pixels}}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 180px">{{t['Screen Technology']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.screen_technology}}
                            </td>
                        </tr>

                        <tr>
                            <td style="width: 180px">{{t['Screen Colors']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.screen_colors}}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 180px">{{t['Touch']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.screen_touch_features}}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 180px">{{t['Screen Protection']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.screen_protection}}
                            </td>
                        </tr>

                        <tr>
                            <td style="width: 180px">{{t['Extra Features']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.screen_extra_features}}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <!--Storage-->
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <td :colspan="selected_mobiles.length+1" style="background-color: #1b998b;color:white">
                                <i class="fa fa-hdd"></i> {{t['Storage']}}
                            </td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td style="width: 180px">{{t['Internal Storage']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                <p v-for="internal in selected_mobile_data.internal_storage">{{internal}} GB</p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 180px">{{t['RAM']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                <p v-for="ram in selected_mobile_data.ram">{{ram}} GB</p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 180px">{{t['External Storage']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                <p v-for="external_storage in selected_mobile_data.external_storage">
                                    {{external_storage}} GB</p>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <!--Camera-->
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <td :colspan="selected_mobiles.length+1" style="background-color: #1b998b;color:white">
                                <i class="fa fa-camera-retro"></i> {{t['Camera']}}
                            </td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td style="width: 180px">{{t['Main Camera']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.camera_main_camera}}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 180px">{{t['Front Camera']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.camera_front_camera}}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 180px">{{t['Front Camera Feature']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.camera_front_camera_features}}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 180px">{{t['Video']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.camera_video}}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 180px">{{t['Flash']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.camera_flash}}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 180px">{{t['Aperture']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.camera_lens_aperture}}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 180px">{{t['Sensor Size']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.camera_sensor_size}}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 180px">{{t['Focal Length']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.camera_focal_length}}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 180px">{{t['Other Features']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.camera_other_features}}
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <!--Hardware-->
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <td :colspan="selected_mobiles.length+1" style="background-color: #1b998b;color:white">
                                <i class="fa fa-cog"></i> {{t['Hardware']}}
                            </td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td style="width: 180px">{{t['Processor']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.processor}}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 180px">{{t['Graphical Processor']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.graphical_processor}}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 180px">{{t['Chipset']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.chipset}}
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
                            <td :colspan="selected_mobiles.length+1" style="background-color: #1b998b;color:white">
                                <i class="fa fa-battery-full"></i> {{t['Battery']}}
                            </td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td style="width: 180px">{{t['Type']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.battery_type}}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 180px">{{t['Calls']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.battery_calls_until}}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 180px">{{t['Music']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.battery_music_until}}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 180px">{{t['Video']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.battery_video_until}}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 180px">{{t['Flash']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.camera_flash}}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 180px">{{t['Removable']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                <i class="fa fa-check text-success"
                                   v-if="selected_mobile_data.battery_is_removable"></i>
                                <i class="fa fa-times text-danger"
                                   v-if="!selected_mobile_data.battery_is_removable"></i>
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
                            <td :colspan="selected_mobiles.length+1" style="background-color: #1b998b;color:white">
                                <i class="fa fa-play"></i> {{t['Media']}}
                            </td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td style="width: 180px">{{t['Radio']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                <i class="fa fa-check text-success" v-if="selected_mobile_data.media_radio_exist"></i>
                                <i class="fa fa-times text-danger" v-if="!selected_mobile_data.media_radio_exist"></i>
                            </td>

                        </tr>
                        <tr>
                            <td style="width: 180px">{{t['Speakers']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.media_speaker}}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 180px">{{t['3.5mm Slot']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                <i class="fa fa-check text-success" v-if="selected_mobile_data.media_is_35_mm_slot"></i>
                                <i class="fa fa-times text-danger" v-if="!selected_mobile_data.media_is_35_mm_slot"></i>
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
                            <td :colspan="selected_mobiles.length+1" style="background-color: #1b998b;color:white">
                                <i class="fa fa-broadcast-tower"></i> {{t['Communication']}}
                            </td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td style="width: 180px">{{t['Network']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.communication_network ?
                                selected_mobile_data.communication_network.join(' / ') : ''}}
                            </td>
                        </tr>

                        <tr>
                            <td style="width: 180px">{{t['Bluetooth']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.communication_bluetooth}}
                            </td>
                        </tr>

                        <tr>
                            <td style="width: 180px">{{t['WIFI']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.communication_wifi}}
                            </td>
                        </tr>

                        <tr>
                            <td style="width: 180px">{{t['USB']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.communication_usb}}
                            </td>
                        </tr>

                        <tr>
                            <td style="width: 180px">{{t['Hotspot']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                <i class="fa fa-check text-success"
                                   v-if="selected_mobile_data.communication_hotspot"></i>
                                <i class="fa fa-times text-danger"
                                   v-if="!selected_mobile_data.communication_hotspot"></i>
                            </td>
                        </tr>

                        <tr>
                            <td style="width: 180px">{{t['NFC']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                <i class="fa fa-check text-success" v-if="selected_mobile_data.communication_nfc"></i>
                                <i class="fa fa-times text-danger" v-if="!selected_mobile_data.communication_nfc"></i>
                            </td>
                        </tr>

                        <tr>
                            <td style="width: 180px">{{t['OTG']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                <i class="fa fa-check text-success" v-if="selected_mobile_data.communication_otg"></i>
                                <i class="fa fa-times text-danger" v-if="!selected_mobile_data.communication_otg"></i>
                            </td>
                        </tr>

                        <tr>
                            <td style="width: 180px">{{t['IR']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                <i class="fa fa-check text-success" v-if="selected_mobile_data.communication_ir"></i>
                                <i class="fa fa-times text-danger" v-if="!selected_mobile_data.communication_ir"></i>
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
                            <td :colspan="selected_mobiles.length+1" style="background-color: #1b998b;color:white">
                                <i class="fa fa-th-list"></i> {{t['Others']}}
                            </td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td style="width: 180px">{{t['GPS']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.others_gps}}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 180px">{{t['Sensors']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.others_sensors}}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 180px">{{t['Open By']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                <p v-for="open_device in selected_mobile_data.others_open_device">
                                    {{open_device}}
                                </p>
                            </td>
                        </tr>

                        <tr>
                            <td style="width: 180px">{{t['VR']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                <i class="fa fa-check text-success" v-show="selected_mobile_data.others_vr_support"></i>
                                <i class="fa fa-times text-danger" v-show="!selected_mobile_data.others_vr_support"></i>
                            </td>
                        </tr>

                        <tr>
                            <td style="width: 180px">{{t['Notifications LED']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                <i class="fa fa-check text-success"
                                   v-show="selected_mobile_data.others_notification_led_support"></i>
                                <i class="fa fa-times text-danger"
                                   v-show="!selected_mobile_data.others_notification_led_support"></i>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 180px">{{t['Additional Microphone']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                <i class="fa fa-check text-success"
                                   v-show="selected_mobile_data.others_additional_microphone_exist"></i>
                                <i class="fa fa-times text-danger"
                                   v-show="!selected_mobile_data.others_additional_microphone_exist"></i>
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
                            <td :colspan="selected_mobiles.length+1" style="background-color: #1b998b;color:white">
                                <i class="fa fa-shopping-cart"></i> {{t['Purchase']}}
                            </td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td style="width: 180px">{{t['Colors']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.colors}}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 180px">{{t['Price']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.price}}
                            </td>
                        </tr>

                        <tr>
                            <td style="width: 180px">{{t['Purchase From']}}</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                <p class="text-center">
                                    <a style="min-width:100px" role="button" target="_blank"
                                       :href="selected_mobile_data.url_amazon" class="btn btn-outline-success">{{t['Amazon']}}</a>
                                </p>
                                <p class="text-center">
                                    <a style="min-width:100px" role="button" target="_blank"
                                       :href="selected_mobile_data.url_souq" class="btn btn-outline-secondary">{{t['Souq']}}</a>
                                </p>
                                <p class="text-center">
                                    <a style="min-width:100px" role="button" target="_blank"
                                       :href="selected_mobile_data.url_jumia" class="btn btn-outline-primary">{{t['JUMIA']}}</a>
                                </p>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
</template>
<script>
    export default {
        props: ['t'],
        data() {
            return {
                search: '',
                selected_mobiles: [],
                comparing: false,
                selected_mobiles_data: [],
                mobiles: [],
                loading: false
            }
        },
        created() {
            this.loading = true;
            axios.get('/on-demand/mobiles/get-by-name').then((response) => {
                this.mobiles = response.data;
                this.loading = false;
            })
            this.mobiles = _.orderBy(this.mobiles, 'main_price_description', ['desc'])
        },
        methods: {
            selectMobile(id) {
                let index = this.selected_mobiles.indexOf(id)

                if (index != -1) {
                    this.selected_mobiles.splice(index, 1)
                } else {
                    this.selected_mobiles.push(id)
                }
            },
            getBack() {
                this.comparing = false;
            },
            reset() {
                this.selected_mobiles = [];
                this.selected_mobile_data = [];
            },
            analayzeCompareProcess() {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: "POST",
                    url: '/compare-items',
                    data: {
                        _token: CSRF_TOKEN,
                        mobiles: this.selected_mobiles,
                    },
                    dataType: 'JSON',
                    success: (response) => {
                        this.selected_mobiles_data = response
                    }
                });
                this.comparing = true;
            }
        },

        watch: {
            search() {
                this.loading = true;
                axios.get('/on-demand/mobiles/get-by-name?name=' + this.search).then((response) => {
                    this.mobiles = response.data;
                    this.loading = false;

                })
            }
        },
        computed: {
            filtered_mobiles() {
                if (this.search) {
                    if (this.selected_mobiles.length > 2) {
                        let mobs = this.mobiles.filter((mobile) => {
                            return this.selected_mobiles.indexOf(mobile.id) != -1
                        })

                        return _.orderBy(mobs, 'main_price_description', ['desc'])
                    }
                    else {
                        let mobs =  this.mobiles.filter((mobile) => {
                            return mobile.name.toLowerCase().includes(this.search.toLowerCase()) || this.selected_mobiles.indexOf(mobile.id) != -1
                        })

                        return _.orderBy(mobs, 'main_price_description', ['desc'])

                    }
                } else {
                    if (this.selected_mobiles.length > 2) {
                        let mobs =  this.mobiles.filter((mobile) => {
                            return this.selected_mobiles.indexOf(mobile.id) != -1
                        })

                        return _.orderBy(mobs, 'main_price_description', ['desc'])

                    } else {
                        return _.orderBy(this.mobiles, 'main_price_description', ['desc'])
                    }
                }
            },
            filtered_mobiles_count() {
                let finalArray = [];
                let chunk = 12;
                return this.filtered_mobiles.reduce((result, item, index) => {
                    const chunkIndex = Math.floor(index / chunk);
                    if (!result[chunkIndex]) {
                        result[chunkIndex] = [];
                    }
                    result[chunkIndex].push(item);

                    return result
                }, [])
            }
        }
    }
</script>

<style scoped>
    a {
        text-decoration: none;
    }

    .middle {
        transition: .5s ease;
        opacity: 1;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        text-align: center;
        z-index: 9999;
        width: 100%;
    }

    .tiles-container {
        display: flex;
        flex-direction: column;
        /*flex-wrap: wrap;*/
        padding-top: 10px;
    }

    .mobiles-container {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: normal;
        /*padding-top: 10px;*/
    }

    .tile {
        display: flex;
        flex-direction: row;
        padding: 8px;
        align-items: center;
        border-radius: 5px;
        border: 1px solid #2d3047;
        margin: 2px;
        position: relative;
    }

    .tile:hover {
        box-shadow: 0px 0px 5px #2d3147;
        border-radius: 3px;
    }

    .middle:hover + .tile-image {
        opacity: 0.3;
    }

    .tile-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 130px;
    }

    .middle:hover {
        opacity: 1;
    }

    .image:hover + .middle {
        opacity: 1;
    }

    .middle:hover + .tile-image {
        opacity: 0.3;
    }

    .tile-image {
        width: 100px;
        height: 147px;
    }

    .mobile-name {
        height: 40px;
        font-size: 12pt;
        padding-bottom: 2px;
        padding-top: 2px;
    }

    .add-remove-btn {
        position: absolute;
        top: 0;
        z-index: 10;
        left: 0;

    }

</style>