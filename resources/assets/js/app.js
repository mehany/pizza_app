
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

Vue.component('menu', require('./components/Menu.vue'));
Vue.component('pizza', require('./components/Pizza.vue'));
Vue.component('toppings', require('./components/Toppings.vue'));
Vue.component('order', require('./components/Order.vue'));

const app = new Vue({ 
    el: 'body'
});

