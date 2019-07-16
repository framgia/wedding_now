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
            new WebpackShellPlugin({onBuildStart: ['php artisan lang:js --quiet'], onBuildEnd: []})
        ]
});

mix.copyDirectory('resources/asset/user/fonts', 'public/asset/user/fonts');
mix.copyDirectory('node_modules/font-awesome/fonts', 'public/asset/user/fonts');
mix.copyDirectory('node_modules/font-awesome/css/font-awesome.min.css', 'public/asset/user/css/fontawesome.css');
mix.copyDirectory('resources/asset/medias/', 'public/storage/');
mix.copyDirectory('node_modules/jquery-ui/themes/base/images/', 'public/asset/user/css/images');

mix.styles([
    'resources/asset/user/css/font-google.css',
    'node_modules/bootstrap/dist/css/bootstrap.min.css',
    'node_modules/owl.carousel/dist/asset/owl.carousel.css',
    'node_modules/js-datepicker/dist/datepicker.min.css',
    'node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css',
    'node_modules/wow.js/css/libs/animate.css',
    'resources/asset/user/css/flaticon.css',
    'resources/asset/user/css/layers.css',
    'resources/asset/user/css/magnific-popup.css',
    'resources/asset/user/css/menumaker.css',
    'resources/asset/user/css/settings.css',
    'resources/asset/user/css/share-tooltip.css',
    'resources/asset/user/css/stucture.css',
    'resources/asset/user/css/style.css',
    'resources/asset/user/css/custom.css',
    'node_modules/toastr/build/toastr.min.css',
    'resources/asset/user/css/to-do-list.css',
    'resources/asset/user/css/schedule-info.css',
    'resources/asset/user/css/suggest-page.css',
    'resources/asset/user/css/timeline.css',
    'resources/asset/user/css/real_wedding.css',
    'node_modules/print-js/dist/print.css',
    'resources/asset/user/css/news.css',
    'node_modules/jquery-ui/themes/base/theme.css',
    'node_modules/jquery-ui/themes/base/datepicker.css',
    'resources/asset/user/css/couple-info.css',
    'resources/asset/user/css/index.css',
], 'public/asset/user/css/page.css')
    .copyDirectory('node_modules/ckeditor-full', 'public/asset/ckeditor')
    .scripts([
        'node_modules/jquery/dist/jquery.min.js',
        'node_modules/bootstrap/dist/js/bootstrap.min.js',
        'node_modules/ajaxchimp/jquery.ajaxchimp.min.js',
        'node_modules/magnific-popup/dist/jquery.magnific-popup.min.js',
        'node_modules/waypoints/lib/jquery.waypoints.min.js',
        'node_modules/jquery.counterup/jquery.counterup.min.js',
        'node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
        'node_modules/toastr/build/toastr.min.js',
        'node_modules/wow.js/dist/wow.min.js',
        'node_modules/autosize/dist/autosize.min.js',
        'node_modules/displacejs/dist/displace.min.js',
        'node_modules/dom-to-image/dist/dom-to-image.min.js',
        'node_modules/file-saver/dist/FileSaver.min.js',
        'node_modules/jquery-datepicker/jquery-datepicker.js',
        'node_modules/sweetalert/dist/sweetalert.min.js',
        'public/asset/ckeditor/ckeditor.js',
        'public/asset/ckeditor/adapters/jquery.js',
        'resources/asset/user/js/custom/base.js',
        'resources/asset/user/js/custom/post.js',
        'resources/asset/user/js/custom/schedule_info.js',
        'resources/asset/user/js/custom/real_wedding.js',
        // 'resources/asset/user/js/custom/comment.js',
    ], 'public/asset/user/js/page.js');

/**
 * Mix for design card
 */

mix.styles([
    'node_modules/bootstrap/dist/css/bootstrap.min.css',
    'resources/asset/user/design_card/css/style.min.css',
    'node_modules/toastr/build/toastr.min.css',
    'node_modules/animate.css/animate.min.css',
    'resources/asset/user/design_card/css/design_card.css',
], 'public/css/design_card/design_card.css')
    .scripts([
        'node_modules/jquery/dist/jquery.min.js',
        'node_modules/bootstrap/dist/js/bootstrap.min.js',
        'node_modules/toastr/build/toastr.min.js',
        'node_modules/wow.js/dist/wow.min.js',
        'node_modules/displacejs/dist/displace.min.js',
        'node_modules/autosize/dist/autosize.min.js',
        'resources/asset/client/design_card/js/jquery.bpopup.min.js',
        'resources/asset/user/design_card/js/design_card.js',
    ], 'public/js/design_card/design_card.js');

/**
 * mix js admin
 */

mix.js([
    'node_modules/sweetalert/dist/sweetalert.min.js',
    'node_modules/toastr/build/toastr.min.js',
    'resources/asset/admin/customs/js/post.js',
    'resources/asset/admin/customs/js/user.js',
    'resources/asset/admin/customs/js/role.js',
    'resources/asset/admin/customs/js/schedule_default.js',
], 'public/asset/admin/js/app.js')
    .styles([
        'resources/asset/admin/customs/css/admin.css',
        'resources/asset/admin/customs/css/admin_custom.css',
        'resources/asset/admin/customs/css/post.css',
        'resources/asset/admin/customs/css/user.css',
        'resources/asset/admin/customs/css/schedule.css',
    ], 'public/asset/admin/css/app.css')
    .copy('resources/asset/admin/app/css/style.bundle.css', 'public/asset/admin/css/style.bundle.css')
    .copy('resources/asset/admin/app/css/vendors.bundle.css', 'public/asset/admin/css/vendors.bundle.css')
    .copy('resources/asset/admin/app/js/scripts.bundle.js', 'public/asset/admin/js/scripts.bundle.js')
    .copy('resources/asset/admin/app/js/vendors.bundle.js', 'public/asset/admin/js/vendors.bundle.js')
    .copy('resources/asset/admin/app/js/ajax_googleapis_webfont.js', 'public/asset/admin/js/ajax_googleapis_webfont.js')
    .copyDirectory('resources/asset/admin/app/fonts', 'public/asset/admin/fonts')
    .copyDirectory('resources/asset/admin/app/images', 'public/asset/admin/images');


/**
 * mix auth css
 */

mix.styles([
    'resources/asset/auth/auth.css',
], 'public/asset/auth/auth.css')
    .scripts([
        'node_modules/sweetalert/dist/sweetalert.min.js',
        'resources/asset/auth/auth.js',
    ], 'public/asset/auth/auth.js');
