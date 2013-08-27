/**
* Backbone.js/RequireJS Template
*
* @info		Main App view module template
* @version	0.4
* @author	Jasal Vadgama - http://blacklabelcreative.com/
* @license	MIT
**/

define([
	// add global app dependency
	'app', // App

	'views/audio-player-view', // AudioPlayer
	'views/video-player-view' // VideoPlayer
], function(App, AudioPlayer, VideoPlayer) {
	var AppView = Backbone.View.extend({
			// set the taget element for the view
			el: 'body',

			// bind any events
			events: {
				'click .has-track a': 'playTrack',
				'click .videos article a': 'playVideo'
			},

			// init
			initialize: function() {
				// change the links
				App.modifyLinks(this.$el);

				// start the media player
				this.audioPlayer = new AudioPlayer();
			},

			// render
			render: function() {
				// return to maintiain chainability
				return this;
			},

			loadPage: function(path) {
				$.ajax({
					url: '/' + path,
					beforeSend: function() {
						var $pageWrapper = $('#pageWrapper');

						// show the loading screen
						$(App.loader).css({
							top: $pageWrapper.offset().top,
							left: $pageWrapper.offset().left,
							width: $pageWrapper.outerWidth(),
							height: $pageWrapper.outerHeight()
						}).show();
					},
					success: function(data) {
						var $div = $('<div />').append(data),
							$pageWrapper = $div.find('#pageWrapper');

						$('#pageWrapper')
							// set class
							.attr('class', $pageWrapper.attr('class'))
							// set html
							.html($pageWrapper.html());

						// set the links on the loaded page
						App.modifyLinks($('#pageWrapper'));

						// re-init the form checker
						jQuery.get('/wp-content/plugins/contact-form-7/includes/js/jquery.form.js', function(formData) {
							eval(formData);

							jQuery.get('/wp-content/plugins/contact-form-7/includes/js/scripts.js', function(formData) { eval(formData); });
						});

						$(App.loader).hide();

						$(window).scrollTop(0);
					}
				});
			},

			playTrack: function(e) {
				e.preventDefault();

				if ($(e.currentTarget).parent().hasClass('pause-track')) {
					this.audioPlayer.pauseTrack();
				} else if ($(e.currentTarget).parent().hasClass('track-paused')) {
					this.audioPlayer.resumeTrack();
				} else {
					this.audioPlayer.playTrack($(e.currentTarget).data('track'));
				}
			},

			playVideo: function(e) {
				var videoPlayer;

				e.preventDefault();

				videoPlayer = new VideoPlayer({
					el: $(e.currentTarget).parent(),
					video: $(e.currentTarget).data('video')
				});
			}
		});

	// what we return here will be used by other modules
	return AppView;
});