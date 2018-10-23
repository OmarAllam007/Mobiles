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

        <div class="row" v-for="(brand,key) in filtered_brands" v-if="brand.mobiles.length" style="padding-top: 10px">
            <div v-if="brand.mobiles.length" class="col-md-12">
                <h4>{{brand.name}}</h4>
                <ul class="list-unstyled">
                    <li class="li-item hvr-glow li-item-card" v-for="mobile in brand.mobiles">
                        <a :href="mobile.show_url">
                            <img :src="mobile.image" style="width: 100px;height: 147px">
                            <aside>
                                <strong> {{mobile.name}}</strong>
                                <h5 >
                                   <span class="badge badge-danger" style="background-color:#0077aa !important"> {{mobile.main_price_description
                                    ?mobile.main_price_description.toLocaleString(): ''}} </span>
                                </h5>
                            </aside>

                        </a>
                    </li>
                </ul>
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