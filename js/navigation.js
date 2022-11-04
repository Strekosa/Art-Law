/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
(function () {
    const siteNavigation = document.getElementById('site-navigation');

    // Return early if the navigation doesn't exist.
    if (!siteNavigation) {
        return;
    }

    const button = siteNavigation.getElementsByTagName('button')[0];

    // Return early if the button doesn't exist.
    if ('undefined' === typeof button) {
        return;
    }

    const menu = siteNavigation.getElementsByTagName('ul')[0];

    // Hide menu toggle button if menu is empty and return early.
    if ('undefined' === typeof menu) {
        button.style.display = 'none';
        return;
    }

    if (!menu.classList.contains('nav-menu')) {
        menu.classList.add('nav-menu');
    }

    // Toggle the .toggled class and the aria-expanded value each time the button is clicked.
    button.addEventListener('click', function () {
        siteNavigation.classList.toggle('toggled');

        if (button.getAttribute('aria-expanded') === 'true') {
            button.setAttribute('aria-expanded', 'false');
        } else {
            button.setAttribute('aria-expanded', 'true');
        }
    });

    // Remove the .toggled class and set aria-expanded to false when the user clicks outside the navigation.
    document.addEventListener('click', function (event) {
        const isClickInside = siteNavigation.contains(event.target);

        if (!isClickInside) {
            siteNavigation.classList.remove('toggled');
            button.setAttribute('aria-expanded', 'false');
        }
    });

    // Get all the link elements within the menu.
    const links = menu.getElementsByTagName('a');

    // Get all the link elements with children within the menu.
    const linksWithChildren = menu.querySelectorAll('.menu-item-has-children > a, .page_item_has_children > a');

    // Toggle focus each time a menu link is focused or blurred.
    for (const link of links) {
        link.addEventListener('focus', toggleFocus, true);
        link.addEventListener('blur', toggleFocus, true);
    }

    // Toggle focus each time a menu link with children receive a touch event.
    for (const link of linksWithChildren) {
        link.addEventListener('touchstart', toggleFocus, false);
    }

    /**
     * Sets or removes .focus class on an element.
     */
    function toggleFocus() {
        if (event.type === 'focus' || event.type === 'blur') {
            let self = this;
            // Move up through the ancestors of the current link until we hit .nav-menu.
            while (!self.classList.contains('nav-menu')) {
                // On li elements toggle the class .focus.
                if ('li' === self.tagName.toLowerCase()) {
                    self.classList.toggle('focus');
                }
                self = self.parentNode;
            }
        }

        if (event.type === 'touchstart') {
            const menuItem = this.parentNode;
            event.preventDefault();
            for (const link of menuItem.parentNode.children) {
                if (menuItem !== link) {
                    link.classList.remove('focus');
                }
            }
            menuItem.classList.toggle('focus');
        }
    }
}());

document.addEventListener("DOMContentLoaded", function (event) {
    var selected = $('.drop-dl .current-lang img').attr('src');
    $('.lang-chose img').attr('src', selected);

    $('.lang-chose').click(function (event) {
        $('.drop-dl ul').slideToggle(500);
        event.preventDefault();
        return false;
    });

    $(document).bind('click', function (e) {
        var $clicked = $(e.target);
        if (!$clicked.parents().hasClass("drop-dl"))
            $(".drop-dl ul").hide();
    });
});

$(document).ready(function () {

    var teamGrid = $('.js-team-grid').isotope({
        itemSelector: '.js-team-grid-item',
        layoutMode: 'packery',
        packery: {
            gutter: '.gutter-sizer',
        }

    });


    $('.js-close-details').on('click', function (e) {
        e.preventDefault();
        var details = $(this).parent();
        $('.js-person')
            .removeClass('active')
            .end()
            .toggleClass('active');
        details;
        if (details.hasClass('active')) {
            details
                .removeClass('active')
                .hide();
        } else {
            details
                .siblings('.person-details.active')
                .removeClass('active')
                .hide()
                .end()
                .addClass('active')
                .fadeIn();
        }
        teamGrid.isotope('layout');
    });

    $('.js-person').on('click', function (e) {
        e.preventDefault();
        var details = $(this).next();

        $(this)
            .siblings('.js-person')
            .removeClass('active')
            .end()
            .toggleClass('active');
        details;
        if (details.hasClass('active')) {
            details
                .removeClass('active')
                .hide();
            $('.js-open-details').text('Learn More...').removeClass('red');
            console.log('active true');

        } else {
            details
                .siblings('.person-details.active')
                .removeClass('active')
                .hide()
                .end()
                .addClass('active')
                .fadeIn();
            $('.js-open-details').text('Learn More...').removeClass('red');
            $(this).find('.js-open-details').text('Close').addClass('red');

            console.log('active false');
        }
        teamGrid.isotope('layout');
    });


    $('.nav-tgl').click(function (event) {
        $('.nav-tgl,.header-menu').toggleClass('active');
        $('body').toggleClass('lock');
    });

    $('.header-menu .menu-item-has-children').after().click(function (event) {

        if ($(this).hasClass('open')) {
            $(this).removeClass('open').find('.sub-menu').slideUp();
        } else {
            event.preventDefault();
            $(this).addClass('open').find('.sub-menu').slideDown();
        }

    });

    $('.search .search-toggle').click(function (event) {
        event.preventDefault();
        if ($(this).parent().hasClass('open')) {
            $(this).parent().removeClass('open').find('.search-form').slideUp();
        } else {
            $(this).parent().addClass('open').find('.search-form').slideDown();
        }
        if ($('.user').hasClass('open')) {
            $('.user').removeClass('open').find('.search-form').slideUp();
        }
    });

    $('.user .user-toggle').click(function (event) {
        event.preventDefault();
        if ($(this).parent().hasClass('open')) {
            $(this).parent().removeClass('open').find('.user-form').slideUp();
        } else {
            $(this).parent().addClass('open').find('.user-form').slideDown();
        }
        if ($('.search').hasClass('open')) {
            $('.search').removeClass('open').find('.search-form').slideUp();
        }
    });


    //AJAX loadmore
    var loaddata = {
        'action': 'loadmore',
        'offset': 9,
    };
    if ($(window).width() < 767) {
        loaddata.offset = 4;
    }

    $('#loadmore').click(function (e) {
        e.preventDefault();
        $(this).hide();

        $.ajax({
            url: my_ajax_object.ajax_url,
            data: loaddata,
            type: 'POST',
            success: function (data) {

                $('.publications-all').append(data);
            }
        });

    });

    //AJAX loadmore BOOKS
    var loaddataBooks = {
        'action': 'loadmore-books',
        'offset': 2,
    };

        $('#loadmore-books').click(function (e) {
            e.preventDefault();
            console.log(5555);
            $(this).hide();
            $.ajax({
                url: my_ajax_object.ajax_url,
                data: loaddataBooks,
                type: 'POST',
                success: function (data) {
                    $('.books-reviews').append(data);
                }
            });

        });




    //Accordion
    $('.accordion-list > li > .answer').hide();

    $('.accordion-list > li').click(function () {

        if ($(this).hasClass("active")) {
            $(this).removeClass("active").find(".answer").slideUp();

        } else {
            $(".accordion-list > li.active .answer").slideUp();
            $(".accordion-list > li.active").removeClass("active");
            $(this).addClass("active").find(".answer").slideDown();
        }
        return false;
    });


    //POPUP
    $('.speaker-name').click(function (e) {
        e.preventDefault();
        let $thisID = $(this).attr('href')
        $($thisID).addClass('open');
    });

    $('.popup-close').click(function () {
        $('.popup').removeClass('open');
    });


    //Isotop Filter
    $('.select-years-filter').change(function () {
        let valThis = $(this).val();

        let $next = $('.isotop-filter ' + valThis);
        if ($next.hasClass('hide-on-mobile-filter')) {
            $next.removeClass('hide-on-mobile-filter')
            $('.isotop-filter .interns-all').not($next).each(function () {
                if (!$(this).hasClass('hide-on-mobile-filter')) {
                    $(this).addClass('hide-on-mobile-filter')
                }
            });
        }

    });


    //Ajax filter
    var dateBriefs = {
        'action': 'filter-date',
        'date': '',
    };
    $('.accordion-inner ').click(function (e) {
        $(this).toggleClass('open');
        if ($(this).next('.answer-inner').hasClass('open')) {
            $(this).next('.answer-inner').slideUp().removeClass('open');
        } else {
            $(this).next('.answer-inner').slideDown().addClass('open');
        }
    });
    $('.briefs-filter-button').click(function (e) {
        e.preventDefault();
        if ($(window).width() < 770) {
            $(this).toggleClass('open');

            if ($(this).next('.briefs-filter-accordion').hasClass('open')) {
                $(this).next('.briefs-filter-accordion').slideUp().removeClass('open');
            } else {
                $(this).next('.briefs-filter-accordion').slideDown().addClass('open');
            }

        } else {

            if ($(this).hasClass('open')) {
                $(this).removeClass('open');
            } else {
                $(this).addClass('open');
                $(this).prevAll('.briefs-filter-button').removeClass('open');
                $(this).nextAll('.briefs-filter-button').removeClass('open');
            }

            let thisData = $(this).data('filter-date');
            dateBriefs['date'] = thisData;
            $.ajax({
                url: my_ajax_object.ajax_url,
                data: dateBriefs,
                type: 'POST',
                success: function (data) {

                    $('.brief-filter-ajax').html(data);
                }
            });
        }

    });


    //Ajax filter Case Law Corner
    var dateCaseLaw = {
        'action': 'filter-date-case-law',
        'date': '',
    };
    $('.accordion-inner-case-law ').click(function (e) {
        $(this).toggleClass('open');
        if ($(this).next('.answer-inner-case-law').hasClass('open')) {
            $(this).next('.answer-inner-case-law').slideUp().removeClass('open');
        } else {
            $(this).next('.answer-inner-case-law').slideDown().addClass('open');
        }
    });
    $('.case-law-corner-filter-button').click(function (e) {
        e.preventDefault();
        if ($(window).width() < 770) {
            $(this).toggleClass('open');

            if ($(this).next('.case-law-corner-filter-accordion').hasClass('open')) {
                $(this).next('.case-law-corner-filter-accordion').slideUp().removeClass('open');
            } else {
                $(this).next('.case-law-corner-filter-accordion').slideDown().addClass('open');
            }

        } else {

            if ($(this).hasClass('open')) {
                $(this).removeClass('open');
            } else {
                $(this).addClass('open');
                $(this).prevAll('.case-law-corner-filter-button').removeClass('open');
                $(this).nextAll('.case-law-corner-filter-button').removeClass('open');
            }

            let thisData = $(this).data('filter-date');
            dateCaseLaw['date'] = thisData;
            $.ajax({
                url: my_ajax_object.ajax_url,
                data: dateCaseLaw,
                type: 'POST',
                success: function (data) {

                    $('.case-law-corner-filter-ajax').html(data);
                }
            });
        }

    });


    //Ajax filter Newsletters
    var dateNewsletters = {
        'action': 'filter-date-newsletters',
        'date': '',
        'number': 'all',
    };

    $('.newsletters-filter-button').click(function (e) {
        e.preventDefault();
        if ($(window).width() < 770) {

        } else {

            if ($(this).hasClass('open')) {
                $(this).removeClass('open');
            } else {
                $(this).addClass('open');
                $(this).prevAll('.newsletters-filter-button').removeClass('open');
                $(this).nextAll('.newsletters-filter-button').removeClass('open');
            }

            let thisData = $(this).data('filter-date');
            dateNewsletters['date'] = thisData;
            $.ajax({
                url: my_ajax_object.ajax_url,
                data: dateNewsletters,
                type: 'POST',
                success: function (data) {

                    $('.newsletters-filter-ajax-desctop').html(data);
                }
            });
        }

    });

    $('#newsletters-filter-select').on('change', function (e) {
        e.preventDefault();
        dateNewsletters['number'] = 5;
        $('.newsletters-filter-button').addClass('active-date')
        let thisDate = $(this).val();
        dateNewsletters['date'] = thisDate;

        $.ajax({
            url: my_ajax_object.ajax_url,
            data: dateNewsletters,
            type: 'POST',
            success: function (data) {

                $('.newsletters-filter-ajax-mobile').html(data);
            }
        });


    });
    let $currentYear = new Date().getFullYear();



    //Load more Newsletters
    var loaddataNewsletters = {
        'action': 'loadmore-newsletters',
        'offset': 5,
        'date': $currentYear,
        'number': 5,
    };

    $(document).on('click', '#loadmore-newsletters', function (e) {
        e.preventDefault();
        if ($(window).width() < 767) {
            if ($('#newsletters-filter-select').length) {
                loaddataNewsletters.date = $('#newsletters-filter-select').val();

            }

        }

        console.log(loaddataNewsletters)
        $(this).parent().hide();

        $.ajax({
            url: my_ajax_object.ajax_url,
            data: loaddataNewsletters,
            type: 'POST',
            success: function (data) {

                $('.newsletters-all').append(data);
            }
        });

    });


    //Ajax filter Events
    var dateEvents = {
        'action': 'filter-date-events',
        'date': '',
    };

    $('.events-archive-button').click(function (e) {
        e.preventDefault();
        if ($(window).width() < 770) {

        } else {
            $('.events-archive-button.active-date').removeClass('active-date');
            $(this).addClass('active-date');
            let thisDate = $(this).data('filter-date');
            dateEvents['date'] = thisDate;

            console.log(dateEvents);
            $.ajax({
                url: my_ajax_object.ajax_url,
                data: dateEvents,
                type: 'POST',
                success: function (data) {

                    $('.events-archive-ajax').html(data);
                }
            });
        }

    });

    $('#events-archive-filter').on('change', function (e) {
        e.preventDefault();

        $('.events-archive-button').addClass('active-date')
        let thisDate = $(this).val();
        dateEvents['date'] = thisDate;
        console.log(dateEvents);
        $.ajax({
            url: my_ajax_object.ajax_url,
            data: dateEvents,
            type: 'POST',
            success: function (data) {

                $('.events-archive-ajax').html(data);
            }
        });


    });


    //Load more Events
    var loaddataEvent = {
        'action': 'loadmore-event',
        'offset': 6,
        'date': 2022,
    };

    $(document).on('click', '#loadmore-events', function (e) {
        e.preventDefault();
        if ($(window).width() < 767) {
            if ($('#events-archive-filter').length) {
                loaddataEvent.date = $('#events-archive-filter').val();

            }

        } else {

            if ($('.active-date').length) {
                loaddataEvent.date = $('.active-date').data('filter-date');
                console.log(123);
            }
        }

        $(this).parent().hide();
        console.log(loaddataEvent);
        $.ajax({
            url: my_ajax_object.ajax_url,
            data: loaddataEvent,
            type: 'POST',
            success: function (data) {

                $('.events-archive-all').append(data);
            }
        });

    });


    //Slider Events All
    jQuery('.events-all-slider').each(function () {

        let $prev = jQuery(this).parents('.events-all').find('.prev');
        let $next = jQuery(this).parents('.events-all').find('.next');
        jQuery(this).slick({
            dots: false,
            arrows: true,
            autoplay: false,
            autoplaySpeed: 2000,
            infinite: true,
            prevArrow: $prev,
            nextArrow: $next,
            speed: 500,
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },


                {
                    breakpoint: 769,
                    settings: {
                        variableWidth: true,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                },
            ]

        });
    })


    //Articles Slider

    jQuery(document).ready(function () {

        if ($(window).width() < 1300) {
            if (jQuery(window).width() < 1300) {
                jQuery('.filter-slider').slick({
                    dots: false,
                    arrows: true,
                    prevArrow: false,
                    nextArrow: $('.next-filter-arrow'),
                    autoplay: false,
                    autoplaySpeed: 2000,
                    infinite: true,
                    speed: 500,
                    variableWidth: true,
                    slidesToShow: 2,
                    slidesToScroll: 1,

                });

            }
        }

    });

    jQuery(window).on('resize', function () {
        if (jQuery(window).width() < 1300) {
            jQuery('.filter-slider').slick({
                dots: false,
                arrows: true,
                prevArrow: false,
                nextArrow: $('.next-filter-arrow'),
                autoplay: false,
                autoplaySpeed: 2000,
                infinite: true,
                speed: 500,
                variableWidth: true,
                slidesToShow: 8,
                slidesToScroll: 1,

            });

        } else {
            jQuery('.filter-slider').slick('unslick');

        }
    });


    //Clinick Events Slider
    jQuery('.clinic-events-slider').slick({
        dots: false,
        arrows: true,
        autoplay: false,
        autoplaySpeed: 2000,
        infinite: true,
        prevArrow: $('.prev'),
        nextArrow: $('.next'),
        speed: 500,
        slidesToShow: 2,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },


            {
                breakpoint: 769,
                settings: "unslick"
            },
        ]

    });


    //Events Slider
    jQuery('.events-slider').slick({
        dots: false,
        arrows: true,
        prevArrow: $('.events-prev'),
        nextArrow: $('.events-next'),
        autoplay: false,
        autoplaySpeed: 2000,
        infinite: true,
        speed: 500,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1150,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },


            {
                breakpoint: 576,
                settings: {
                    variableWidth: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            },
        ]

    });


    //Recognition Slider
    if ($(window).width() < 576) {
        if (jQuery(window).width() < 576) {
            jQuery('.recognition-slider').slick({
                dots: false,
                arrows: true,
                prevArrow: $('.prev-button'),
                nextArrow: $('.next-button'),
                autoplay: false,
                autoplaySpeed: 2000,
                infinite: true,
                speed: 500,
                responsive: [

                    {
                        breakpoint: 577,
                        settings: {
                            variableWidth: true,
                            slidesToShow: 2,
                            slidesToScroll: 1,

                        }
                    },
                ]

            });

        }
    }
    jQuery( window ).on( 'resize', function() {
        if (jQuery(window).width() < 576) {
            jQuery('.recognition-slider').slick({
                dots: false,
                arrows: true,
                prevArrow: $('.prev-button'),
                nextArrow: $('.next-button'),
                autoplay: false,
                autoplaySpeed: 2000,
                infinite: true,
                speed: 500,
                responsive: [

                    {
                        breakpoint: 577,
                        settings: {
                            variableWidth: true,
                            slidesToShow: 2,
                            slidesToScroll: 1,

                        }
                    },
                ]

            });

        }
        else{
            jQuery('.recognition-slider').slick('unslick');

        }
    });


    //Gallery Slider
    jQuery('.gallery-slider ').slick({
        dots: true,
        arrows: false,
        autoplay: false,
        autoplaySpeed: 2000,
        infinite: true,

        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1,

    });




})