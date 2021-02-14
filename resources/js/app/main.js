import Vue from 'vue';
import Vuetify from 'vuetify';
import Routes from './routes.js';
import Layout from './layouts/Layout.vue';
import 'vuetify/dist/vuetify.min.css';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import _ from 'lodash';
import vuetify from './vuetify.js'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.use(BootstrapVue)
Vue.use(IconsPlugin)
Vue.use(Vuetify);

const app = new Vue({
    el: '#app',
    vuetify,
    router: Routes,
    components: { Layout },
})




export default new Vuetify(app);