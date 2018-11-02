
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import Ads from 'vue-google-adsense'
//
Vue.use(require('vue-script2'))
//
Vue.use(Ads.Adsense)
Vue.use(Ads.InArticleAdsense)
Vue.use(Ads.InFeedAdsense)

var token = document.head.querySelector('meta[name="csrf-token"]');
window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('compare', require('./components/CompareComponent.vue'));
Vue.component('search-mobile', require('./components/SearchMobileComponent.vue'));
Vue.component('mobile-prices', require('./components/MobilePricesComponent.vue'));
Vue.component('choose-for-me', require('./components/ChooseForMeComponent.vue'));
Vue.component('like-component', require('./components/LikeComponent.vue'));
Vue.component('comments', require('./components/CommentsComponent.vue'));
// Vue.component('gallery-component', require('./components/GalleryComponent.vue'));
// Vue.component('ad-component', require('./components/AdComponent.vue'));



const app = new Vue({
    el: '#app',
});

const header = new Vue({
    el: '#header',
});
