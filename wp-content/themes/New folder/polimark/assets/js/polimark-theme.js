(function ($) {
    "use strict";

    // Scroll to a Specific Div
    if ($(".scroll-to-target").length) {
        $(".scroll-to-target").on("click", function () {
            var target = $(this).attr("data-target");
            // animate
            $("html, body").animate({
                    scrollTop: $(target).offset().top
                },
                1000
            );

            return false;
        });
    }

    //Hide Loading Box (Preloader)
    function handlePreloader() {
        if ($(".preloader").length) {
            $("body").addClass("page-loaded");
            $(".preloader").delay(300).fadeOut(0);
        }
    }

    if ($('.sticky-menu').length) {
        $('.sticky-menu').addClass('original').clone(true).insertAfter('.sticky-menu').addClass('sticked-menu').removeClass('original sticky-menu');
    }


    //Submenu Dropdown Toggle
    if ($(".main-header li.menu-item-has-children ul").length) {
        $(".main-header .navigation li.menu-item-has-children > a").append(
            '<div class="dropdown-btn"><span class="fa fa-angle-right"></span></div>'
        );
    }

    // Elements Animation
    if ($(".wow").length) {
        var wow = new WOW({
            boxClass: "wow", // animated element css class (default is wow)
            animateClass: "animated", // animation css class (default is animated)
            offset: 0, // distance to the element when triggering the animation (default is 0)
            mobile: false, // trigger animations on mobile devices (default is true)
            live: true // act on asynchronously loaded content (default is true)
        });
        wow.init();
    }

    //Mobile Nav Hide Show
    if ($(".side-menu__block").length) {
        var mobileMenuContent = $(".main-header .nav-outer .main-menu").html();
        var mobileNavContainer = $(".mobile-nav__container");
        mobileNavContainer.append(mobileMenuContent);

        //Dropdown Button
        mobileNavContainer
            .find("li.menu-item-has-children .dropdown-btn")
            .on("click", function (e) {
                e.preventDefault();
                $(this).toggleClass("open");
                $(this).parent("a").parent("li").children("ul").slideToggle(500);
            });
        //Menu Toggle Btn
        $(".mobile-nav-toggler").on("click", function () {
            $(".side-menu__block").addClass("active");
        });

        $(".side-menu__block-overlay,.side-menu__toggler, .scrollToLink > a ").on(
            "click",
            function (e) {
                $(".side-menu__block").removeClass("active");
                e.preventDefault();
            }
        );
    }

    if ($('.search-toggler').length) {
        $('.search-toggler').on('click', function (e) {
            e.preventDefault();
            $('.search-popup').toggleClass('active');
        });

        $('.search-popup form').prepend(function () {
            return '<div class="search-toggler"></div>';
        });

        $(".search-popup form .search-toggler").on("click", function (e) {
            e.preventDefault();
            $(".search-popup").toggleClass("active");
        });
    }

    $(window).on("load", function () {
        handlePreloader();
    });
    $(window).on("scroll", function () {
        if ($('.sticked-menu').length) {
            var headerScrollPos = 120;
            var stricky = $('.sticked-menu');
            if ($(window).scrollTop() > headerScrollPos) {
                stricky.addClass('stricky-fixed');
            } else if ($('.sticky-menu').scrollTop() <= headerScrollPos) {
                stricky.removeClass('stricky-fixed');
            }
        }

        if ($(".scroll-to-top").length) {
            var strickyScrollPos = 100;
            if ($(window).scrollTop() > strickyScrollPos) {
                $(".scroll-to-top").fadeIn(500);
            } else if ($(this).scrollTop() <= strickyScrollPos) {
                $(".scroll-to-top").fadeOut(500);
            }
        }
    });
})(jQuery);