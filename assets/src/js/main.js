/**
 * File main.js
 * Optimized and fixed version
 */

/**
 * File skip-link-focus-fix.js
 * Helps with accessibility for keyboard only users
 * Learn more: https://git.io/vWdr2
 */
(function() {
    const isIe = /(trident|msie)/i.test(navigator.userAgent);

    if (isIe && document.getElementById && window.addEventListener) {
        window.addEventListener("hashchange", function() {
            let id = location.hash.substring(1),
                element;

            if (!/^[A-z0-9_-]+$/.test(id)) {
                return;
            }

            element = document.getElementById(id);

            if (element) {
                if (!/^(?:a|select|input|button|textarea)$/i.test(element.tagName)) {
                    element.tabIndex = -1;
                }
                element.focus();
            }
        }, false);
    }
})();

(function($) {
    'use strict';

    $(document).ready(function() {
        /* Mean Menu */
        const mobileMeanMenuPosition = $("#mobile-header .col-has-toggle-menu-element").data("meanmenu");
        
        if ($(".header-toggle-menu-wrap .menu-top-menu-container").length) {
            $(".header-toggle-menu-wrap .menu-top-menu-container").meanmenu({
                meanMenuContainer: ".header-toggle-menu-wrap .main-navigation",
                meanScreenWidth: "1023",
                meanRevealPosition: mobileMeanMenuPosition
            });
        }

        // Handle responsive navigation
        function handleResponsiveNav() {
            const windowWidth = $(window).width();
            const nav = ".main-navigation";
            
            if (windowWidth > 1023) {
                $(nav).off("mouseenter", "li");
                $(nav).off("mouseleave", "li");
                $(nav).off("click", "li");
                $(nav).off("click", "a");
                $(nav).on("mouseenter", "li", function() {
                    $(this).children("ul").stop().hide().slideDown(400);
                });
                $(nav).on("mouseleave", "li", function() {
                    $(this).children("ul").stop().slideUp(350);
                });
            }
        }

        handleResponsiveNav();
        $(window).on('resize', handleResponsiveNav);

        // Keyboard navigation for mean menu
        if ($(window).width() < 1024) {
            const myEvents = {
                click(e) {
                    const $this = $(this);
                    if ($this.hasClass("menu-item-has-children")) {
                        $this.find(".mean-expand").addClass("mean-clicked");
                    }
                    $this.siblings("li").find(".mean-expand").removeClass("mean-clicked");
                    $this.children(".sub-menu").show().end().siblings("li").find("ul").hide();
                },
                keydown(e) {
                    e.stopPropagation();
                    if (e.keyCode === 9) {
                        const $meanBarLi = $(".mean-bar li");
                        const currentIndex = $meanBarLi.index($(this));
                        
                        if (!e.shiftKey && currentIndex === $meanBarLi.length - 1) {
                            $(".meanclose").trigger("click");
                        } else if (currentIndex === 0) {
                            $(".meanclose").removeClass("onfocus");
                        } else if (e.shiftKey && currentIndex === 0) {
                            $(".mean-bar ul:first > li:last").focus().blur();
                        }
                    }
                },
                keyup(e) {
                    e.stopPropagation();
                    if (e.keyCode === 9 && !this.cancelKeyup) {
                        this.click.apply(this, arguments);
                    }
                    this.cancelKeyup = false;
                },
                cancelKeyup: false
            };

            $(document)
                .on("click", "li", myEvents.click)
                .on("keydown", "li", myEvents.keydown)
                .on("keyup", "li", myEvents.keyup);
            
            $(".mean-bar li").each(function(i) {
                this.tabIndex = i;
            });
        }

        // Search functionality
        function Search() {
            const $searchSection = $(".site-header .header-search-section");
            $searchSection.toggleClass("active");
            
            if ($searchSection.hasClass("active")) {
                setTimeout(function() {
                    $('.header-search-section form input[type="search"]').focus();
                }, 500);
            }

            const focusableEls = $('.header-search-section input[type="submit"]:not([disabled]), .header-search-section input:not([disabled])');
            const firstFocusableEl = focusableEls[0];
            const lastFocusableEl = focusableEls[focusableEls.length - 1];
            const KEYCODE_TAB = 9;

            $(".header-search-section").off("keydown").on("keydown", function(e) {
                if (e.key === "Tab" || e.keyCode === KEYCODE_TAB) {
                    if (e.shiftKey && document.activeElement === lastFocusableEl) {
                        e.preventDefault();
                        $('.header-search-section form input[type="search"]').focus();
                    } else if (document.activeElement === lastFocusableEl) {
                        $(".header-search-section").removeClass("active");
                    }
                }
            });
        }

        // Search toggle handlers
        $(".site-header .search-toggle").on("click", function(e) {
            e.preventDefault();
            Search();
        });

        // Close search with ESC key
        $(document).on("keyup", function(e) {
            if (e.keyCode === 27 && $(".header-search-section").hasClass("active")) {
                $(".header-search-section").removeClass("active");
            }
        });

        // Close search when clicking outside
        $("body").on("click", function(evt) {
            if (!$(evt.target).closest(".search-section").length && 
                !$(evt.target).hasClass("search-toggle")) {
                if ($(".search-toggle").hasClass("search-active")) {
                    $(".search-toggle").removeClass("search-active");
                    $(".search-box").slideUp("slow");
                }
            }
        });

        $(".search-toggle").on("click", function(e) {
            e.preventDefault();
            $(".search-box").slideToggle("slow");
            $(this).toggleClass("search-active");
        });

        // Back-to-top button
        const $backToTop = $(".back-to-top");
        $backToTop.hide();
        
        $backToTop.on("click", function(e) {
            e.preventDefault();
            $("html, body").animate({ scrollTop: 0 }, "slow");
        });

        $(window).on("scroll", function() {
            const scrollHeight = 400;
            if ($(window).scrollTop() > scrollHeight) {
                $backToTop.fadeIn();
            } else {
                $backToTop.fadeOut();
            }
        });

        // Sticky Sidebar - check if plugin exists
        if (typeof ZENVY !== 'undefined' && ZENVY.sticky_sidebar && $.fn.theiaStickySidebar) {
            $(".has-sticky-sidebar .have-sidebar #primary, .has-sticky-sidebar .have-sidebar #secondary")
                .theiaStickySidebar({
                    additionalMarginTop: 30
                });
        }

        // Initialize sliders with error handling
        function initOwlCarousel(selector, options) {
            if ($(selector).length && typeof $.fn.owlCarousel !== 'undefined') {
                $(selector).owlCarousel(options);
            }
        }

        // Main slider
        initOwlCarousel(".owl-slider-demo", {
            items: 1,
            loop: true,
            nav: true,
            dots: false,
            smartSpeed: 900,
            autoplay: true,
            autoplayTimeout: 5000,
            fallbackEasing: "easing",
            transitionStyle: "fade",
            autoplayHoverPause: true,
            animateOut: "fadeOut"
        });

        // Explore slider
        initOwlCarousel(".explore-slider", {
            items: 1,
            loop: true,
            nav: false,
            dots: false,
            smartSpeed: 900,
            autoplay: true,
            autoplayTimeout: 5000,
            fallbackEasing: "easing",
            transitionStyle: "fade",
            autoplayHoverPause: true,
            animateOut: "fadeOut",
            responsive: {
                0: { items: 1 },
                479: { items: 2 },
                767: { items: 3 },
                991: { items: 4 }
            }
        });

        // Map section toggle
        $(".map-section .box-button").on("click", function(e) {
            e.preventDefault();
            $(".contact-map-wrap").toggleClass("openmap");
        });

        // Isotope gallery initialization
        const $galleryContainer = $(".post-gallery .grid");
        const $eventGallery = $(".epost-gallery .grid");

        if ($galleryContainer.length && typeof $.fn.isotope !== 'undefined') {
            $galleryContainer.isotope({
                itemSelector: ".event-gallery-image-wrap",
                columnWidth: ".event-gallery-image-wrap",
                isFitWidth: true
            });
        }

        if ($eventGallery.length && typeof $.fn.imagesLoaded !== 'undefined' && typeof $.fn.isotope !== 'undefined') {
            $eventGallery.imagesLoaded().progress(function() {
                $eventGallery.isotope("layout");
            });
        }
    });

})(jQuery);