import Vue from 'vue';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';
import VueI18n from 'vue-i18n';
import VInputmask from 'v-inputmask';
import VueMoment from 'vue-moment';
import store from './store';
import router from './router';
import App from './components/app.vue';
import CommonInitializer from './common-initializer';



Vue.use(VInputmask);
Vue.use(VueMoment);
Vue.use(VueI18n);
const i18n = new VueI18n({
    locale: window.lang || 'ru',
    });

CommonInitializer.init({ store, router });
Vue.use(BootstrapVue);
Vue.use(IconsPlugin);

function dfs() {
    console.log('hi')
}
dfs()

const app = new Vue({
    render: h => h(App),
    router,
    store
});

store.dispatch('INITIALIZE').then(() => {
    app.$mount('#app');
});

