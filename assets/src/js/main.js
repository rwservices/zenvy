/**
 * File main.js
 * Optimized and fixed version
 */

/**
 * File skip-link-focus-fix.js
 * Helps with accessibility for keyboard only users
 * Learn more: https://git.io/vWdr2
 */
(function () {
    const isIe = /(trident|msie)/i.test(navigator.userAgent);

    if (isIe && document.getElementById && window.addEventListener) {
        window.addEventListener("hashchange", function () {
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

(function ($) {
    'use strict';

    $(document).ready(function () {

        /* Mean Menu */
        let $mobileMeanMenuPosition = $('#mobile-header .col-has-toggle-menu-element').data('meanmenu');
        $('.header-toggle-menu-wrap .menu-top-menu-container').meanmenu({
            meanMenuContainer: '.header-toggle-menu-wrap .main-navigation',
            meanScreenWidth: "1023",
            meanRevealPosition: $mobileMeanMenuPosition,
        });

        if ($(window).width() < 1024) {
            var windowWidth = jQuery(window).width();
            var nav = ".main-navigation";
            if (windowWidth > 1023) {
                jQuery(nav).off('mouseenter', 'li');
                jQuery(nav).off('mouseleave', 'li');
                jQuery(nav).off('click', 'li');
                jQuery(nav).off('click', 'a');
                jQuery(nav).on('mouseenter', 'li', function () {
                    jQuery(this).children('ul').stop().hide();
                    jQuery(this).children('ul').slideDown(400);
                });
                jQuery(nav).on('mouseleave', 'li', function () {
                    jQuery(this).children('ul').stop().slideUp(350);
                });
            }

            // Keyboard navigation for mean menu

            // Opens the sub-menu of a given li and updates ARIA/visual state.
            function openSubmenu($li) {
                $li.find('.mean-expand').addClass('mean-clicked');
                $li.children('.sub-menu, .children').show();
                $li.attr('aria-expanded', 'true');
            }

            // Closes the sub-menu of a given li and updates ARIA/visual state.
            function closeSubmenu($li) {
                $li.find('.mean-expand').removeClass('mean-clicked');
                $li.children('.sub-menu, .children').hide();
                $li.attr('aria-expanded', 'false');
            }

            // Returns true if this li has a child sub-menu.
            function hasChildren($li) {
                return $li.hasClass('menu-item-has-children') || $li.hasClass('page_item_has_children');
            }

            var myEvents = {
                click: function (e) {
                    var $li = jQuery(this);
                    if (hasChildren($li)) {
                        openSubmenu($li);
                    }
                    // Close sibling sub-menus
                    $li.siblings('li').each(function () {
                        closeSubmenu(jQuery(this));
                    });
                },

                // Show child items when an li (or any child anchor) receives focus via Tab,
                // so keyboard users see the sub-menu without needing to press Enter/Space.
                focusin: function () {
                    var $li = jQuery(this);
                    if (hasChildren($li)) {
                        openSubmenu($li);
                    }
                    // Close sub-menus on sibling branches that are no longer focused
                    $li.siblings('li').each(function () {
                        var $sib = jQuery(this);
                        // Only close if focus has fully left the sibling subtree
                        if (!$sib.find(':focus').length) {
                            closeSubmenu($sib);
                        }
                    });
                },

                // Hide child items when focus moves completely out of this li's subtree.
                focusout: function () {
                    var $li = jQuery(this);
                    // setTimeout defers until after the browser has moved focus,
                    // so we can check whether the new activeElement is still inside this li.
                    setTimeout(function () {
                        if (!$li.find(':focus').length && $li[0] !== document.activeElement) {
                            closeSubmenu($li);
                        }
                    }, 0);
                },

                keydown: function (e) {
                    e.stopPropagation();
                    var $li = jQuery(this);

                    // Enter/Space: explicitly toggle sub-menu open (already visible via focusin,
                    // but also supports users who expect Enter to confirm the expand action).
                    if (e.keyCode === 13 || e.keyCode === 32) {
                        if (hasChildren($li)) {
                            e.preventDefault();
                            var isOpen = $li.attr('aria-expanded') === 'true';
                            if (isOpen) {
                                closeSubmenu($li);
                            } else {
                                openSubmenu($li);
                            }
                        }
                    }

                    // Escape: close the current open sub-menu and return focus to parent li.
                    if (e.keyCode === 27) {
                        var $parentLi = $li.closest('ul').closest('li');
                        if ($parentLi.length) {
                            closeSubmenu($parentLi);
                            $parentLi.focus();
                        }
                    }

                    if (e.keyCode == 9) {
                        const $allItems = jQuery('.mean-bar li');
                        const currentIndex = $allItems.index($li);
                        const isLast = currentIndex === ($allItems.length - 1);
                        const isFirst = currentIndex === 0;

                        if (!e.shiftKey && isLast) {
                            jQuery('.meanclose').trigger('click');
                        } else if (e.shiftKey && isFirst) {
                            // Let focus return naturally to the element before the menu
                        }
                    }
                },
            };

            jQuery(document)
                .on('click', '.mean-bar li', myEvents.click)
                .on('focusin', '.mean-bar li', myEvents.focusin)
                .on('focusout', '.mean-bar li', myEvents.focusout)
                .on('keydown', '.mean-bar li', myEvents.keydown);

            // tabIndex=0 keeps all items in natural document tab order
            // without hijacking the global tab sequence (positive integers would do that).
            jQuery('.mean-bar li').each(function () { this.tabIndex = 0; });

            // Set initial ARIA expanded state on all parent items
            jQuery('.mean-bar li').each(function () {
                if (hasChildren(jQuery(this))) {
                    jQuery(this).attr('aria-expanded', 'false');
                }
            });
        }

        // Search functionality
        function Search() {
            const $searchSection = $(".site-header .header-search-section");
            $searchSection.toggleClass("active");

            if ($searchSection.hasClass("active")) {
                setTimeout(function () {
                    $('.header-search-section form input[type="search"]').focus();
                }, 500);
            }

            // FIX: corrected Tab trap — shift+Tab should wrap from FIRST focusable element,
            // not from lastFocusableEl (which was the original bug, letting focus escape).
            const focusableEls = $('.header-search-section input[type="submit"]:not([disabled]), .header-search-section input:not([disabled])');
            const firstFocusableEl = focusableEls[0];
            const lastFocusableEl = focusableEls[focusableEls.length - 1];
            const KEYCODE_TAB = 9;

            $(".header-search-section").off("keydown").on("keydown", function (e) {
                if (e.key === "Tab" || e.keyCode === KEYCODE_TAB) {
                    if (e.shiftKey && document.activeElement === firstFocusableEl) {
                        // Shift+Tab on first element: close search and let focus leave naturally
                        e.preventDefault();
                        $(".header-search-section").removeClass("active");
                    } else if (!e.shiftKey && document.activeElement === lastFocusableEl) {
                        // Tab on last element: close search
                        $(".header-search-section").removeClass("active");
                    }
                }
            });
        }

        // Search toggle handlers
        $(".site-header .search-toggle").on("click", function (e) {
            e.preventDefault();
            Search();
        });

        // FIX: use keydown instead of keyup for ESC — keydown fires before the browser
        // can act on the key, preventing a race condition with focus management.
        $(document).on("keydown", function (e) {
            if (e.keyCode === 27 && $(".header-search-section").hasClass("active")) {
                $(".header-search-section").removeClass("active");
                // Return focus to the toggle button that opened the search
                $(".site-header .search-toggle").focus();
            }
        });

        // Close search when clicking outside
        $("body").on("click", function (evt) {
            if (!$(evt.target).closest(".search-section").length &&
                !$(evt.target).hasClass("search-toggle")) {
                if ($(".search-toggle").hasClass("search-active")) {
                    $(".search-toggle").removeClass("search-active");
                    $(".search-box").slideUp("slow");
                }
            }
        });

        $(".search-toggle").on("click", function (e) {
            e.preventDefault();
            $(".search-box").slideToggle("slow");
            $(this).toggleClass("search-active");
        });

        // Back-to-top button
        const $backToTop = $(".back-to-top");
        $backToTop.hide();

        $backToTop.on("click", function (e) {
            e.preventDefault();
            $("html, body").animate({ scrollTop: 0 }, "slow", function () {
                // FIX: move focus to the top of the page after scrolling so keyboard
                // users don't remain stranded at the bottom of the document.
                $("body").focus();
            });
        });

        $(window).on("scroll", function () {
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
        $(".map-section .box-button").on("click", function (e) {
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
            $eventGallery.imagesLoaded().progress(function () {
                $eventGallery.isotope("layout");
            });
        }

        // ---------------------------------------------------------------------------
        // Site Navigation (from navigation.js)
        // Handles the primary #site-navigation toggle button and TAB/touch support
        // for dropdown menus — kept as vanilla JS so it works independently of jQuery.
        // ---------------------------------------------------------------------------
        ( function() {
            const siteNavigation = document.getElementById( 'site-navigation' );

            // Return early if the navigation doesn't exist.
            if ( ! siteNavigation ) {
                return;
            }

            const button = siteNavigation.getElementsByTagName( 'button' )[ 0 ];

            // Return early if the button doesn't exist.
            if ( 'undefined' === typeof button ) {
                return;
            }

            const menu = siteNavigation.getElementsByTagName( 'ul' )[ 0 ];

            // Hide menu toggle button if menu is empty and return early.
            if ( 'undefined' === typeof menu ) {
                button.style.display = 'none';
                return;
            }

            if ( ! menu.classList.contains( 'nav-menu' ) ) {
                menu.classList.add( 'nav-menu' );
            }

            // Toggle the .toggled class and aria-expanded each time the button is clicked.
            button.addEventListener( 'click', function() {
                siteNavigation.classList.toggle( 'toggled' );
                const isExpanded = button.getAttribute( 'aria-expanded' ) === 'true';
                button.setAttribute( 'aria-expanded', isExpanded ? 'false' : 'true' );
            } );

            // Close the menu when the user clicks outside the navigation.
            document.addEventListener( 'click', function( event ) {
                if ( ! siteNavigation.contains( event.target ) ) {
                    siteNavigation.classList.remove( 'toggled' );
                    button.setAttribute( 'aria-expanded', 'false' );
                }
            } );

            // Close the menu when Escape is pressed and return focus to the toggle button.
            document.addEventListener( 'keydown', function( event ) {
                if ( event.key === 'Escape' && siteNavigation.classList.contains( 'toggled' ) ) {
                    siteNavigation.classList.remove( 'toggled' );
                    button.setAttribute( 'aria-expanded', 'false' );
                    button.focus();
                }
            } );

            // Get all link elements within the menu.
            const links = menu.getElementsByTagName( 'a' );

            // Get all link elements that have child sub-menus.
            const linksWithChildren = menu.querySelectorAll(
                '.menu-item-has-children > a, .page_item_has_children > a'
            );

            // Toggle .focus class on ancestor li elements when a link is focused or blurred,
            // so CSS can show/hide dropdowns for keyboard users.
            for ( const link of links ) {
                link.addEventListener( 'focus', toggleFocus, true );
                link.addEventListener( 'blur',  toggleFocus, true );
            }

            // Toggle .focus class on touch so mobile users can open dropdowns.
            for ( const link of linksWithChildren ) {
                link.addEventListener( 'touchstart', toggleFocus, false );
            }

            /**
             * Adds or removes .focus on the closest li ancestors of the current link.
             * On focus/blur  — walks up the tree toggling .focus on each li until .nav-menu.
             * On touchstart  — toggles .focus only on the direct parent li, closing siblings.
             */
            function toggleFocus( event ) {
                if ( event.type === 'focus' || event.type === 'blur' ) {
                    let self = this;
                    // Walk up through ancestors until we reach .nav-menu.
                    while ( ! self.classList.contains( 'nav-menu' ) ) {
                        if ( 'li' === self.tagName.toLowerCase() ) {
                            self.classList.toggle( 'focus' );
                        }
                        self = self.parentNode;
                    }
                }

                if ( event.type === 'touchstart' ) {
                    const menuItem = this.parentNode;
                    event.preventDefault();
                    // Remove .focus from all siblings, then toggle it on this item.
                    for ( const sibling of menuItem.parentNode.children ) {
                        if ( menuItem !== sibling ) {
                            sibling.classList.remove( 'focus' );
                        }
                    }
                    menuItem.classList.toggle( 'focus' );
                }
            }
        }() );

        // Theme Color Mode
        let toggle = document.getElementById("theme-toggle");
        if (toggle) {

            let storedTheme = localStorage.getItem('theme') || (window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light");
            if (storedTheme)
                document.documentElement.setAttribute('data-theme', storedTheme);

            // FIX: added keydown handler so Enter and Space activate the theme toggle
            // for keyboard users, matching the expected behavior of a button control.
            function applyThemeToggle() {
                let currentTheme = document.documentElement.getAttribute("data-theme");
                let targetTheme = currentTheme === "light" ? "dark" : "light";
                document.documentElement.setAttribute('data-theme', targetTheme);
                localStorage.setItem('theme', targetTheme);
            }

            toggle.onclick = applyThemeToggle;

            toggle.addEventListener('keydown', function (e) {
                if (e.keyCode === 13 || e.keyCode === 32) {
                    e.preventDefault();
                    applyThemeToggle();
                }
            });
        }

    });

})(jQuery);