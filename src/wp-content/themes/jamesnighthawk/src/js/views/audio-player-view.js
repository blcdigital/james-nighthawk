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
	'app' // App
], function(App) {
	var AudioPlayerView = Backbone.View.extend({
			// set the taget element for the view
			el: '.audio-player',

			// bind any events
			events: {
				'change select': 'changeTrack'
			},

			// the order of tracks added to the playlist
			trackList: [],

			// init
			initialize: function() {
				var $windowWidth = $(window).width();

				// set audio player width
				if ($windowWidth > 767) {
					this.playerWidth = '60%';
				} else {
					this.playerWidth = '50%';
				}

				this.isShowing = false;

				// set up the track list
				_.each(this.$('select option:not(:first)'), function(option) {
					this.trackList.push($(option).val());
				}, this);

				this.render();
			},

			// render
			render: function() {
				var self = this;

				// set the current track to 0
				this.currentTrack = 0;

				// init the media player
				this.audioPlayer = new MediaElementPlayer('#audioPlayer', {
					audioWidth: this.playerWidth,
					success: function (player) {
						self.updateTrackInfo();

						// add event listeners
						player.addEventListener('play', function() {
							self.resumeTrack();
						});
						player.addEventListener('pause', function() {
							self.pauseTrack();
						});
						player.addEventListener('ended', function() {
							self.nextTrack();
						});
					}
				});

				// return to maintiain chainability
				return this;
			},

			// play a new track
			changeTrack: function(e) {
				var track = $(e.currentTarget).val();

				// if the track title isn't empty
				// if the selected track isn't the current one
				if (track !== '' && _.indexOf(this.trackList, track) !== this.currentTrack) {
					this.playTrack(track);
				}
			},

			// play a new track
			playTrack: function(track) {
				// if the track title isn't empty
				// if the selected track isn't the current one
				if (track !== '' && _.indexOf(this.trackList, track) !== this.currentTrack) {
					// set current track no
					this.currentTrack = _.indexOf(this.trackList, track);

					// play the new track
					this.audioPlayer.pause();
					this.audioPlayer.setSrc(this.getTrackPath());
					this.audioPlayer.play();

					this.updateTrackInfo();
				}

				if (!this.isShowing) {
					this.$('.audio-player-inner').animate({
						marginTop: 0
					});

					this.audioPlayer.play();

					this.updateTrackInfo();

					this.isShowing = true;
				}
			},

			pauseTrack: function() {
				this.audioPlayer.pause();

				$('.pause-track').removeClass('pause-track').addClass('track-paused');
			},

			resumeTrack: function() {
				this.audioPlayer.play();

				$('.track-paused').removeClass('track-paused').addClass('pause-track');
			},

			nextTrack: function() {
				this.currentTrack++;

				if (!this.trackList[this.currentTrack]) {
					this.currentTrack = 0;
				}

				// change the track
				this.audioPlayer.setSrc(this.getTrackPath());
				this.audioPlayer.play();

				this.updateTrackInfo();
			},

			updateTrackInfo: function() {
				// set the html of now playing
				this.$('.now-playing span').html(this.trackList[this.currentTrack]);

				// add/swap the pause button for tracks on the page
				$('.pause-track, .track-paused').removeClass('pause-track track-paused');
				$('a[data-track="' + this.trackList[this.currentTrack] + '"]').parent().addClass('pause-track');
			},

			getTrackPath: function() {
				return '/wp-content/uploads/music/' + this.trackList[this.currentTrack].replace(/ /g, '_').toLowerCase() + '.mp3';
			}
		});

	// what we return here will be used by other modules
	return AudioPlayerView;
});