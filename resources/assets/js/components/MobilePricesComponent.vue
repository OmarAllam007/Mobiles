<template>
    <div>
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="form-group">
                    <input type="number" v-model="search" class="form-control searchByPrice"
                           style="border:none;border-bottom: 1px solid #1b998b;background: transparent"
                           :placeholder="t['Search with price']" autofocus>
                </div>
            </div>
            <div class="col-2"></div>
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
        <div v-else class="tiles-container" v-for="(brands,key) in data">
            <h4>{{key}}</h4>
            <div class="mobiles-container">
                <div class="text-center tile" v-for="mobile in brands ">
                    <a :href="mobile.show_url" class="tile-content">
                        <img :src="mobile.get_image" class="tile-image">
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

        <!--{{ getCount }}-->
        <!--<div class="row" v-if="JSON.stringify(data) ==''" style="padding-top: 20px">-->
        <!--<div class="col-md-12">-->
        <!--<div class="alert alert-info"><i class="fa fa-exclamation-circle"></i>-->
        <!--<strong>{{t['No Mobiles found']}} !</strong>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->

    </div>
</template>

<script>
    export default {
        name: "mobile-prices",
        props: ['t'],
        data() {
            return {
                search: '',
                data: [],
                loading: false
            }
        },
        watch: {
            search() {
                this.getData();
            }
        },
        methods: {
            getData() {
                this.loading = true;
                axios.get('/on-demand/mobiles/get-by-price?price=' + this.search).then((response) => {
                    for(let i in response.data){
                        response.data[i] = _.orderBy(response.data[i], 'main_price_description', ['asc'])
                    }
                    this.data = response.data;
                    this.loading = false;
                })
            }
        },
        created() {
            this.loading = true;
            axios.get('/on-demand/mobiles/get-by-price').then((response) => {
                for(let i in response.data){
                    response.data[i] = _.orderBy(response.data[i], 'main_price_description', ['asc'])
                }
                this.data = response.data;
                this.loading = false;
            })
        },
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
    }

    .tile {
        display: flex;
        flex-direction: row;
        padding: 8px;
        align-items: center;
        border-radius: 5px;
        border: 1px solid #2d3047;
        margin: 2px;
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