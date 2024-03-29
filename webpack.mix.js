const mix = require('laravel-mix');

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

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css');

mix.styles([
    'public/css/bootstrap.min.css',
    'public/css/custom.css',
    ], 'public/css/all.css');
    
    mix.scripts([
    'public/js/jquery-3.3.1.min.js',
    'public/js/jquery-ui.js',
    'public/js/bootstrap.min.js',
    'public/js/app.js',
    ], 'public/js/all.js');
