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

        <div class="row"></div>

        <div class="loading text-center" v-if="loading">
            <i class="fa fa-spinner fa-1x fa-spin"></i>
        </div>

        <div class="tiles-container" v-if="filtered_mobiles.length && !loading">
            <div class="mobiles-container">
                <div class="text-center tile" v-for="(mobile,index)  in filtered_mobiles ">
                    <a :href="mobile.show_url" class="tile-content">
                        <img :src="mobile.image" class="tile-image">
                        <p class="mobile-name"> {{mobile.name}} </p>
                        <p>
                            <span class="badge badge-danger"
                                  style="font-size: 10pt;background-color:#0077aa !important"> {{mobile.main_price_description
                                    ? mobile.main_price_description.toLocaleString()+' $': 0+' $'}}
                            </span>
                        </p>
                    </a>
                </div>
            </div>
        </div>

        <div class="row" v-if="!filtered_mobiles.length && !loading">
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
        props: ['brands', 'top_prices', 'top_love', 't'],
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
                mobiles: [],
                loading: false,
            }
        },
        created() {
            this.loading = true
            axios.get("/on-demand/mobiles/compare").then((response) => {
                this.mobiles = response.data;
                this.loading = false
            })
        },
        watch: {
            brand_id() {
                this.filterData()
            },
            main_battery_description(){
                this.filterData()
            },
            main_camera_pixels_description() {
                this.filterData()
            },
            camera_front_camera() {
                this.filterData()
            },
            ram() {
                this.filterData()
            },
            price_from() {
                this.filterData()
            },
            price_to() {
                this.filterData()
            }
        },
        methods: {
            applyFilter() {
                this.filter_applied = !this.filter_applied;
            },
            resetFilter() {
                this.filter_applied = !this.filter_applied;
            },
            filterData() {
                this.loading = true;
                axios.get("/on-demand/mobiles/compare", {
                    params: {
                        'brand_id': this.brand_id,
                        'main_camera_pixels_description': this.main_camera_pixels_description,
                        'camera_front_camera': this.camera_front_camera,
                        'ram': this.ram,
                        'main_battery_description': this.main_battery_description,
                        'price_from': this.price_from,
                        'price_to': this.price_to
                    }
                }).then((response) => {
                    this.mobiles = _.orderBy(response.data, 'main_battery_description', ['desc']);
                    this.loading = false
                })
            }
        },
        computed: {
            filtered_mobiles() {
               let mobiles = this.mobiles.filter((mobile) => {
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
                return _.orderBy(mobiles,'main_price_description',['desc'])
            }
        },
        directives: {}
    }
</script>

<style scoped>
    a {
        text-decoration: none;
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
        justify-content: center;
    }

    .tile {
        display: flex;
        flex-direction: row;
        padding: 8px;
        align-items: center;
        border-radius: 5px;
        border: 1px solid #2d3047;
        margin: 1px;
    }

    .tile:hover {
        box-shadow: 0px 0px 5px #2d3147;
        border-radius: 3px;
    }

    .tile-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 130px;
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
</style>