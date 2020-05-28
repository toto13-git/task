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

mix.js('resources/js/app.js', 'public/js')
  .js('resources/js/assets/alert.js', 'public/js')
  .sass('resources/sass/app.scss', 'public/css')
  .sass('resources/sass/item_create_edit.scss', 'public/css')
  .sass('resources/sass/item_show.scss', 'public/css')
  .sass('resources/sass/user_show.scss', 'public/css');