import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import Admin from './Layouts/Admin.vue'

createInertiaApp({
  resolve: name => {
    const page = require(`./Pages/${name}`).default;
    page.layout = page.layout || Admin;
    return page
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .mount(el)
  },
})
