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

mix.js('resources/js/agenda_dash.js', 'public/js')
   .js('resources/js/agenda.js', 'public/js')
   .sass('resources/sass/agenda.scss', 'public/css')
   .sass('resources/sass/agenda_dash.scss', 'public/css')
   .sass('resources/sass/term.scss', 'public/css');
