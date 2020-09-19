import Vue from 'vue';
import App from '../pages/home';
new Vue({
    render(h) {
        return h(App);
    },
}).$mount('#app');