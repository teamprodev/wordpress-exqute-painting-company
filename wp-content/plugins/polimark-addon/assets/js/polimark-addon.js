(function ($) {
    "use strict";


    var WidgetDefaultHandler = function () {

        // swiper slider
        const swiperElm = document.querySelectorAll(".thm-swiper__slider");
        swiperElm.forEach(function (swiperelm) {
            const swiperOptions = JSON.parse(swiperelm.dataset.swiperOptions);
            let thmSwiperSlider = new Swiper(swiperelm, swiperOptions);
        });

        //Single Item Carousel
        if ($(".single-item-carousel").length) {
            $(".single-item-carousel").owlCarousel({
                loop: true,
                margin: 30,
                nav: true,
                smartSpeed: 500,
                autoplay: 5000,
                autoplayHoverPause: true,
                autoplayTimeout: 5000,
                navText: [
                    '<span class="icon fa fa-angle-left"></span>',
                    '<span class="icon fa fa-angle-right"></span>'
                ],
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    800: {
                        items: 1
                    },
                    1024: {
                        items: 1
                    }
                }
            });
        }


        //LightBox / Fancybox
        if ($(".lightbox-image").length) {
            $(".lightbox-image").fancybox({
                openEffect: "fade",
                closeEffect: "fade",
                helpers: {
                    media: {}
                }
            });
        }

        // Donation Progress Bar
        if ($(".count-bar").length) {
            $(".count-bar").appear(
                function () {
                    var el = $(this);
                    var percent = el.data("percent");
                    $(el).css("width", percent).addClass("counted");
                }, {
                    accY: -50
                }
            );
        }

        //Fact Counter + Text Count
        if ($(".count-box").length) {
            $(".count-box").appear(
                function () {
                    var $t = $(this),
                        n = $t.find(".count-text").attr("data-stop"),
                        r = parseInt($t.find(".count-text").attr("data-speed"), 10);

                    if (!$t.hasClass("counted")) {
                        $t.addClass("counted");
                        $({
                            countNum: $t.find(".count-text").text()
                        }).animate({
                            countNum: n
                        }, {
                            duration: r,
                            easing: "linear",
                            step: function () {
                                $t.find(".count-text").text(Math.floor(this.countNum));
                            },
                            complete: function () {
                                $t.find(".count-text").text(this.countNum);
                            }
                        });
                    }
                }, {
                    accY: 0
                }
            );
        }

        //Jquery Knob animation
        if ($(".dial").length) {
            $(".dial").appear(
                function () {
                    var elm = $(this);
                    var color = elm.attr("data-fgColor");
                    var perc = elm.attr("value");
                    var thickness = elm.attr("data-thickness");

                    elm.knob({
                        value: 0,
                        min: 0,
                        max: 100,
                        skin: "tron",
                        readOnly: true,
                        thickness: thickness,
                        dynamicDraw: true,
                        displayInput: false
                    });

                    $({
                        value: 0
                    }).animate({
                        value: perc
                    }, {
                        duration: 2000,
                        easing: "swing",
                        progress: function () {
                            elm.val(Math.ceil(this.value)).trigger("change");
                        }
                    });
                }, {
                    accY: 0
                }
            );
        }
    }


    var WidgetCountdownHandler = function () {
        if ($(".countdown-one__list").length) {

            $(".countdown-one__list").each(function () {
                let self = $(this);
                let mainDate = self.data('deadline-date');
                let yearsCondition = self.data('enable-years');
                let leadingZeros = self.data('leading-zeros');

                let deadLine = ('dynamicDate' == mainDate) ? new Date(Date.parse(new Date()) + 31 * 24 * 60 * 60 * 1000) : mainDate;

                self.countdown({
                    date: deadLine,
                    leadingZeros: true,
                    render: function (date) {
                        this.el.innerHTML =
                            (true == yearsCondition ? "<li> <span class='years'> " + (true == leadingZeros ? this.leadingZeros(date.years) : date.years) + " <i> Years </i> </span> </li>" : " ") +
                            "<li> <span class='days'> " + (true == leadingZeros ? this.leadingZeros(date.days) : date.days) + " <i> Days </i> </span> </li>" +
                            "<li> <span class='hours'>" + (true == leadingZeros ? this.leadingZeros(date.hours) : date.hours) + " <i> Hours </i> </span> </li>" +
                            "<li> <span class='minutes'> " + (true == leadingZeros ? this.leadingZeros(date.min) : date.min) + " <i> Minutes </i> </span> </li>" +
                            "<li> <span class='seconds'>" + (true == leadingZeros ? this.leadingZeros(date.sec) : date.sec) + " <i> Seconds </i> </span> </li>";
                    }
                });
            });
        }

    };

    if ($('.recent-events-carousel').length) {
        $('.recent-events-carousel').owlCarousel({
            loop: true,
            margin: 30,
            nav: false,
            dots: true,
            smartSpeed: 500,
            autoplay: 5000,
            autoplayHoverPause: true,
            navText: [
                '<span class="icon fa fa-angle-left"></span>',
                '<span class="icon fa fa-angle-right"></span>'
            ],
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                }
            }
        });
    }

    var WidgetTwitterHandler = function () {
        if ($('.ctf-tweets').length) {
            $('.ctf-tweets').addClass('owl-carousel owl-theme');
            $('.ctf-tweets').owlCarousel({
                loop: true,
                margin: 30,
                nav: false,
                dots: true,
                smartSpeed: 500,
                autoplay: 5000,
                autoplayHoverPause: true,
                navText: [
                    '<span class="icon fa fa-angle-left"></span>',
                    '<span class="icon fa fa-angle-right"></span>'
                ],
                responsive: {
                    0: {
                        items: 1
                    },
                    480: {
                        items: 1
                    },
                    768: {
                        items: 1
                    },
                    992: {
                        items: 1
                    }
                }
            });
        }
    }


    var WidgetSponsorsHandler = function () {
        //Sponsors Carousel
        if ($(".sponsors-carousel").length) {
            $(".sponsors-carousel").owlCarousel({
                loop: true,
                margin: 30,
                nav: false,
                dots: false,
                smartSpeed: 700,
                autoplay: 5000,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                navText: [
                    '<span class="icon fa fa-angle-left"></span>',
                    '<span class="icon fa fa-angle-right"></span>'
                ],
                responsive: {
                    0: {
                        items: 2
                    },
                    600: {
                        items: 3
                    },
                    768: {
                        items: 3
                    },
                    992: {
                        items: 4,
                        margin: 90
                    },
                    1200: {
                        items: 5,
                        margin: 90
                    }
                }
            });
        }
    }


    var WidgetAccordionHandler = function () {
        //Accordion Box
        if ($(".accordion-box").length) {
            var accrodionGrp = $(".accordion-box");
            accrodionGrp.each(function () {
                var accrodionName = $(this).attr("id");
                var Self = $(this);
                var accordion = Self.find(".accordion");
                Self.addClass(accrodionName);
                Self.find(".accordion .acc-content").hide();
                Self.find(".accordion.active-block").find(".acc-content").show();
                accordion.each(function () {
                    $(this)
                        .find(".acc-btn")
                        .on("click", function () {
                            if ($(this).parent().hasClass("active-block") === false) {
                                $(".accordion-box." + accrodionName)
                                    .find(".accordion")
                                    .removeClass("active-block");
                                $(".accordion-box." + accrodionName)
                                    .find(".accordion")
                                    .find(".acc-content")
                                    .slideUp();
                                $(this).parent().addClass("active-block");
                                $(this)
                                    .parent()
                                    .find(".acc-content")
                                    .slideDown();
                            }
                        });
                });
            });
        }

    }



    var WidgetTestimonialsHandler = function () {

        //Testimonial Carousel
        if ($(".testimonials-carousel").length) {
            $(".testimonials-carousel").owlCarousel({
                loop: true,
                margin: 30,
                nav: false,
                smartSpeed: 700,
                autoplay: 5000,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                navText: [
                    '<span class="icon fa fa-angle-left"></span>',
                    '<span class="icon fa fa-angle-right"></span>'
                ],
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    992: {
                        items: 2
                    },
                    1200: {
                        items: 3
                    }
                }
            });
        }

        //Testimonial Carousel
        if ($(".testimonials-carousel-two").length) {
            $(".testimonials-carousel-two").owlCarousel({
                loop: true,
                margin: 30,
                nav: true,
                smartSpeed: 700,
                autoplay: 5000,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                navText: [
                    '<span class="icon fa fa-angle-left"></span>',
                    '<span class="icon fa fa-angle-right"></span>'
                ],
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    768: {
                        items: 1
                    },
                    1200: {
                        items: 1
                    }
                }
            });
        }
        if ($(".testimonials-four-carousel").length) {
            $(".testimonials-four-carousel").owlCarousel({
                loop: true,
                margin: 30,
                nav: false,
                smartSpeed: 700,
                autoplay: 5000,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                dots: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    1200: {
                        items: 3
                    }
                }
            });
        }
    }

    var WidgetTeamHandler = function () {

        //Team Carousel
        if ($(".team-two-carousel__owl").length) {
            $(".team-two-carousel__owl").owlCarousel({
                loop: true,
                margin: 30,
                nav: false,
                smartSpeed: 700,
                autoplay: 5000,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                navText: [
                    '<span class="icon fa fa-angle-left"></span>',
                    '<span class="icon fa fa-angle-right"></span>'
                ],
                responsive: {
                    0: {
                        items: 1,
                        margin: 30
                    },
                    600: {
                        items: 2,
                        margin: 30
                    },
                    768: {
                        items: 2,
                        margin: 30
                    },
                    992: {
                        items: 3,
                        margin: 30
                    },
                    1200: {
                        items: 4,
                        margin: 50
                    },
                    1440: {
                        items: 4,
                        margin: 80
                    }
                }
            });
        }
    }



    //elementor front start
    $(window).on("elementor/frontend/init", function () {
        elementorFrontend.hooks.addAction(
            "frontend/element_ready/widget",
            WidgetDefaultHandler
        );

        elementorFrontend.hooks.addAction(
            "frontend/element_ready/polimark-coming-soon.default",
            WidgetCountdownHandler
        );
        elementorFrontend.hooks.addAction(
            "frontend/element_ready/polimark-sponsors.default",
            WidgetSponsorsHandler
        );
        elementorFrontend.hooks.addAction(
            "frontend/element_ready/polimark-twitter.default",
            WidgetTwitterHandler
        );
        elementorFrontend.hooks.addAction(
            "frontend/element_ready/polimark-accordion.default",
            WidgetAccordionHandler
        );
        elementorFrontend.hooks.addAction(
            "frontend/element_ready/polimark-testimonials.default",
            WidgetTestimonialsHandler
        );
        elementorFrontend.hooks.addAction(
            "frontend/element_ready/polimark-team.default",
            WidgetTeamHandler
        );
    });
})(jQuery);