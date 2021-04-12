import Vue       from 'vue'
require('./bootstrap');

import ElementUI from 'element-ui';
Vue.use(ElementUI);

import Component from './components/ExampleComponent'

 new Vue({
    el: '#app',
    components:{
        Component
    }
});
