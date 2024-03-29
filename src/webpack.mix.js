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
    .vue()
    .js('resources/js/echoReport.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css')
    .postCss('resources/css/blog.css', 'public/css')
    .postCss('resources/css/bootstrap.min.css', 'public/css')
    .sourceMaps().version();
