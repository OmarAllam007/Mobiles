<template>
    <div class="float-right" style="position: relative;">
        <input type="search" class="form-control search-input" id="search-input" v-model="search"
               @focus="getPrevData"
               @blur="getUnFocused"
               :placeholder="t['Search']">
        <div class="search-container" id="search-box" :class="{'none':!searching,'block':searching}">
            <div v-if="search.length > 0">
                <span >{{t['Devices']}}</span>
                <p class="text-center" v-if="!filtered_mobiles.length">{{t['No Mobiles found']}}</p>
                <div class="mobile-container" v-for="mobile in filtered_mobiles ">
                    <a class="tile-container" :href="mobile.show_url">
                        <img :src="mobile.image" class="mobile-image">
                        <div class="mobile-description">
                            <p>{{mobile.name}}</p>
                            <p>{{mobile.price}} $</p>
                        </div>
                    </a>
                </div>
            </div>

            <div v-if="!search.length">
                <span>{{t['Latest Visited']}}</span>
                <div class="mobile-container" v-for="mobile in visited_mobiles">
                    <a  class="tile-container" :href="mobile.show_url">
                        <img :src="mobile.image" class="mobile-image">
                        <div class="mobile-description">
                            <p>{{mobile.name}}</p>
                            <p>{{mobile.price}} $</p>
                        </div>
                    </a>
                </div>
            </div>


            <!--<ul class="list-unstyled list-group" v-if="search.length > 0">-->
            <!--<li class="list-group-item mobile-search-class" v-for="mobile in filtered_mobiles">-->
            <!--<a role="button" :href="mobile.show_url" @click.prevent="saveToSession(mobile.id)"-->
            <!--style="width: 100%;height: 100%;display: inline-block">-->
            <!--<img :src="mobile.image_path" class="img-fluid img-rounded img-responsive"-->
            <!--style="width: 50px;height: 70px;margin: 10px;overflow:scroll"-->
            <!--&gt;-->
            <!--<p>{{mobile.name}}</p>-->
            <!--<p style="margin: 0">{{t['Release Date']}} : {{mobile.released_date}}</p>-->
            <!--<p style="margin: 0">{{t['Price']}} : {{mobile.price}}</p>-->
            <!--</a>-->
            <!--</li>-->
            <!--</ul>-->

        </div>
    </div>
</template>

<script>
    import Session from './Session.js';

    export default {
        name: "search-mobile",
        props: ['t'],
        data() {
            return {
                searching: false,
                search: '',
                mobiles: [],
                visited_mobiles: [],
            }
        },
        ready() {
        },
        watch: {
            search() {
                this.getSearchData();
            }
        },
        methods: {
            getPrevData(){
                this.searching=true

                if (Session.get('mobarrow_visited')) {
                    axios.get('/on-demand/mobiles/get-last-visited', {
                        params: {
                            'visited': Session.get('mobarrow_visited').reverse()
                        }
                    }).then((response) => {
                        this.visited_mobiles = response.data;
                    })
                }

                axios.get('/on-demand/mobiles/search').then((response) => {
                    this.mobiles = response.data;
                })
            },
            getSearchData() {
                axios.get('/on-demand/mobiles/search?search=' + this.search).then((response) => {
                    this.mobiles = response.data;
                })
            },
            getUnFocused() {
                window.setTimeout(() => {
                    this.searching = false;
                }, 200)
            },
        },
        computed: {
            filtered_mobiles() {
                if (this.search) {
                    return this.mobiles.filter((mobile) => {
                        return mobile.name.toLowerCase().includes(this.search.toLowerCase())
                    })
                } else {
                    return this.mobiles
                }
            }
        }
    }
</script>

<style scoped>
    a {
        text-decoration: none;
        color: #2d3047;
    }

    .none {
        display: none !important;
        opacity: 0;
    }

    .block {
        display: block !important;
    }

    .search-input {
        width: 300px;
        /*border-radius: 20px;*/
    }

    .search-container {
        display: flex;
        flex-direction: column;
        position: absolute;
        z-index: 999999;
        width: 100%;
        top: 37px;
        background: white;
        padding: 2px;
        border-radius: 0 0 10px 10px;
        box-shadow: 2px 2px 2px grey;
        background-color: white;
        padding-bottom: 5px;
    }

    .mobile-image {
        width: 70px;
        height: 100%;
        padding: 0 5px 0 5px;
    }

    .mobile-container {
        display: flex;
        flex-direction: row;
        padding-bottom: 5px;
        padding-top: 5px;
    }

    .mobile-container:hover {
        background-color: #008e8033;
    }

    .mobile-description {
        display: flex;
        flex-direction: column;
        padding: 0 5px 0 5px;
        width: 100%;
    }

    .tile-container {
        width: 100%;
        display: flex;
        flex-direction: row;
    }
</style>