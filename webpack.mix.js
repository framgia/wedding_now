const mix = require('laravel-mix');
const WebpackShellPlugin = require('webpack-shell-plugin');

// Add shell command plugin configured to create JavaScript language file

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
 /**
    Mix language js
 **/
mix.webpackConfig({
    plugins:
    [
        new WebpackShellPlugin({onBuildStart:['php artisan lang:js --quiet'], onBuildEnd:[]})
    ]
});

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css')
//     .styles('resources/assets/customs/admin_custom.css', 'public/css/app.css');

mix.copyDirectory('resources/client/revolution', 'public/assets/user/revolution');
mix.copyDirectory('resources/client/js', 'public/assets/user/js');
mix.styles('resources/assets/customs/admin_custom.css', 'public/css/app.css');
mix.styles('resources/assets/customs/css/login.css', 'public/css/login.css');
mix.copyDirectory('resources/assets/customs/admin.css', 'public/css/admin/admin.css');

mix.copyDirectory('resources/assets', 'public/assets');
// mix.copyDirectory('resources/client/revolution', 'public/assets/user/revolution');
mix.copyDirectory('resources/client/fonts', 'public/assets/user/fonts');
mix.copyDirectory('node_modules/font-awesome/fonts', 'public/assets/user/fonts');
mix.copyDirectory('node_modules/font-awesome/css/font-awesome.min.css', 'public/assets/user/css/fontawesome.css');
mix.copyDirectory('resources/images/', 'public/storage/');
mix.copyDirectory('node_modules/jquery-ui/themes/base/images/', 'public/assets/user/css/images');

mix.styles([
    'resources/client/css/font-google.css',
    'node_modules/bootstrap/dist/css/bootstrap.min.css',
    'node_modules/owl.carousel/dist/assets/owl.carousel.css',
    'node_modules/js-datepicker/dist/datepicker.min.css',
    'node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css',
    'node_modules/wow.js/css/libs/animate.css',
    'resources/client/css/flaticon.css',
    'resources/client/css/layers.css',
    'resources/client/css/magnific-popup.css',
    'resources/client/css/menumaker.css',
    'resources/client/css/settings.css',
    'resources/client/css/share-tooltip.css',
    'resources/client/css/stucture.css',
    'resources/client/css/style.css',
    'resources/client/css/custom.css',
    'node_modules/toastr/build/toastr.min.css',
    'resources/client/css/to-do-list.css',
    'resources/client/css/schedule-info.css',
    'resources/client/css/suggest-page.css',
    'resources/client/css/timeline.css',
    'resources/client/css/real_wedding.css',
    'resources/client/css/design-card.css',
    'node_modules/print-js/dist/print.css',
    'resources/client/css/news.css',
    'node_modules/jquery-ui/themes/base/theme.css',
    'node_modules/jquery-ui/themes/base/datepicker.css',
], 'public/assets/user/css/page.css');

mix.scripts([
    'node_modules/jquery/dist/jquery.min.js',
    'node_modules/bootstrap/dist/js/bootstrap.min.js',
    'node_modules/ajaxchimp/jquery.ajaxchimp.min.js',
    'node_modules/magnific-popup/dist/jquery.magnific-popup.min.js',
    'node_modules/waypoints/lib/jquery.waypoints.min.js',
    'node_modules/jquery.counterup/jquery.counterup.min.js',
    'node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
    'node_modules/toastr/build/toastr.min.js',
    'node_modules/wow.js/dist/wow.min.js',
    'resources/client/js/custom.js',
    'node_modules/displacejs/dist/displace.min.js',
    'node_modules/dom-to-image/dist/dom-to-image.min.js',
    'node_modules/file-saver/dist/FileSaver.min.js',
    'node_modules/jquery-datepicker/jquery-datepicker.js',
    'node_modules/sweetalert/dist/sweetalert.min.js'
    ], 'public/assets/user/js/page.js');

//mix js admin
mix.scripts([
    'resources/assets/customs/admin.js',
    ], 'public/js/app_admin.js');

mix.scripts('resources/assets/customs/js/admin/role/index.js', 'public/js/admin/role/index.js');
mix.scripts('resources/assets/customs/js/admin/user/profile.js', 'public/js/admin/user/profile.js');
mix.scripts('resources/assets/customs/js/admin/user/user.js', 'public/js/admin/user/user.js');
mix.scripts('resources/assets/customs/js/login.js', 'public/js/login.js');
