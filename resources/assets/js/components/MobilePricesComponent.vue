<template>
    <div>

        <div class="row">
            <div class="col-2"></div>
            <div class="col text-center">
                <div class="form-group">
                    <input type="text" v-model="search" class="form-control searchByPrice"
                           style="border:none;border-bottom: 1px solid #1b998b;background: transparent"
                           placeholder="Search with price">
                </div>
            </div>
            <div class="col-2"></div>
        </div>

        <div class="row" v-for="(brand,key) in filtered_brands" style="padding-top: 45px">
            <div class="col-2"></div>
            <div v-if="brand.mobiles.length" class="col-8">
                <h4>{{brand.name}}</h4>
                <ul class="list-unstyled">
                    <li class="li-item" v-for="mobile in brand.mobiles">
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
        </div>
        <div class="col"></div>

        <div class="row" v-if="!filtered_brands.length" style="padding-top: 20px">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="alert alert-info"><i class="fa fa-exclamation-circle"></i>
                    <strong>No Mobiles found !</strong>
                </div>
            </div>
            <div class="col-2"></div>
        </div>

    </div>
</template>

<script>
    export default {
        name: "mobile-prices",
        props: ['brands'],
        data() {
            return {
                search: '',
                data: [],
            }
        },
        computed: {
            filtered_brands() {
                let data = [];
                if (this.search) {
                    for (var brand = 0; brand < this.brands.length; brand++) {
                        var mobiles = this.brands[brand].mobiles
                        for (var mobile = 0; mobile < mobiles.length; mobile++) {
                            let mobile_price = parseFloat(this.brands[brand].mobiles[mobile].main_price_description);
                            if (mobile_price == parseFloat(this.search)
                                || mobile_price <= (parseFloat(this.search) - 600)) {
                                if (data.length) {
                                    data.forEach((item) => {
                                        console.log(item.name, this.brands[brand].name)
                                        if (item.name === this.brands[brand].name) {
                                            item["mobiles"].push(this.brands[brand].mobiles[mobile])
                                        } else {
                                            data.push({
                                                'name': this.brands[brand].name,
                                                'image_path': this.brands[brand].image_path,
                                                'main_price_description': this.brands[brand].image_path,
                                                'mobiles': [this.brands[brand].mobiles[mobile]],
                                            });
                                        }
                                    })
                                } else {
                                    data.push({
                                        'name': this.brands[brand].name,
                                        'image_path': this.brands[brand].image_path,
                                        'main_price_description': this.brands[brand].image_path,
                                        'mobiles': [this.brands[brand].mobiles[mobile]],
                                    });
                                }
                            }
                        }
                    }
                    return data;
                } else {
                    return this.brands
                }
            }
        },
        created() {
            this.data = this.brands
        }
    }
</script>

<style scoped>
    .li-item {
        float: left;
        height: 215px;
        position: relative;
        text-align: center;
        width: 143px;
        margin: 0 0 10px;
        padding-top: 0;
    }

    .li-item a {
        display: block;
        text-align: center;
        width: 100%;
    }

    .li-item a img {
        display: block;
        padding-top: 5px;
        padding-bottom: 5px;
        margin: 0 auto;

    }

    .li-item a aside {
        clear: both;
        display: block;
        font: 700 14px Arimo, Arial, sans-serif;
        margin: 0 auto;
        padding: 15px 5px;
        background: hsla(0, 0%, 96%, .4);
        text-decoration: none;
        color: #777;
        position: absolute;
        width: 100%;
    }

    a {
        border: 1px #f8fafc solid;

    }

    a:hover {
        border: 1px #1b998b solid;
    }

    a:hover aside {
        background-color: #1b998b !important;
    }

    a:hover aside strong {
        color: white !important;
    }

    a:hover aside p {
        color: #feffc9 !important;
    }

</style>