require('./bootstrap');
import { createApp, h } from 'vue';
import { Head, Link, createInertiaApp } from '@inertiajs/vue3';
import wrapper from './Layouts/Wrapper.vue';
import '../css/app.css';
import { ZiggyVue } from 'ziggy-js';
import heading from './Components/PageHeading.vue';

const appName = window.document.getElementsByTagName("title")[0]?.innerText || "Mohsin Ali - Technical";

createInertiaApp({
  title: (title) => `${title} - ${appName}`,
  resolve: (name) => require(`./Pages/${name}.vue`),
  progress: {
      delay: 0,
      color: "#ef4444"
  },
  setup({ el, App, props, plugin }) {
      const mohsinTechnical = createApp({ render: () => h(App, props) })
          .use(plugin)
          .use(ZiggyVue)
          .mixin({
              methods: {
                  route,
                  feature: (name) => props.initialPage.props.auth.features[name]
              },
              components: {
                  Head,
                  Link,
                  wrapper,
                  heading
              },
          });

      mohsinTechnical.mount(el);

      return mohsinTechnical;
  },
});
