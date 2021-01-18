/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

//Vue.component('portada-component', require('./components/PortadaComponent.vue').default);
//Vue.component('listado-recetas-component', require('./components/receta/ListadoRecetasComponent.vue').default);
//Vue.component('lista-receta-component', require('./components/receta/ListaRecetaComponent.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//var autocomplete = require('./components/autocomplete.vue');

//Vue.component('autocompletado',require('./components/autocomplete.vue').default);

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => {
    const name = _.last(key.split('/')).split('.')[0]
    return Vue.component(name, files(key))
})

const app = new Vue({
    el: '#app',
});

