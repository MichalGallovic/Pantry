import Vue from 'vue';
import VueRouter from 'vue-router';
import PortalVue from 'portal-vue';
import routes from './routes';
import App from './components/App';
import bootstrap from './bootstrap';

Vue.use(VueRouter);
Vue.use(PortalVue);

const app = () => {
    new Vue({
        el: '#app',
        router: new VueRouter(routes),
        render: (createElement) => createElement(App)
    });
};

bootstrap().then(() => app());
