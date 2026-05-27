/**
 * File main.js
 * Optimized and improved version
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
            const id = location.hash.substring(1);
            
            if (!/^[A-z0-9_-]+$/.test(id)) return;
            
            const element = document.getElementById(id);
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

    // Constants
    const SELECTORS = {
        menuContainer: '.menu-top-menu-container',
        navigation: '.main-navigation',
        header: '.site-header',
        searchSection: '.header-search-section',
        searchToggle: '.search-toggle',
        backToTop: '.back-to-top',
        primary: '#primary',
        secondary: '#secondary'
    };

    const KEY_CODES = {
        TAB: 9,
        ESC: 27
    };

    const SCROLL_THRESHOLD = 400;

    /**
     * Initialize Mean Menu
     */
    function initMeanMenu() {
        if ($(SELECTORS.menuContainer).length) {
            $(SELECTORS.menuContainer).meanmenu({
                meanMenuContainer: SELECTORS.navigation,
                meanScreenWidth: "992",
                meanRevealPosition: "right"
            });
        }
    }

    /**
     * Handle search functionality with improved accessibility
     */
    function initSearch() {
        const $searchSection = $(SELECTORS.searchSection);
        
        function toggleSearch() {
            $searchSection.toggleClass("active");
            
            if ($searchSection.hasClass("active")) {
                setTimeout(() => {
                    $('.header-search-section form input[type="search"]').focus();
                }, 500);
                setupKeyboardNavigation();
            } else {
                $searchSection.off("keydown");
            }
        }

        function setupKeyboardNavigation() {
            const focusableEls = $('.header-search-section input[type="submit"]:not([disabled]), .header-search-section input:not([disabled])');
            const firstFocusableEl = focusableEls[0];
            const lastFocusableEl = focusableEls[focusableEls.length - 1];
            
            if (!focusableEls.length) return;

            $searchSection.off("keydown").on("keydown", function(e) {
                if (e.key === "Tab" || e.keyCode === KEY_CODES.TAB) {
                    if (e.shiftKey && document.activeElement === lastFocusableEl) {
                        e.preventDefault();
                        $('.header-search-section form input[type="search"]').focus();
                    } else if (document.activeElement === lastFocusableEl) {
                        $searchSection.removeClass("active");
                    }
                }
            });
        }

        // Search toggle handler
        $(SELECTORS.searchToggle).on("click", function(e) {
            e.preventDefault();
            toggleSearch();
        });
    }

    /**
     * Handle global search close events
     */
    function initGlobalSearchHandlers() {
        // Close with ESC key
        $(document).on("keyup", function(e) {
            if (e.keyCode === KEY_CODES.ESC && $(SELECTORS.searchSection).hasClass("active")) {
                $(SELECTORS.searchSection).removeClass("active");
            }
        });

        // Close when clicking outside
        $("body").on("click", function(evt) {
            const $target = $(evt.target);
            if (!$target.closest(".search-section").length && !$target.hasClass("search-toggle")) {
                if ($(".search-toggle").hasClass("search-active")) {
                    $(".search-toggle").removeClass("search-active");
                    $(".search-box").slideUp("slow");
                }
            }
        });

        // Original search toggle (legacy support)
        $(".search-toggle").on("click", function(e) {
            e.preventDefault();
            $(".search-box").slideToggle("slow");
            $(this).toggleClass("search-active");
        });
    }

    /**
     * Initialize back to top button
     */
    function initBackToTop() {
        const $backToTop = $(SELECTORS.backToTop);
        
        if (!$backToTop.length) return;
        
        $backToTop.hide();

        $backToTop.on("click", function(e) {
            e.preventDefault();
            $("html, body").animate({ scrollTop: 0 }, "slow");
        });

        $(window).on("scroll", function() {
            const shouldShow = $(window).scrollTop() > SCROLL_THRESHOLD;
            $backToTop[shouldShow ? 'fadeIn' : 'fadeOut']();
        });
    }

    /**
     * Initialize sticky sidebar
     */
    function initStickySidebar() {
        const hasStickySidebar = typeof ZENVY !== 'undefined' && ZENVY.sticky_sidebar;
        const hasTheiaPlugin = $.fn.theiaStickySidebar;
        
        if (hasStickySidebar && hasTheiaPlugin) {
            $(".has-sticky-sidebar .have-sidebar #primary, .has-sticky-sidebar .have-sidebar #secondary")
                .theiaStickySidebar({
                    additionalMarginTop: 30
                });
        }
    }

    /**
     * Initialize Owl Carousel with error handling
     */
    function initOwlCarousel(selector, options) {
        if ($(selector).length && typeof $.fn.owlCarousel !== 'undefined') {
            $(selector).owlCarousel(options);
        }
    }

    /**
     * Initialize all carousels
     */
    function initCarousels() {
        const commonOptions = {
            loop: true,
            smartSpeed: 900,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            animateOut: "fadeOut"
        };

        // Main slider
        initOwlCarousel(".owl-slider-demo", {
            ...commonOptions,
            items: 1,
            nav: true,
            dots: false,
            transitionStyle: "fade"
        });

        // Explore slider
        initOwlCarousel(".explore-slider", {
            ...commonOptions,
            items: 1,
            nav: false,
            dots: false,
            responsive: {
                0: { items: 1 },
                479: { items: 2 },
                767: { items: 3 },
                991: { items: 4 }
            }
        });
    }

    /**
     * Initialize map section toggle
     */
    function initMapToggle() {
        $(".map-section .box-button").on("click", function(e) {
            e.preventDefault();
            $(".contact-map-wrap").toggleClass("openmap");
        });
    }

    /**
     * Initialize Isotope gallery
     */
    function initIsotopeGallery() {
        const $galleryContainer = $(".post-gallery .grid");
        const $eventGallery = $(".epost-gallery .grid");

        // Main gallery
        if ($galleryContainer.length && typeof $.fn.isotope !== 'undefined') {
            $galleryContainer.isotope({
                itemSelector: ".event-gallery-image-wrap",
                columnWidth: ".event-gallery-image-wrap",
                isFitWidth: true
            });
        }

        // Event gallery with imagesLoaded
        if ($eventGallery.length && typeof $.fn.imagesLoaded !== 'undefined' && typeof $.fn.isotope !== 'undefined') {
            $eventGallery.imagesLoaded().progress(() => {
                $eventGallery.isotope("layout");
            });
        }
    }

    /**
     * Initialize theme color mode
     */
    function initThemeMode() {
        const toggle = document.getElementById("theme-toggle");
        if (!toggle) return;

        // Get stored theme or system preference
        const storedTheme = localStorage.getItem('theme');
        const systemPrefersDark = window.matchMedia("(prefers-color-scheme: dark)").matches;
        const initialTheme = storedTheme || (systemPrefersDark ? "dark" : "light");
        
        document.documentElement.setAttribute('data-theme', initialTheme);

        toggle.onclick = () => {
            const currentTheme = document.documentElement.getAttribute("data-theme");
            const targetTheme = currentTheme === "light" ? "dark" : "light";
            
            document.documentElement.setAttribute('data-theme', targetTheme);
            localStorage.setItem('theme', targetTheme);
        };
    }

    /**
     * Initialize all modules when document is ready
     */
    $(document).ready(function() {
        initMeanMenu();
        initSearch();
        initGlobalSearchHandlers();
        initBackToTop();
        initStickySidebar();
        initCarousels();
        initMapToggle();
        initIsotopeGallery();
        initThemeMode();
    });

})(jQuery);