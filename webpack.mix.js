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

mix.js('resources/js/app.js', 'public/js').vue().sass('resources/sass/app.scss', 'public/css');
mix.js('resources/js/jquery.js', 'public/js').vue();
mix.js('resources/js/nicepage.js', 'public/js').vue();
mix.css('resources/css/Home.css', 'public/css').vue();
mix.css('resources/css/nicepage.css', 'public/css').vue();
mix.css('resources/css/style.css', 'public/css').vue();
