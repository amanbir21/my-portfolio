import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import tailwindcss from '@tailwindcss/vite'; // <--- 1. ADD THIS

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        vue(),
        tailwindcss(), // <--- 2. ADD THIS
    ],
     server: {
    proxy: {
      '/api': 'http://127.0.0.1:8000'
    }
  }
});

