<template>
    <div class="float-right col-5" style="margin-right: 50px">
        <input type="search" class="form-control" id="search-input" v-model="search" @focus="searching=true"
               @blur="getUnFocused"
               :placeholder="t['Search']">
        <div class="search-box" id="search-box" :class="{'none':!searching,'block':searching}">
            <p>{{t['Devices']}}</p>
            <ul class="list-unstyled list-group">
                <li class="list-group-item mobile-search-class" v-for="mobile in filtered_mobiles.slice(0,3)">
                    <a role="button" :href="mobile.show_url" style="width: 100%;height: 100%;display: inline-block">
                        <img :src="mobile.image_path" class="img-fluid img-rounded img-responsive"
                             style="width: 50px;height: 70px;margin: 10px;overflow:scroll"
                        >
                        <p>{{mobile.name}}</p>
                        <p style="margin: 0">{{t['Release Date']}} : {{mobile.released_date}}</p>
                        <p style="margin: 0">{{t['Price']}} : {{mobile.price}}</p>
                    </a>
                </li>
            </ul>

        </div>
    </div>
</template>

<script>
    export default {
        name: "search-mobile",
        props: ['mobiles', 't'],
        data() {
            return {
                searching: false,
                search: ''
            }
        },
        created() {


        },
        methods: {
            getUnFocused() {
                window.setTimeout(() => {
                    this.searching = false;
                }, 10)
            }
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
    }

    .block {
        display: block !important;
    }
</style>