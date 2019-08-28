const {
    mix
} = require('laravel-mix');

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

mix.combine([
    'resources/assets/bootstrap/css/bootstrap.min.css',
    'resources/assets/dist/css/AdminLTE.min.css',
    'resources/assets/plugins/iCheck/square/blue.css',
    'resources/assets/plugins/iCheck/minimal/red.css',
    'resources/assets/dist/css/skins/_all-skins.min.css',
    'resources/assets/plugins/timepicker/bootstrap-timepicker.min.css',
    'resources/assets/plugins/datepicker/datepicker3.css',
    'resources/assets/plugins/daterangepicker/daterangepicker.css',
    'resources/assets/plugins/jQuery-File-Upload-9.18.0/css/jquery.fileupload-ui.css',
    'resources/assets/plugins/jQuery-File-Upload-9.18.0/css/jquery.fileupload.css',
    'resources/assets/plugins/sweetalert/sweetalert.css',
    'resources/assets/plugins/select2/select2.min.css',
    'resources/assets/css/app.css',
], 'public/css/app.css');

mix.combine([
    'resources/assets/email/app.css',
], 'public/css/email.css');

mix.combine([
    'resources/assets/bootstrap/css/bootstrap.css',
    'resources/assets/plugins/sweetalert/sweetalert.css',
    'resources/assets/css/checkout.css',
], 'public/css/checkout.css');

mix.combine([
    'resources/assets/plugins/jQuery/jquery-2.2.3.min.js',
    'resources/assets/bootstrap/js/bootstrap.min.js',
    'resources/assets/plugins/slimScroll/jquery.slimscroll.min.js',
    'resources/assets/plugins/datepicker/bootstrap-datepicker.js',
    'resources/assets/plugins/timepicker/bootstrap-timepicker.min.js',
    'resources/assets/plugins/iCheck/icheck.min.js',
    'resources/assets/plugins/chartjs/Chart.js',
    'resources/assets/plugins/moment.min.js',
    'resources/assets/plugins/daterangepicker/daterangepicker.js',
    'resources/assets/plugins/jQuery-File-Upload-9.18.0/js/vendor/jquery.ui.widget.js',
    'resources/assets/plugins/jQuery-File-Upload-9.18.0/js/jquery.iframe-transport.js',
    'resources/assets/plugins/jQuery-File-Upload-9.18.0/js/jquery.fileupload.js',
    'resources/assets/dist/js/app.js',
    'resources/assets/plugins/pusher.min.js',
    'resources/assets/plugins/sweetalert/sweetalert.min.js',
    'resources/assets/plugins/select2/select2.full.min.js',
    'resources/assets/js/app.js',
    'resources/assets/js/bootstrap.js',
], 'public/js/app.js');

mix.combine([
    'resources/assets/plugins/jQuery/jquery-2.2.3.min.js',
    'resources/assets/plugins/sweetalert/sweetalert.min.js',
    'resources/assets/js/checkout.js',
], 'public/js/checkout.js');

mix.combine([
    'resources/assets/website/css/animate.css',
    'resources/assets/website/css/bootstrap.min.css',
    'resources/assets/website/css/font-awesome.min.css',
    'resources/assets/plugins/sweetalert/sweetalert.css',
    'resources/assets/website/css/styles.css',
], 'public/css/website.css').version();

mix.combine([
    'resources/assets/website/js/jquery.min.js',
    'resources/assets/website/js/bootstrap.min.js',
    'resources/assets/website/js/particles.min.js',
    'resources/assets/website/js/wow.min.js',
    'resources/assets/plugins/sweetalert/sweetalert.min.js',
    'resources/assets/website/js/script.js',
], 'public/js/website.js').version();