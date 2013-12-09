/**
* Backbone.js/RequireJS Template
*
* @info     Initialises the app
* @version  0.4
* @author   Jasal Vadgama - http://blacklabelcreative.com/
* @require  jQuery 1.8.0
            Lo-Dash 0.8.2
            backbone.js 0.92
            requireJS 2.02
* @license  MIT
**/

/* Configure shortcut aliases for required libraries */
require.config({
    baseUrl: '/wp-content/themes/jamesnighthawk/js',
    paths: {
        // paths to libraries
        Modernizr: 'libs/modernizr/modernizr',
        jQuery: 'libs/jquery/jquery.min',
        lodash: 'libs/lodash/lodash.underscore.min',
        Backbone: 'libs/backbone/backbone.min',
        MediaElementPlayer: 'libs/mediaelement/mediaelement-and-player',
        text: 'libs/require/text' // text plugin for templates
    },
    shim: {
        // set dependencies for imported scipts
        'Modernizr': {
            exports: 'Modernizr'
        },
        'jQuery': {
            exports: '$'
        },
        'lodash': {
            exports: '_'
        },
        'Backbone': {
            deps: ['lodash', 'jQuery'],
            exports: 'Backbone'
        },
        'MediaElementPlayer' : {
            exports: 'MediaElementPlayer'
        }
    }
});

require([
    // load the app module (app.js) and pass it to the definition function
    'app', // App
    'router' // Router
], function(App, Router) {
    // the "app" dependency is passed in as "App"

    // initialze the application view
    App.router = new Router();

    // start the HTML5 History API
    Backbone.history.start();
});