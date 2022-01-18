const mix = require('laravel-mix');
const lodash = require("lodash");
const WebpackRTLPlugin = require('webpack-rtl-plugin');
const folder = {
    src: "resources/", // source files
    dist: "public/", // build files
    dist_assets: "public/assets/" //build assets files
};

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

    var third_party_assets = {
        css_js: [
            {"name": "jquery", "assets": ["./node_modules/jquery/dist/jquery.min.js"]},
            {"name": "bootstrap", "assets": ["./node_modules/bootstrap/dist/js/bootstrap.bundle.js"]},
            {"name": "metismenu", "assets": ["./node_modules/metismenu/dist/metisMenu.js"]},
            {"name": "simplebar", "assets": ["./node_modules/simplebar/dist/simplebar.js"]},
            {"name": "node-waves", "assets": ["./node_modules/node-waves/dist/waves.js"]},
            {"name": "select2", "assets": ["./node_modules/select2/dist/js/select2.min.js", "./node_modules/select2/dist/css/select2.min.css"]},
            // {"name": "chart-js", "assets": ["./node_modules/chart.js/dist/Chart.bundle.min.js"]},
            {"name": "apexcharts", "assets": ["./node_modules/apexcharts/dist/apexcharts.min.js"]},
            {
                "name": "datatables", "assets": ["./node_modules/datatables.net/js/jquery.dataTables.min.js",
                    "./node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js",
                    "./node_modules/datatables.net-responsive/js/dataTables.responsive.min.js",
                    "./node_modules/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js",
                    "./node_modules/datatables.net-buttons/js/dataTables.buttons.min.js",
                    "./node_modules/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js",
                    "./node_modules/datatables.net-buttons/js/buttons.html5.min.js",
                    "./node_modules/datatables.net-buttons/js/buttons.flash.min.js",
                    "./node_modules/datatables.net-buttons/js/buttons.print.min.js",
                    "./node_modules/datatables.net-buttons/js/buttons.colVis.min.js",
                    "./node_modules/datatables.net-keytable/js/dataTables.keyTable.min.js",
                    "./node_modules/datatables.net-select/js/dataTables.select.min.js",
                    "./node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css",
                    "./node_modules/datatables.net-responsive-bs4/css/responsive.bootstrap4.css",
                    "./node_modules/datatables.net-buttons-bs4/css/buttons.bootstrap4.css",
                    "./node_modules/datatables.net-select-bs4/css/select.bootstrap4.css"]
            },
            {"name": "pdfmake", "assets": ["./node_modules/pdfmake/build/pdfmake.min.js", "./node_modules/pdfmake/build/vfs_fonts.js"]},
            {"name": "jszip", "assets": ["./node_modules/jszip/dist/jszip.min.js"]},
            // {"name": "curiosityx", "assets": ["./node_modules/@curiosityx/bootstrap-session-timeout/index.js"]},
            {"name": "bootstrap-datepicker", "assets": ["./node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js","./node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css"]},
            // {"name": "datepicker", "assets": ["./node_modules/@chenfengyuan/datepicker/dist/datepicker.min.js","./node_modules/@chenfengyuan/datepicker/dist/datepicker.min.css"]},
            {"name": "bootstrap-timepicker", "assets": ["./node_modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css","./node_modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"]},
            {"name": "tui-calendar", "assets": ["./node_modules/tui-calendar/dist/tui-calendar.min.js", "./node_modules/tui-calendar/dist/tui-calendar.min.css"]},
            {"name": "tui-chart", "assets": ["./node_modules/tui-chart/dist/tui-chart-all.min.js", "./node_modules/tui-chart/dist/maps/usa.js", "./node_modules/tui-chart/dist/tui-chart.min.css"]},
            
        ]
    };

	//copying third party assets
    lodash(third_party_assets).forEach(function (assets, type) {
        if (type == "css_js") {
            lodash(assets).forEach(function (plugin) {
                var name = plugin['name'],
                    assetlist = plugin['assets'],
                    css = [],
                    js = [];
                lodash(assetlist).forEach(function (asset) {
                    var ass = asset.split(',');
					for (let i = 0; i < ass.length; ++i) {
                    	if(ass[i].substr(ass[i].length - 3)  == ".js") {
                    		js.push(ass[i]);
                    	} else {
                    		css.push(ass[i]);
                    	}
                	};
                });
            	if(js.length > 0){
            		mix.combine(js, folder.dist_assets + "/libs/" + name + "/" + name + ".min.js");
            	}
            	if(css.length > 0){
            		mix.combine(css, folder.dist_assets + "/libs/" + name + "/" + name + ".min.css");
            	}
            });
        }
    });

    mix.copyDirectory("./node_modules/tinymce", folder.dist_assets + "/libs/tinymce");
    mix.copyDirectory("./node_modules/leaflet/dist/images", folder.dist_assets + "/libs/leaflet/images");
  //  mix.copyDirectory("./node_modules/bootstrap-editable/img", folder.dist_assets + "/libs/img");

    // copy all fonts
    var out = folder.dist_assets + "fonts";
    mix.copyDirectory(folder.src + "fonts", out);

    // copy all images 
    var out = folder.dist_assets + "images";
    mix.copyDirectory(folder.src + "images", out);

    mix.sass('resources/scss/bootstrap.scss', folder.dist_assets + "css").minify(folder.dist_assets + "css/bootstrap.css");
    mix.sass('resources/scss/bootstrap-dark.scss', folder.dist_assets + "css").minify(folder.dist_assets + "css/bootstrap-dark.css");
    mix.sass('resources/scss/icons.scss', folder.dist_assets + "css").options({processCssUrls: false}).minify(folder.dist_assets + "css/icons.css");
    mix.sass('resources/scss/app.scss', folder.dist_assets + "css").options({processCssUrls: false}).minify(folder.dist_assets + "css/app.css");
    mix.sass('resources/scss/app-dark.scss', folder.dist_assets + "css").options({processCssUrls: false}).minify(folder.dist_assets + "css/app-dark.css");

    // mix.webpackConfig({
    //     plugins: [
    //         new WebpackRTLPlugin({
    //             file: '/css/[name].rtl.css',
    //         })
    //     ]
    // });

    

    mix.webpackConfig({
        plugins: [
            new WebpackRTLPlugin()
        ]
    });


    //copying demo pages related assets
    // var app_pages_assets = {
    //     js: [
    //         folder.src + "js/pages/apexcharts.init.js",
    //         folder.src + "js/pages/auth-2-carousel.init.js",
    //         folder.src + "js/pages/calendar.init.js",
    //         folder.src + "js/pages/calendars.js",
    //         folder.src + "js/pages/chartjs.init.js",
    //         folder.src + "js/pages/coming-soon.init.js",
    //         folder.src + "js/pages/crypto-dashboard.init.js",
    //         folder.src + "js/pages/crypto-exchange.init.js",
    //         folder.src + "js/pages/crypto-kyc-app.init.js",
    //         folder.src + "js/pages/crypto-orders.init.js",
    //         folder.src + "js/pages/crypto-wallet.init.js",
    //         folder.src + "js/pages/dashboard.init.js",
    //         folder.src + "js/pages/dashboard-blog.init.js",
    //         folder.src + "js/pages/datatables.init.js",
    //         folder.src + "js/pages/echarts.init.js",
    //         folder.src + "js/pages/ecommerce-cart.init.js",
    //         folder.src + "js/pages/ecommerce-select2.init.js",
    //         folder.src + "js/pages/email-editor.init.js",
    //         folder.src + "js/pages/file-manager.init.js",
    //         folder.src + "js/pages/flot.init.js",
    //         folder.src + "js/pages/fontawesome.init.js",
    //         folder.src + "js/pages/form-advanced.init.js",
    //         folder.src + "js/pages/form-editor.init.js",
    //         folder.src + "js/pages/form-mask.init.js",
    //         folder.src + "js/pages/form-repeater.int.js",
    //         folder.src + "js/pages/form-validation.init.js",
    //         folder.src + "js/pages/form-wizard.init.js",
    //         folder.src + "js/pages/form-xeditable.init.js",
    //         folder.src + "js/pages/gmaps.init.js",
    //         folder.src + "js/pages/ico-landing.init.js",
    //         folder.src + "js/pages/jquery-knob.init.js",
    //         folder.src + "js/pages/leaflet-map.init.js",
    //         folder.src + "js/pages/leaflet-us-states.js",
    //         folder.src + "js/pages/lightbox.init.js",
    //         folder.src + "js/pages/materialdesign.init.js",
    //         folder.src + "js/pages/product-filter-range.init.js",
    //         folder.src + "js/pages/profile.init.js",
    //         folder.src + "js/pages/project-overview.init.js",
    //         folder.src + "js/pages/range-sliders.init.js",
    //         folder.src + "js/pages/rating-init.js",
    //         folder.src + "js/pages/saas-dashboard.init.js",
    //         folder.src + "js/pages/schedules.js",
    //         folder.src + "js/pages/session-timeout.init.js",
    //         folder.src + "js/pages/sparklines.init.js",
    //         folder.src + "js/pages/sweet-alerts.init.js",
    //         folder.src + "js/pages/table-editable.int.js",
    //         folder.src + "js/pages/table-responsive.init.js",
    //         folder.src + "js/pages/task-create.init.js",
    //         folder.src + "js/pages/task-form.init.js",
    //         folder.src + "js/pages/task-kanban.init.js",
    //         folder.src + "js/pages/tasklist.init.js",
    //         folder.src + "js/pages/timeline.init.js",
    //         folder.src + "js/pages/toastr.init.js",
    //         folder.src + "js/pages/tui-charts.init.js",
    //         folder.src + "js/pages/two-step-verification.init.js",
    //         folder.src + "js/pages/validation.init.js",
    //         folder.src + "js/pages/vector-maps.init.js"
    //     ]
    // };

    // var out = folder.dist_assets + "js/";
    // lodash(app_pages_assets).forEach(function (assets, type) {
	// 	for (let i = 0; i < assets.length; ++i) {
    //     	mix.js(assets[i], out + "pages");
    // 	};
    // });

    mix.combine('resources/js/app.js', folder.dist_assets + "js/app.min.js");