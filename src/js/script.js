/*jslint eqeqeq: true, undef: true */
/*global $, window, console, alert */

var JamesNighthawk = JamesNighthawk || {};

JamesNighthawk = (function() {
    // PRIVATE VARIABLES
    var

    // PRIVATE FUNCTIONS
        initVideos = function() {
            var
                $videos = $('li.videos')
            ;

            if ($videos.length < 1) {
                return;
            }

            $videos.each(function(index, item) {
                var
                    $item = $(item),
                    $iframe = $('<iframe frameborder="0" allowfullscreen />')
                ;

                $item.on('click', 'a', function(e) {
                    e.preventDefault();

                    $iframe.css({
                        top: $item.find('h1').outerHeight(),
                        width: $item.find('a').width(),
                        height: $item.find('a').height()
                    }).attr('src', 'http://www.youtube.com/embed/' + $item.find('a').attr('data-video')).appendTo($item);
                });
            });
        }
    ;

    // PUBLIC METHODS
    return {
        init: function() {
            // DOM ready

            // init videos
            initVideos();
        }//,
        // pageInit: function() {
        //     // page load
        // }
    };
}());

// ON DOM READY
$(function() {
    JamesNighthawk.init();
});

// ON PAGE LOAD
// $(window).load(function() {
//     JamesNighthawk.pageInit();
// });
