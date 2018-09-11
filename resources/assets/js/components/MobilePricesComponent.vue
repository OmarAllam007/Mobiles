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

        <div class="row" v-for="(brand,key) in filtered_brands" style="padding-top: 20px">
            <div class="col-2"></div>
            <div v-if="brand.mobiles.length" class="col-8">
                <h4>{{brand.name}}</h4>
                <div class="div" v-for="mobile in brand.mobiles"
                     style="display: inline-block;width: 32%;height: 120px;">
                    <img :src="mobile.image_path" style="float: left;max-width: 35%">
                    <div style="padding-left:5px;padding-top: 20px;width: 60%;padding-right: 2px;float: left">
                        <a :href="mobile.show_url">{{mobile.name}}</a>
                        <p style="margin: 0">{{mobile.main_price_description
                            ?mobile.main_price_description.toLocaleString(): ''}}</p>
                    </div>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
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
                            if (parseFloat(this.brands[brand].mobiles[mobile].main_price_description) == parseFloat(this.search)) {
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

</style>