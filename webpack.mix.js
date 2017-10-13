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

mix
    .disableNotifications()
    .js('resources/assets/js/app.js', 'public/js')
    .js('bower_components/bootstrap/dist/js/bootstrap.js', 'public/js')
    .js('bower_components/jquery/dist/jquery.js', 'public/js')
    .styles(['bower_components/bootstrap/dist/css/bootstrap.min.css'], 'public/css/bootstrap.min.css')
    .sass('resources/assets/sass/app.scss', 'public/css');
