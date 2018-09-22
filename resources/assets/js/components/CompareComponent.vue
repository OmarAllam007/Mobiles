<template>
    <div>
        <div v-if="!comparing">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="form-group btn-group-justified form-inline">
                        <input type="text" v-model="search" class="form-control col"
                               placeholder="Enter Mobile Name"/>
                        <div class="btn-group-justified">
                            <button class="btn btn-outline-success" @click="analayzeCompareProcess"
                                    :disabled="selected_mobiles.length < 2">
                                <i class="fa fa-exchange-alt"></i>
                                Compare
                            </button>

                            <button class="btn btn-outline-primary" @click="reset"
                                    :disabled="selected_mobiles.length < 2">
                                <i class="fa fa-sync-alt"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-2"></div>
                </div>
                <div class="col-md-2"></div>
            </div>

            <div class="row" v-if="filtered_mobiles.length" v-for="row in filtered_mobiles_count">
                <div class="col-md-2"></div>
                <div class="col-md-2 col-sm-3" style="padding-bottom:10px;" v-for="(mobile,index) in row">
                    <div style="position: absolute;z-index: 99;padding: 5px;transition:opacity 1s ease-in-out;">
                        <i class="fa fa-2x fa-check-circle" style="color:green;"
                           v-show="selected_mobiles.indexOf(mobile.id) !=-1"></i>
                    </div>
                    <div class="card">
                        <img class="card-img-top image" :src="mobile.image" style="width: 120px;height: 174px;">
                        <div class="middle">
                            <button class="btn btn-outline-success btn-middle" @click="selectMobile(mobile.id)"
                                    :disabled="selected_mobiles.length > 3 || selected_mobiles.indexOf(mobile.id) !=-1"
                                    v-if="selected_mobiles.length > 3 || selected_mobiles.indexOf(mobile.id) == -1">
                                Add
                            </button>
                            <button class="btn btn-outline-danger" @click="selectMobile(mobile.id)"
                                    v-if="selected_mobiles.length > 3 || selected_mobiles.indexOf(mobile.id) != -1">
                                Remove
                            </button>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{mobile.name}}</h5>
                        </div>

                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="row" v-if="!filtered_mobiles.length">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="alert alert-info"><i class="fa fa-exclamation-circle"></i>
                        <strong>No Mobiles found !</strong>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
        <div v-if="comparing">
            <!--General-->

            <div class="row">
                <div class="col-md-2"></div>

                <div class="col-md-8">
                    <div style="padding-bottom: 10px">
                        <button @click="getBack" class="btn btn-outline-primary">
                            <i class="fa fa-arrow-left"></i> Back
                        </button>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>

            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <td :colspan="selected_mobiles.length+1" style="background-color: #1b998b;color:white">
                                <i class="fa fa-sliders-h"></i> General Features
                            </td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td >Image</td>
                            <td class="text-align: center; "
                                v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                <img :src="selected_mobile_data.image"
                                     style="width:120px;height:200px;display: block;margin:0 auto;">
                            </td>
                        </tr>
                        <tr>
                            <td >Name</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.name}}
                            </td>
                        </tr>
                        <tr>
                            <td >Release Date</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.released_date}}
                            </td>
                        </tr>
                        <tr>
                            <td >Operating System</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.operating_system}}
                            </td>
                        </tr>

                        <tr>
                            <td >Size</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.device_dimension}}
                            </td>
                        </tr>
                        <tr>
                            <td >Weight</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.device_weight}}
                            </td>
                        </tr>
                        <tr>
                            <td >Material Of Manfacture</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.device_m_o_m}}
                            </td>
                        </tr>

                        <tr>
                            <td >No. of SIMs</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.device_number_of_sims}}
                            </td>
                        </tr>
                        <tr>
                            <td >Size of SIM</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.device_size_of_sim}}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-2"></div>
            </div>

            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <td :colspan="selected_mobiles.length+1" style="background-color: #1b998b;color:white">
                                <i class="fa fa-mobile-alt"></i> Screen
                            </td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td >Screen Size</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.screen_size}}
                            </td>
                        </tr>
                        <tr>
                            <td >Screen Size Percentage</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.screen_size_percentage}}
                            </td>
                        </tr>
                        <tr>
                            <td >Release Date</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.released_date}}
                            </td>
                        </tr>
                        <tr>
                            <td >Resolution</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.screen_resolution}}
                            </td>
                        </tr>

                        <tr>
                            <td >Screen Dimensions</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.screen_dimensions}}
                            </td>
                        </tr>
                        <tr>
                            <td >Density of Pixels</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.screen_density_of_pixels}}
                            </td>
                        </tr>
                        <tr>
                            <td > Screen Technology</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.screen_technology}}
                            </td>
                        </tr>

                        <tr>
                            <td >Screen Colors</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.screen_colors}}
                            </td>
                        </tr>
                        <tr>
                            <td >Touch</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.screen_touch_features}}
                            </td>
                        </tr>
                        <tr>
                            <td >Screen Protection</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.screen_protection}}
                            </td>
                        </tr>

                        <tr>
                            <td >Extra Features</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.screen_extra_features}}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-2"></div>
            </div>

            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <!--Storage-->
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <td :colspan="selected_mobiles.length+1" style="background-color: #1b998b;color:white">
                                <i class="fa fa-hdd"></i> Storage
                            </td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td >Internal Storage</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                <p v-for="internal in selected_mobile_data.internal_storage">{{internal}} GB</p>
                            </td>
                        </tr>
                        <tr>
                            <td >RAM</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                <p v-for="ram in selected_mobile_data.ram">{{ram}} GB</p>
                            </td>
                        </tr>
                        <tr>
                            <td >External Storage</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                <p v-for="external_storage in selected_mobile_data.external_storage">
                                    {{external_storage}} GB</p>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <div class="col-md-2"></div>
            </div>

            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <!--Camera-->
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <td :colspan="selected_mobiles.length+1" style="background-color: #1b998b;color:white">
                                <i class="fa fa-camera-retro"></i> Camera
                            </td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td >Main Camera</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.camera_main_camera}}
                            </td>
                        </tr>
                        <tr>
                            <td >Front Camera</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.camera_front_camera}}
                            </td>
                        </tr>
                        <tr>
                            <td >Front Camera Feature</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.camera_front_camera_features}}
                            </td>
                        </tr>
                        <tr>
                            <td >Video</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.camera_video}}
                            </td>
                        </tr>
                        <tr>
                            <td >Flash</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.camera_flash}}
                            </td>
                        </tr>
                        <tr>
                            <td >Aperture</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.camera_lens_aperture}}
                            </td>
                        </tr>
                        <tr>
                            <td >Sensor Size</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.camera_sensor_size}}
                            </td>
                        </tr>
                        <tr>
                            <td >Focal Length</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.camera_focal_length}}
                            </td>
                        </tr>
                        <tr>
                            <td >Other Features</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.camera_other_features}}
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <div class="col-md-2"></div>
            </div>

            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <!--Hardware-->
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <td :colspan="selected_mobiles.length+1" style="background-color: #1b998b;color:white">
                                <i class="fa fa-cog"></i> Hardware
                            </td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td >Processor</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.processor}}
                            </td>
                        </tr>
                        <tr>
                            <td >Graphical Processor</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.graphical_processor}}
                            </td>
                        </tr>
                        <tr>
                            <td >Chipset</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.chipset}}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-2"></div>
            </div>

            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <!--Battery-->
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <td :colspan="selected_mobiles.length+1" style="background-color: #1b998b;color:white">
                                <i class="fa fa-battery-full"></i> Battery
                            </td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td >Type</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.battery_type}}
                            </td>
                        </tr>
                        <tr>
                            <td >Calls</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.battery_calls_until}}
                            </td>
                        </tr>
                        <tr>
                            <td >Music</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.battery_music_until}}
                            </td>
                        </tr>
                        <tr>
                            <td >Video</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.battery_video_until}}
                            </td>
                        </tr>
                        <tr>
                            <td >Flash</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.camera_flash}}
                            </td>
                        </tr>
                        <tr>
                            <td >Removable</td>
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
                <div class="col-md-2"></div>
            </div>

            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <!--Media-->
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <td :colspan="selected_mobiles.length+1" style="background-color: #1b998b;color:white">
                                <i class="fa fa-play"></i> Media
                            </td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td >Radio</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                <i class="fa fa-check text-success" v-if="selected_mobile_data.media_radio_exist"></i>
                                <i class="fa fa-times text-danger" v-if="!selected_mobile_data.media_radio_exist"></i>
                            </td>

                        </tr>
                        <tr>
                            <td >Speakers</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.media_speaker}}
                            </td>
                        </tr>
                        <tr>
                            <td >3.5mm Slot</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                <i class="fa fa-check text-success" v-if="selected_mobile_data.media_is_35_mm_slot"></i>
                                <i class="fa fa-times text-danger" v-if="!selected_mobile_data.media_is_35_mm_slot"></i>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-2"></div>
            </div>

            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <td :colspan="selected_mobiles.length+1" style="background-color: #1b998b;color:white">
                                <i class="fa fa-broadcast-tower"></i> Communication
                            </td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td >Network</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.communication_network ?
                                selected_mobile_data.communication_network.join(' / ') : ''}}
                            </td>
                        </tr>

                        <tr>
                            <td >Bluetooth</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.communication_bluetooth}}
                            </td>
                        </tr>

                        <tr>
                            <td >WIFI</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.communication_wifi}}
                            </td>
                        </tr>

                        <tr>
                            <td >USB</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.communication_usb}}
                            </td>
                        </tr>

                        <tr>
                            <td >Hotspot</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                <i class="fa fa-check text-success"
                                   v-if="selected_mobile_data.communication_hotspot"></i>
                                <i class="fa fa-times text-danger"
                                   v-if="!selected_mobile_data.communication_hotspot"></i>
                            </td>
                        </tr>

                        <tr>
                            <td >NFC</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                <i class="fa fa-check text-success" v-if="selected_mobile_data.communication_nfc"></i>
                                <i class="fa fa-times text-danger" v-if="!selected_mobile_data.communication_nfc"></i>
                            </td>
                        </tr>

                        <tr>
                            <td >OTG</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                <i class="fa fa-check text-success" v-if="selected_mobile_data.communication_otg"></i>
                                <i class="fa fa-times text-danger" v-if="!selected_mobile_data.communication_otg"></i>
                            </td>
                        </tr>

                        <tr>
                            <td >IR</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                <i class="fa fa-check text-success" v-if="selected_mobile_data.communication_ir"></i>
                                <i class="fa fa-times text-danger" v-if="!selected_mobile_data.communication_ir"></i>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-2"></div>
            </div>

            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <!--Others-->
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <td :colspan="selected_mobiles.length+1" style="background-color: #1b998b;color:white">
                                <i class="fa fa-th-list"></i> Others
                            </td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td >GPS</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.others_gps}}
                            </td>
                        </tr>
                        <tr>
                            <td >Sensors</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.others_sensors}}
                            </td>
                        </tr>
                        <tr>
                            <td >Open By</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                <p v-for="open_device in selected_mobile_data.others_open_device">
                                    {{open_device}}
                                </p>
                            </td>
                        </tr>

                        <tr>
                            <td >VR</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                <i class="fa fa-check text-success" v-show="selected_mobile_data.others_vr_support"></i>
                                <i class="fa fa-times text-danger" v-show="!selected_mobile_data.others_vr_support"></i>
                            </td>
                        </tr>

                        <tr>
                            <td >Notifications LED</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                <i class="fa fa-check text-success"
                                   v-show="selected_mobile_data.others_notification_led_support"></i>
                                <i class="fa fa-times text-danger"
                                   v-show="!selected_mobile_data.others_notification_led_support"></i>
                            </td>
                        </tr>
                        <tr>
                            <td >Additional Microphone</td>
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
                <div class="col-md-2"></div>
            </div>

            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <!--Purchase-->
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <td :colspan="selected_mobiles.length+1" style="background-color: #1b998b;color:white">
                                <i class="fa fa-shopping-cart"></i> Purchase
                            </td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td >Colors</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.colors}}
                            </td>
                        </tr>
                        <tr>
                            <td >Price</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                {{selected_mobile_data.price}}
                            </td>
                        </tr>

                        <tr>
                            <td >Purchase From</td>
                            <td v-for="(selected_mobile_data, index) in selected_mobiles_data">
                                <p class="text-center">
                                    <a style="min-width:100px" role="button" target="_blank"
                                       :href="selected_mobile_data.url_amazon" class="btn btn-outline-success">Amazon</a>
                                </p>
                                <p class="text-center">
                                    <a style="min-width:100px" role="button" target="_blank"
                                       :href="selected_mobile_data.url_souq" class="btn btn-outline-secondary">Souq</a>
                                </p>
                                <p class="text-center">
                                    <a style="min-width:100px" role="button" target="_blank"
                                       :href="selected_mobile_data.url_jumia" class="btn btn-outline-primary">JUMIA</a>
                                </p>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-2"></div>
            </div>


        </div>
    </div>

</template>
<script>
    export default {
        props: ['mobiles'],
        data() {
            return {
                search: '',
                selected_mobiles: [],
                comparing: false,
                selected_mobiles_data: [],
            }
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
        computed: {
            filtered_mobiles() {
                if (this.search) {
                    if (this.selected_mobiles.length > 2) {
                        return this.mobiles.filter((mobile) => {
                            return this.selected_mobiles.indexOf(mobile.id) != -1
                        })
                    }
                    else {
                        return this.mobiles.filter((mobile) => {
                            return mobile.name.toLowerCase().includes(this.search.toLowerCase()) || this.selected_mobiles.indexOf(mobile.id) != -1
                        })
                    }
                } else {
                    if (this.selected_mobiles.length > 2) {
                        return this.mobiles.filter((mobile) => {
                            return this.selected_mobiles.indexOf(mobile.id) != -1
                        })
                    } else {
                        return this.mobiles
                    }
                }
            },
            filtered_mobiles_count() {
                let finalArray = [];
                let chunk = 4;
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
    .image {
        opacity: 1;
        display: block;
        width: 100%;
        height: auto;
        transition: .5s ease;
        backface-visibility: hidden;
    }

    .middle {
        transition: .5s ease;
        opacity: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        text-align: center;
    }

    .image:hover {
        opacity: 0.3;
    }

    .btn-middle:hover + .image {
        opacity: 0.3;
    }

    .image:hover + .middle {
        opacity: 1;
    }

    .middle:hover + .image {
        opacity: 0.3;
    }

    .middle:hover {
        opacity: 1;
    }

    .image {
        display: block;
        padding-top: 5px;
        padding-bottom: 5px;
        margin: 0 auto;
    }


</style>