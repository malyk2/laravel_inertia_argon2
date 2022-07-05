import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'
export default defineConfig({
  server: {
    host: '0.0.0.0',
    hmr: {
      host: 'localhost',
      // overlay: false,
    },
  },
  plugins: [
    laravel([
      'resources/scss/argon-dashboard.scss',
      'resources/js/app.js',
    ]),
    vue(),
  ],
  resolve: {
    alias: {
      '@': '/resources/js'
    }
  }
});
