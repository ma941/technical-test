require('./bootstrap');
import { createApp, h } from 'vue';
import { InertiaApp } from '@inertiajs/inertia-vue3';
import wrapper from './Layouts/Wrapper.vue';
import '../css/app.css';

const app = createApp({
  render: () =>
    h(InertiaApp, {
      initialPage: JSON.parse(document.getElementById('app').dataset.page),
      resolveComponent: (name) => import(`./Pages/${name}`).then((module) => module.default),
    }),
});

app.component('wrapper', wrapper);
app.mount('#app');
