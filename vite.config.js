import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/vendor/bootstrap/css/bootstrap.min.css', 'resources/vendor/bootstrap-icons/bootstrap-icons.css', 'resources/vendor/boxicons/css/boxicons.min.css', 'resources/vendor/remixicon/remixicon.css', 'resources/vendor/simple-datatables/style.css', 'resources/js/app.js', 'resources/vendor/bootstrap/js/bootstrap.bundle.min.js', 'resources/vendor/simple-datatables/simple-datatables.js'],
            refresh: true,
        }),
    ],
});
