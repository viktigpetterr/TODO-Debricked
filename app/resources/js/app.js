import Vue from 'vue';
import Vuex from 'vuex'
import App from './App.vue'
//import VueRouter from 'vue-router';
import 'quasar/dist/quasar.umd.min.js'
import 'quasar/dist/quasar.min.css'
import axios from 'axios'
//Vue.use(VueRouter);

//const Foo = App
//const Bar = {template: '<div>bar</div>'}
/**
 const router = new VueRouter({
    mode: 'history',
    base: '/',
    routes: [
        {path: '/foo', component: Foo},
        {path: '/bar', component: Bar}
    ]
});

 new Vue({
    router,
    components: {
        'app': App,
    }
}).$mount('#app');
 */
Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
        categoryId: 1,
        categoryName: "Private"
    },
    mutations: {
        changeCategory (state, category) {
            state.categoryId = category.id
            state.categoryName = category.name
        }
    },
    getters: {
        categoryId: state => {
            return state.categoryId
        },
        categoryName: state => {
            return state.categoryName
        }
    },
})

Vue.use({
    install (Vue) {
        Vue.prototype.$api = axios.create({
            baseURL: 'http://127.0.0.1/api/',
        })
    }
})

new Vue({
    el: '#app',
    store: store,
    components: {
        'app': App,
    }
})

