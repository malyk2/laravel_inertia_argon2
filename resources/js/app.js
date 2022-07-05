import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import store from './store'
import Panel from './Layouts/Admin/Panel.vue'

createInertiaApp({
  resolve: name => {
    // const page = require(`./Pages/${name}`).default;
    const page = resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue'));
    if (page.layout === undefined) {
      page.layout = Panel
    }
    return page
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(store)
      .use(plugin)
      .mount(el)
  },
})
