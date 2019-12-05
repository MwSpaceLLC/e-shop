import Vue from 'vue';
import axios from 'axios';
import Buefy from 'buefy'
import 'buefy/dist/buefy.css'
import App from './App.vue'
import router from './routes'
import i18n from './i18n'

/**
 * @type {*|lodash} */
window._ = require('lodash');

/**
 * Set Csrf Protection */
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

/**
 * @type {AxiosStatic} */
Vue.prototype.$http = axios;

/**
 * Beautiful Ui for Vuejs */
Vue.use(Buefy);

/**
 * Uncomment below when compiling to production */
Vue.config.productionTip = false;
// Vue.config.devtools = false
// Vue.config.debug = false
// Vue.config.silent = true

/**
 * Create Pure VueJs Instance */
new Vue({
    i18n,
    router,
    render: h => h(App)
}).$mount('#e-shop');
