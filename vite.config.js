import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css',
                    'resources/js/app.js',
                'resources/AdminLTE/plugins/fontawesome-free/css/all.min.css',
            'resources/AdminLTE/dist/css/adminlte.min.css',
            'resources/AdminLTE/plugins/jquery/jquery.min.js',
            'resources/AdminLTE/plugins/bootstrap/js/bootstrap.min.js',
            'resources/AdminLTE/dist/js/adminlte.min.js',
            'resources/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css',
            'resources/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js',
            'resources/AdminLTE/plugins/uplot/uPlot.iife.min.js',
            'resources/AdminLTE/plugins/uplot/uPlot.min.css',
            'resources/AdminLTE/plugins/daterangepicker/daterangepicker.css',
            'resources/AdminLTE/plugins/daterangepicker/daterangepicker.js',

            ],
            refresh: true,
        }),
    ],
});
