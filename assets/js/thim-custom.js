$(document).ready(function () {
    $(".button-search").click(function (e) {
        if ($("#search-input").val() == "" && $("#search-input").hasClass("hidden-search")) {
            e.preventDefault();
            $("#search-input").addClass("show-search");
            $("#search-input").removeClass("hidden-search");
        }
        else if ($("#search-input").val() == "" && $("#search-input").hasClass("show-search")) {
            e.preventDefault();
            $("#search-input").removeClass("show-search");
            $("#search-input").addClass("hidden-search");
        }
    });
    $("#search-input").blur(function () {
        if ($("#search-input").val() == "") {
            $("#search-input").removeClass("show-search");
            $("#search-input").addClass("hidden-search");
        }
    });
    $(".menu-item-has-children").hover(function () {
            if (!$(this).children(".sub-menu").hasClass("sub-menu-show")) {
                $(this).children(".sub-menu").addClass("sub-menu-show");
                $(this).children(".sub-menu-show").css({
                    'visibility': 'visible',
                    'height': '100%'
                });
            }
            else {
                $(this).children(".sub-menu").removeClass("sub-menu-show");
                $(this).children(".sub-menu").css({
                    'visibility': 'hidden',
                    'height': '0'
                });
            }
        }
    );

    $(".menu-item-has-children").click(function (e){
        $(this).children(".sub-menu").toggleClass('show-sub-menu');
    });

    $(".menu-mobile-effect").click(function (e) {
        e.stopPropagation();
        $('#page').toggleClass('mobile-menu-open');
    });

    $(".overlay-close-menu").click(function (e) {
        $('#page').toggleClass('mobile-menu-open');
    });

    var $header = $('#masthead');
    var latestScroll = 0;
    $(window).scroll(function () {
        if($(window).width()<800) {
            var current = $(this).scrollTop();
            if (current > 1) {
                $header.removeClass('no-transition');
                $header.css({});
            } else {
                $header.addClass('no-transition');
                $header.removeClass('menu-show');
            }

            if (current > latestScroll && current > 1) {
                if (!$header.hasClass('menu-hidden')) {
                    $header.addClass('menu-hidden');
                    $header.removeClass('menu-show');
                }
            }
            else {
                if ($header.hasClass('menu-hidden')) {
                    $header.removeClass('menu-hidden');
                    $header.addClass('menu-show');

                }
            }
            latestScroll = current;
        }
    });

});