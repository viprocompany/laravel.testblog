/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');
//подключу нужные библиотеки минуя './bootstrap', взяв код из самого файла ./bootstrap.js:
window._ = require('lodash');
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


window.Vue = require('vue').default;

//импортируем данные для работы Vue компонентов с подключением к библиотеке Vue из папки store файла index.js, данный параметр прописываем в объекте const app = new Vue
import store from './store'

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//РЕГИСТРАЦИЯ КОМПОНЕНТОВ:
Vue.component('example-component', require('./components/ExampleComponent.vue').default);


Vue.component('article-component', require('./components/ArticleComponent.vue').default);
// Vue.component('views-component', require('./components/ViewsComponent.vue').default);
// Vue.component('likes-component', require('./components/LikesComponent.vue').default);
// Vue.component('comments-component', require('./components/CommentsComponent.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    store,
    el: '#app',
});
