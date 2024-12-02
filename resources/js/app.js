require('./bootstrap');
import { createApp, h } from 'vue';
import { InertiaApp } from '@inertiajs/inertia-vue3';
import { Head, Link } from '@inertiajs/vue3';
import wrapper from './Layouts/Wrapper.vue';
import '../css/app.css';
import { Inertia } from '@inertiajs/inertia';
import { ZiggyVue } from 'ziggy-js';

const app = createApp({
  render: () =>
    h(InertiaApp, {
      initialPage: JSON.parse(document.getElementById('app').dataset.page),
      resolveComponent: (name) => {
        return import(`./Pages/${name}`).then((module) => module.default);
      },
    }),
});

app.component('wrapper', wrapper);
app.component('Head', Head);
app.component('Link', Link);
app.use(ZiggyVue);
app.config.globalProperties.$route = Inertia.route;
app.mount('#app');
