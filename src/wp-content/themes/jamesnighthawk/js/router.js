/**
* Backbone.js/RequireJS Template
*
* @info		Router module
* @version	0.4
* @author	Jasal Vadgama - http://blacklabelcreative.com/
* @license	MIT
**/

define([
	// add global app dependency
	'app', // App

	// additional module dependencies
	'views/app-view' // AppView
], function(App, AppView) {
	var AppRouter = Backbone.Router.extend({
		firstLoad: true,

		routes: {
			// define the URL routes (examples of each type)
			//'': 'index' // http://example.com/
			'*path': 'loadURL' // http://example.com/#/download/user/images/hey.gif
		},

		loadURL: function(path) {
			// if it's the first load and the homepage
			if (this.firstLoad && path === '') {
				// do nothing
			} else {
				// load the page
				this.View.loadPage(path);
			}

			this.firstLoad = false;
		},

		initialize: function() {
			this.View = new AppView();
		}

	});

	// what we return here will be used by other modules
	return AppRouter;
});