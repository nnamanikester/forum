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

// mix.js([
//
//     'resources/js/app.js',
//
// ], 'public/js');

// mix.js([
//
//     'resources/js/bundle.js'
//
// ], 'public/js/libs.js');


mix.js([


    'resources/js/all.min.js',
    'resources/js/bootstrap.min.js',
    'resources/js/Chart.min.js',
    'resources/js/jquery.easing.min.js',
    'resources/js/jquery.min.js',
    'resources/js/sb-admin.min.js'

], 'public/js/admin.js');


mix.styles([

    'resources/css/style.css'

], 'public/css/libs.css');


mix.styles([

    'resources/css/all.min.css',
    'resources/css/dataTables.bootstrap4.css',
    'resources/css/sb-admin.min.css'

], 'public/css/admin.css');


mix.copyDirectory('node_modules/tinymce/plugins', 'public/tinymce/plugins');
mix.copyDirectory('node_modules/tinymce/skins', 'public/tinymce/skins');
mix.copyDirectory('node_modules/tinymce/themes', 'public/tinymce/themes');
mix.copy('node_modules/tinymce/jquery.tinymce.js', 'public/tinymce/jquery.tinymce.js');
mix.copy('node_modules/tinymce/jquery.tinymce.min.js', 'public/tinymce/jquery.tinymce.min.js');
mix.copy('node_modules/tinymce/tinymce.js', 'public/tinymce/tinymce.js');
mix.copy('node_modules/tinymce/tinymce.min.js', 'public/tinymce/tinymce.min.js');
mix.copy('resources/js/bundle.js', 'public/js/bundle.js');




