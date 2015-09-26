require.config({
    paths: {
        'jQuery': 'vendor/jquery1.11',
        'jQueryEasing': 'vendor/jquery.easing.min',
        'owlCarousel': 'vendor/owl.carousel.min',
        'jQueryThrottle': 'vendor/jquery.throttle.min',
        'jQueryShuffle': 'vendor/jquery.shuffle.min',
        'Modernizr': 'vendor/modernizr.custom.min',
        'bootstrap': 'vendor/bootstrap.min',
        'blueimp-gallery': 'vendor/blueimp-gallery.min',
        'blueimp-helper': 'vendor/blueimp-helper.min',
        'jQueryBlueimpGallery': 'vendor/jquery.blueimp-gallery.min'
    },
    shim: {
        'jQuery': {
            exports: '$'
        },
        'jQueryEasing': {
            deps: ['jQuery'],
            exports: 'jQueryEasing'
        },
        'owlCarousel': {
            deps: ['jQuery'],
            exports: 'owlCarousel'
        },
        'jQueryThrottle': {
            deps: ['jQuery'],
            exports: 'jQueryThrottle'
        },
        'Modernizr': {
            exports: 'Modernizr'
        },
        'bootstrap': {
            deps: ['jQuery'],
            exports: 'bootstrap'
        },
        'jQueryBlueimpGallery': {
            deps: ['jQuery']
        },
        'blueimp-gallery': {
            deps: ['jQuery']
        },
        'blueimp-helper': {
            deps: ['jQuery']
        }
    }
});


require(['jQuery', 'jQueryEasing', 'owlCarousel', 'jQueryThrottle', 'jQueryShuffle', 'bootstrap', 'blueimp-gallery', 'blueimp-helper', 'jQueryBlueimpGallery'], function ($, jQueryEasing, jQueryThrottle, jQueryShuffle, bootstrap, blueimpGallery, blueimpHelper, jQueryBlueimpGallery) {


    var Controller = (function () {

        function init() {

            setupJQueryEasingPlugin();
            setupOwlCarousel();
            setupFacebookLikebox(document, 'script', 'facebook-jssdk');
            setupGoogleAnalytics();
            setupEpicDoitHandler();
            setupShuffleJS();
            resetContactForm();

            var self = this;
            $("#morePhotos").click(function () {
                $.post("morePhotos", function (data, status) {
                    $("#fotos").replaceWith(data);
                    Controller.setupShuffleJSFunc();
                    $("#morePhotos").hide();
                });
            });
        }

        /**
         * setup jquery easing plugin
         */
        function setupJQueryEasingPlugin() {
            $('a.page-scroll').bind('click', function (event) {
                var $anchor = $(this);
                $('html, body').stop().animate({scrollTop: $($anchor.attr('href')).offset().top}, 1500, 'easeInOutExpo');
                event.preventDefault();
            });
        }

        function setupOwlCarousel() {
          $("#owl-carousel").owlCarousel({
                items: 1,
                itemsDesktop: false,
                itemsDesktopSmall: false,
                itemsTablet: false,
                itemsTabletSmall: false,
                itemsMobile: false,
                pagination: false,
                afterInit: initCallback,
                beforeMove: beforeMoveCallback,
                afterMove : moveCallback
            });

            var owl = $(".owl-carousel").data('owlCarousel');

            function initCallback() {
                  $( "#showDominikBtn").addClass('active');
            }

            function beforeMoveCallback() {

            }

            function moveCallback() {
                if (owl.currentItem == 0) {
                    if ($( "#showDominikBtn").hasClass('active') == false) {
                        $( "#showDominikBtn").addClass('active');
                    }
                    $( "#showAndreasBtn").removeClass('active');
                    $( "#showReneBtn").removeClass('active');
                    $( "#showDanielBtn").removeClass('active');
                }
                if (owl.currentItem == 1) {
                    $( "#showDominikBtn").removeClass('active');
                    if ($( "#showAndreasBtn").hasClass('active') == false) {
                        $("#showAndreasBtn").addClass('active');
                    }
                    $( "#showReneBtn").removeClass('active');
                    $( "#showDanielBtn").removeClass('active');
                }
                if (owl.currentItem == 2) {
                    $( "#showDominikBtn").removeClass('active');
                    $( "#showAndreasBtn").removeClass('active');
                    if ($( "#showReneBtn").hasClass('active') == false) {
                        $("#showReneBtn").addClass('active');
                    }
                    $( "#showDanielBtn").removeClass('active');
                }
                if (owl.currentItem == 3) {
                    $( "#showDominikBtn").removeClass('active');
                    $( "#showAndreasBtn").removeClass('active');
                    $( "#showReneBtn").removeClass('active');
                    if ($( "#showDanielBtn").hasClass('active') == false) {
                        $("#showDanielBtn").addClass('active');
                    }
                }
            }

            $( "#showDominikBtn" ).click(function() {
                owl.goTo(0);
            });

            $( "#showAndreasBtn" ).click(function() {
                owl.goTo(1);
            });

            $( "#showReneBtn" ).click(function() {
                owl.goTo(2);
            });

            $( "#showDanielBtn" ).click(function() {
                owl.goTo(3);
            });
        }

        /**
         * setup facebook like box
         */
        function setupFacebookLikebox(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id))
                return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/de_DE/sdk.js#xfbml=1&appId=965565660136820&version=v2.0";
            fjs.parentNode.insertBefore(js, fjs);
        }

        /**
         * reset conact form
         */
        function resetContactForm() {
            $('#name').val("");
            $('#email').val("");
            $('#message').val("");
        }

        /**
         * setup google analytics
         */
        function setupGoogleAnalytics() {
            // google analytics
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-59947451-1', 'auto');
            ga('send', 'pageview');
        }

        function setupEpicDoitHandler() {
            // initial
            var active_type;
            var curr_type;

            var switchFromSmallToBig = function () {
                $('.dominik .move_img').prependTo($('.dominik'));
                $('.andreas .move_img').appendTo($('.andreas'));
                $('.rene .move_img').prependTo($('.rene'));
                $('.daniel .move_img').appendTo($('.daniel'));
                $('#primary-nav .project').appendTo($('#secondary-nav'));
            }

            var switchFromBigToSmall = function () {
                $('.dominik .move_img').appendTo($('.dominik'));
                $('.andreas .move_img').appendTo($('.andreas'));
                $('.rene .move_img').appendTo($('.rene'));
                $('.daniel .move_img').appendTo($('.daniel'));
                $('#secondary-nav .project').appendTo($('#primary-nav'));
            }

            if ($(window).width() < 991) {
                active_type = "small"
                curr_type = "small";
                switchFromBigToSmall();
            } else {
                active_type = "big"
                curr_type = "big";
                switchFromSmallToBig();
            }

            window.onresize = function (event) {
                if ($(window).width() < 991) {
                    curr_type = "small";
                } else {
                    curr_type = "big";
                }
                check();
            };

            function check() {
                if (active_type != curr_type) {
                    if (curr_type == "big") {
                        switchFromSmallToBig();
                    } else {
                        switchFromBigToSmall();
                    }
                    active_type = curr_type;
                }
            }
        }

        /**
         * setup shuffleJS
         */
        function setupShuffleJS() {

            var shuffleme = (function ($) {
                'use strict';

                var $grid = $('#grid'),
                    $filterOptions = $('.filter-options'),
                    $sizer = $grid.find('.shuffle_sizer'),

                    init = function () {

                        // None of these need to be executed synchronously
                        setTimeout(function () {
                            listen();
                            setupFilters();
                        }, 100);

                        // instantiate the plugin
                        $grid.shuffle({
                            itemSelector: '.picture-item',
                            sizer: $sizer
                        });

                        // initial group
                        $grid.shuffle('shuffle', 'Local Heroes');
                    },

                // Set up button clicks
                    setupFilters = function () {
                        var $btns = $filterOptions.children();
                        $btns.on('click', function () {
                            var $this = $(this);
                            var group = $this.data('group');

                            // Filter elements
                            $grid.shuffle('shuffle', group);
                        });

                        $btns = null;
                    },

                // Re layout shuffle when images load. This is only needed
                // below 768 pixels because the .picture-item height is auto and therefore
                // the height of the picture-item is dependent on the image
                // I recommend using imagesloaded to determine when an image is loaded
                // but that doesn't support IE7
                    listen = function () {
                        var debouncedLayout = $.throttle(300, function () {
                            $grid.shuffle('update');
                        });

                        // Get all images inside shuffle
                        $grid.find('.img-responsive').each(function () {
                            var proxyImage;

                            // Image already loaded
                            if (this.complete && this.naturalWidth !== undefined) {
                                return;
                            }

                            // If none of the checks above matched, simulate loading on detached element.
                            proxyImage = new Image();
                            $(proxyImage).on('load', function () {
                                $(this).off('load');
                                debouncedLayout();
                            });

                            proxyImage.src = this.src;
                        });

                        // Because this method doesn't seem to be perfect.
                        setTimeout(function () {
                            debouncedLayout();
                        }, 500);
                    };

                return {
                    init: init
                };
            }(jQuery));


            $(document).ready(function () {
                shuffleme.init();
                // show gallery after fully loading the images
                $('#fotos').show();
            });

        }

        return {
            setup: init,
            setupShuffleJSFunc: setupShuffleJS
        };
    })();

    // call setup
    Controller.setup();

});