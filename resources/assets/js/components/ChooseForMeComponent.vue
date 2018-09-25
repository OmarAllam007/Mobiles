<template>
    <div>

        <div class="row justify-content-center">
            <div class="col-md-3 col-sm-12">
                <div class="form-group text-center">
                    <label for="brand">{{t['Brand']}}</label>
                    <select name="brand" id="brand" class="form-control" v-model="brand_id">
                        <option value="0">{{t['Select Brand']}}</option>
                        <option :value="brand.id" v-for="(brand,key) in brands">
                            {{brand.name}}
                        </option>

                    </select>
                </div>
            </div>

            <div class="col-md-3 col-sm-12">
                <div class="form-group text-center">
                    <label for="brand">{{t['Rear Camera']}}</label>
                    <input type="number" class="form-control" v-model="main_camera_pixels_description">
                </div>
            </div>

            <div class="col-md-3 col-sm-12 ">
                <div class="form-group text-center">
                    <label for="brand">{{t['Front Camera']}}</label>
                    <input type="number" class="form-control" v-model="camera_front_camera">
                </div>
            </div>

            <div class="col-md-3 col-sm-12 ">
                <div class="form-group text-center">
                    <label for="brand">{{t['RAM (at least)']}}</label>
                    <input type="number" class="form-control" v-model="ram">
                </div>
            </div>

            <div class="col-md-3 col-sm-12 ">
                <div class="form-group text-center">
                    <label for="brand">{{t['Battery (mAh)']}}</label>
                    <input type="number" class="form-control" v-model="main_battery_description">
                </div>
            </div>

            <div class="col-md-3 col-sm-12">
                <div class="form-group text-center">
                    <label for="brand">{{t['Price From ($)']}}</label>
                    <input type="number" class="form-control" v-model="price_from">
                </div>
            </div>

            <div class="col-md-3 col-sm-12 ">
                <div class="form-group text-center">
                    <label for="brand">{{t['Price To ($)']}}</label>
                    <input type="number" class="form-control" v-model="price_to">
                </div>
            </div>

        </div>

        <div class="row justify-content-center">



            <!--<div class="col-2">-->
            <!--<div class="form-group">-->
            <!--<h5>&nbsp;</h5>-->
            <!--<button class="btn " :class="{'btn-success':!filter_applied,'btn-info':filter_applied}"-->
            <!--@click="applyFilter">-->
            <!--<i class="fa" :class="{'fa-filter':!filter_applied,'fa-sync-alt':filter_applied}"></i>-->
            <!--</button>-->
            <!--</div>-->
            <!--</div>-->
        </div>

        <div class="row"></div>

        <div class="row justify-content-center" v-if="filtered_mobiles.length">
            <!--<div class="col-md-6">-->
                <!--<div class="section-side">-->
                    <!--<h5>-->
                        <!--Top 10 By Fans-->
                    <!--</h5>-->
                    <!--<ul class="list-group">-->
                        <!--<li v-for="top in top_love"-->
                            <!--class="list-group-item d-flex justify-content-between align-items-center">-->
                            <!--<a :href="top.show_url">-->
                                <!--{{top.name}}-->
                            <!--</a>-->
                            <!--<span class="badge  badge-pill">{{top.number_of_fans ? top.number_of_fans : 0 }} </span>-->
                        <!--</li>-->
                    <!--</ul>-->
                <!--</div>-->
                <!--<div class="big-banner">-->
                    <!--<p class="text-center">-->
                        <!--Advertisement Place-->
                    <!--</p>-->
                <!--</div>-->
            <!--</div>-->

            <div class="col-md-12">
                <ul class="list-unstyled">
                    <li class="li-item" v-for="(mobile,index) in filtered_mobiles">
                        <a :href="mobile.show_url">
                            <img :src="mobile.image_path" style="width: 100px;height: 147px">
                            <aside>
                                <strong> {{mobile.name}}</strong>
                                <p style="padding-top: 10px"> {{mobile.main_price_description
                                    ?mobile.main_price_description.toLocaleString(): ''}} </p>
                            </aside>

                        </a>
                    </li>
                </ul>
            </div>
            <!--<div class="col-md-6">-->
                <!--<div class="section-side">-->
                    <!--<h5>-->
                        <!--Top 10 By Price-->
                    <!--</h5>-->
                    <!--<ul class="list-group">-->
                        <!--<li v-for="top in top_prices"-->
                            <!--class="list-group-item d-flex justify-content-between align-items-center">-->
                            <!--<a :href="top.show_url">-->
                                <!--{{top.name}}-->
                            <!--</a>-->
                            <!--<span class="badge  badge-pill">{{top.main_price_description ? top.main_price_description : 0 }} </span>-->
                        <!--</li>-->
                    <!--</ul>-->
                <!--</div>-->
                <!--<div class="big-banner">-->
                    <!--<p class="text-center">-->
                        <!--Advertisement Place-->
                    <!--</p>-->
                <!--</div>-->
            <!--</div>-->
        </div>
        <div class="row" v-if="!filtered_mobiles.length">
            <div class="col-12">
                <div class="alert alert-info"><i class="fa fa-frown"></i>
                    <strong>{{t['There are no results matching your search']}}</strong>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: "choose-for-me",
        props: ['brands', 'mobiles', 'top_prices', 'top_love','t'],
        data() {
            return {
                brand_id: 0,
                main_camera_pixels_description: '',
                camera_front_camera: '',
                ram: '',
                main_battery_description: '',
                price_from: '',
                price_to: '',
                filter_applied: false,
                after_filter: [],
                mobile_counter: 0,
            }
        },
        methods: {
            applyFilter() {
                this.filter_applied = !this.filter_applied;
            },
            resetFilter() {
                this.filter_applied = !this.filter_applied;
            },
        },
        computed: {
            filtered_mobiles() {

                return this.mobiles.filter((mobile) => {
                    if (this.brand_id != 0) {
                        return mobile.brand_id === this.brand_id
                    }
                    return true
                }).filter((mobile) => {
                    if (this.main_camera_pixels_description) {
                        return (parseInt(mobile.main_camera_pixels_description) >= parseInt(this.main_camera_pixels_description))
                    }
                    return true
                }).filter((mobile) => {
                    if (this.camera_front_camera) {
                        return (parseInt(mobile.camera_front_camera) >= parseInt(this.camera_front_camera))
                    }
                    return true
                }).filter((mobile) => {
                    if (this.ram) {
                        return (parseInt(mobile.main_ram_description) >= parseInt(this.ram))
                    }
                    return true
                }).filter((mobile) => {
                    if (this.main_battery_description) {
                        return (parseInt(mobile.main_battery_description) >= parseInt(this.main_battery_description))
                    }
                    return true
                }).filter((mobile) => {
                    if (this.price_from && !this.price_to) {
                        console.log(this.price_from)
                        return (parseFloat(mobile.main_price_description) >= parseFloat(this.price_from))
                    } else if (!this.price_from && this.price_to) {
                        return (parseFloat(mobile.main_price_description) <= parseFloat(this.price_to))
                    } else if (this.price_from && this.price_to) {
                        return ((parseFloat(mobile.main_price_description) >= parseFloat(this.price_from)) &&
                            (parseFloat(mobile.main_price_description) <= parseInt(this.price_to)))
                    }

                    return true
                })
            }
        },
        directives: {
            hola(el) {
                console.log('asdadsd')
            }
        }
    }
</script>

<style scoped>

</style>