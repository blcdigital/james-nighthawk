/**
* Backbone.js/RequireJS Template
*
* @info		Main App view module
* @version	0.4
* @author	Jasal Vadgama - http://blacklabelcreative.com/
* @license	MIT
**/

define([
	// add global app dependency
	'app' // App
], function(App) {
	var VideoView = Backbone.View.extend({
			// set the target element for the view
			el: '.videos',

			// bind any events
			events: {
			},

			// init
			initialize: function() {
				this.render();
			},

			// render
			render: function() {
				var $iframe = $('<iframe frameborder="0" allowfullscreen />');

				$iframe.css({
					top: this.options.el.find('h1').outerHeight(),
					width: this.options.el.find('a').width(),
					height: this.options.el.find('a').height()
				}).attr('src', 'http://www.youtube.com/embed/' + this.options.video).appendTo(this.options.el);

				// return to maintiain chainability
				return this;
			}
		});

	// what we return here will be used by other modules
	return VideoView;
});