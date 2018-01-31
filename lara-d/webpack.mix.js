let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js')
    .scripts([
        'resources/assets/material-js/bootstrap.min.js',
        'resources/assets/material-js/jquery-3.2.1.min.js',
        'resources/assets/material-js/jquery.nice-select.min.js',
        'resources/assets/material-js/magicsuggest-min-repair.js',
        'resources/assets/material-js/mdb.min.js',
        'resources/assets/material-js/popper.min.js',
        'resources/assets/material-js/prism.js',
    ], 'public/js/material.js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .styles([
    'resources/assets/css/bootstrap.min.css',
    'resources/assets/css/mdb.min.css',
    'resources/assets/css/nice-select.css',
    'public/css/vendor/style-nice.css'
    ], 'public/css/material.css');