/**
* Backbone.js/RequireJS Template
*
* @info		App initialization module
* @version	0.4
* @author	Jasal Vadgama - http://blacklabelcreative.com/
* @license	MIT
**/

define([
	// these are path alias that we configured in our bootstrap
	'jQuery', // libs/jquery/jquery
	'lodash', // libs/lodash/lodash.underscore.min
	'Backbone', // libs/backbone/backbone
	'MediaElementPlayer' // libs/mediaelement/mediaelement-and-player

	// additional module dependencies
], function($, _, Backbone, MediaElementPlayer) {
	// set up the interactions for the app seprerate from backbone

	// global app object to hold settings
	var app = {
		// PUBLIC VARIABLES
		audioTagSupport: !!(document.createElement('audio').canPlayType),
		host: 'jamesnighthawk.com',
		loader: '#loadingOverlay',
		root: '/',

		// PUBLIC FUNCTIONS
		modifyLinks: function(el) {
			// find all the links
			var $links = el.find('a');

			// for each link
			_.each($links, function(link) {
				var $link = $(link),
					linkHost = link.host.replace(':80', '');

				// if it's the site host
				if (linkHost === app.host && !$link.data('track')) {
					// add /#/ to the URL
					$link.attr('href', $link.attr('href').replace(app.host, app.host + '/#'));
				}
			});
		}
	};

	// PRIVATE VARIABLES

	// PRIVATE FUNCTIONS

	// what we return here will be used by other modules
	// app is also extended with Backbone.Events
	return _.extend(app, {
		// GLOBAL FUNCTIONS
	}, Backbone.Events);
});