<template>
    <div>
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="form-group">
                    <input type="text" v-model="search" class="form-control searchByPrice"
                           style="border:none;border-bottom: 1px solid #1b998b;background: transparent"
                           :placeholder="t['Search with price']">
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

        <div class="row" v-for="(brand,key) in filtered_brands" v-if="brand.mobiles.length" style="padding-top: 10px">
            <div v-if="brand.mobiles.length" class="col-md-12">
                <h4>{{brand.name}}</h4>
                <div class="row justify-content-md-start">
                        <div class="col-md-2 hvr-glow li-item-card-2 text-center"  v-for="mobile in brand.mobiles">
                            <a :href="mobile.show_url" style="text-decoration: none; margin: auto;padding: auto" >
                                <img :src="mobile.image" style="width: 100px;height: 147px">
                                <aside>
                                    <strong> {{mobile.name}}</strong>
                                    <p>
                                   <span class="badge badge-danger" style="font-size: 10pt;background-color:#0077aa !important"> {{mobile.main_price_description
                                    ?mobile.main_price_description.toLocaleString()+' $': ''}}  </span>
                                    </p>
                                </aside>

                            </a>
                        </div>
                </div>

            </div>
        </div>


        <div class="row" v-if="!filtered_brands.length" style="padding-top: 20px">
            <div class="col-md-12">
                <div class="alert alert-info"><i class="fa fa-exclamation-circle"></i>
                    <strong>{{t['No Mobiles found']}} !</strong>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: "mobile-prices",
        props: ['brands', 't'],
        data() {
            return {
                search: '',
                data: [],
            }
        },
        computed: {
            filtered_brands() {
                let from = parseFloat(this.search);
                let to = parseFloat(from + 200);
                if (this.search) {
                    let data = [];
                    this.brands.forEach((bitem, bindex) => {
                        if (!data[bindex]) {
                            data[bindex] = [];
                            data[bindex]['name'] = bitem.name
                            data[bindex]['mobiles'] = []

                            bitem.mobiles.forEach((mitem, mindex) => {
                                if ((parseFloat(mitem.main_price_description) >= from && parseFloat(mitem.main_price_description) <= to)) {
                                    if (!data[bindex]['mobiles'][mindex]) {
                                        data[bindex]['mobiles'].push(mitem)
                                    }
                                }
                            });
                        }

                    });
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