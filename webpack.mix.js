const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .webpackConfig({
      resolve: {
        alias: {
          '@': __dirname + '/resources/js',
        },
      }
    })
    .sass('resources/scss/argon-dashboard.scss', 'public/css/app.css');
    // .postCss('resources/css/app.css', 'public/css', [
    //     //
    // ]);
