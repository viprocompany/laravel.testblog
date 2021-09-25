import Vue from 'vue'
import Vuex from 'vuex'
// подключили библиотеки vue  vuex

// import * as article from './modules/article.js'

// Vue.use(Vuex) - дает команду для Vue использовать библиотеку Vuex
Vue.use(Vuex)

export default new Vuex.Store({
    modules: {
        // article
    },
// хранилище состояния
    state: {
        // slug: '',
    },
// методы для запуска асинхронного кода, например для переменных
    actions: {

    },
//для вычисляемых свойств
    getters: {
        // articleSlugRevers(state) {
        //     return state.slug.split('').reverse().join('');
        // },
    },
// сеттеры, для заждачи новых свойств
    mutations: {
        // SET_SLUG(state, payload) {
        //     state.slug = payload;
        // }
    }
})

