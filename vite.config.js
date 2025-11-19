import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],

    // to decrease the redundancy of calling the data
    optimizeDeps : {
        include: ['axios, alpinejs']
    },
    server: {
        watch: {
            usePolling : false,
        }
    },
    cacheDir: 'node_modules/.vite'
});
