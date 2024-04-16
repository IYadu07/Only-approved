define(["jquery", "owl-carousel"], function ($, owlCarousel) {
    "use strict";

    jQuery(document).ready(function ($) {
        // flag selector

        updateFlag($("#country-select").val());
        $("#country-select").change(function () {
            updateFlag($(this).val());
        });
        function updateFlag(countryCode) {
            $(".flag").hide();
            $("#" + countryCode + "-flag").show();
        }

        // header carousel

        $(".owl-carousel").owlCarousel({
            loop: true,
            nav: false,
            margin: 60,
            responsive: {
                0: {
                    items: 1,
                    autoplay: true,
                    autoplayTimeout: 3000,
                    autoplayHoverPause: true,
                },
                1363: {
                    items: 3,
                },
            },
        });

        // Header toggle menu

        var targetElement = $(".row-one .pagebuilder-mobile-only").addClass(
            "active"
        );
        function toggleMenu() {
            $(".nav-sections").toggleClass("active");
            $(".nav-sections-items").toggleClass(
                "active",
                $(".nav-sections").hasClass("active")
            );
            $(".hamburger").toggleClass(
                "active",
                $(".nav-sections").hasClass("active")
            );
        }
        function closeMenuOnResize() {
            $(".nav-sections").removeClass("active");
            $(".nav-sections-items").removeClass("active");
            $(".hamburger").removeClass("active");
        }
        $(".navbar-toggler .hamburger").on("click", toggleMenu);
        $(window).on("resize", closeMenuOnResize);
        closeMenuOnResize();

        // Card Styling

        // Function to wrap price-box and product-item-inner within a custom container
        function wrapProductItems(containerClass) {
            $(containerClass + " .product-item").each(function () {
                var priceBox = $(this).find(".price-box");
                var productItemInner = $(this).find(".product-item-inner");

                $(priceBox)
                    .add(productItemInner)
                    .wrapAll('<div class="custom-container"></div>');
            });
        }

        // Apply the function to popular products and newly arrived products
        wrapProductItems(".popular-products");
        wrapProductItems(".newly-arrived-products");
        wrapProductItems(".products.wrapper.grid.products-grid");

        function setMaxHeight(elements, selector, referenceElement) {
            var maxHeight = 0;

            // Reset height to 'auto' before recalculating
            elements.find(selector).height('auto');

            // Loop through each element and find the maximum height
            elements.each(function () {
                if ($(this).is(referenceElement)) return; // Skip the reference element
                var elementHeight = $(this).find(selector).height();
                maxHeight = Math.max(maxHeight, elementHeight);
            });

            // Set the maximum height to all elements
            elements.find(selector).height(maxHeight);
        }

        // Function to update heights on window resize
        function updateHeights() {
            // Update heights for each group

            setMaxHeight($('.products-grid .product-item'), '.product-item-name', $('.products-grid .product-item').first());
        }

        // Initial height setup
        updateHeights();

        // Update heights on window resize
        $(window).resize(function () {
            updateHeights();
        });

        // Footer navbar

        // Function to toggle menu visibility
        function footerToggleMenu(target) {
            $(".navigation-menu").not(target).slideUp();
            $(target).slideToggle();
        }

        // Initially show all menus
        $(".navigation-menu").show();

        // Handle click events on navigation buttons
        $(".navigation-toggle-btn").on("click", function () {
            var target = "#" + $(this).data("target");
            footerToggleMenu(target);
        });

        // Function to handle screen resize
        function handleScreenResize() {
            var screenWidth = $(window).width();

            // Check if the screen width is greater than or equal to 991px
            if (screenWidth >= 991) {
                $(".navigation-menu").show();
            } else {
                // If the screen width is less than 991px, close all menus
                $(".navigation-menu").slideUp();
            }
        }

        // Check screen width on initial load
        handleScreenResize();

        // Check screen width on resize and close all menus if below 991px
        $(window).on("resize", function () {
            // Call the handleScreenResize function on window resize
            handleScreenResize();
        });

        // Product-details-page starts here

        // Find the span element inside the product-info-stock-sku class
        var $stockSpan = $(".product-info-stock-sku .stock span");

        // Check if the text inside the span is 'In stock'
        if ($stockSpan.text().trim() === "In stock") {
            // If 'In stock', change the text color to green
            $stockSpan.css("color", "#2baa67");
        } else {
            // If not 'In stock', change the text color to red
            $stockSpan.css("color", "#e30514");
        }

        // Cart buttons

        $(".dec").on("click", function () {
            var currentQty = parseInt($("#qty").val());
            if (!isNaN(currentQty) && currentQty > 0) {
                $("#qty").val(currentQty - 1);
            }
        });

        $(".inc").on("click", function () {
            var currentQty = parseInt($("#qty").val());
            if (!isNaN(currentQty)) {
                $("#qty").val(currentQty + 1);
            }
        });

        // Hide all drop-menus initially
        $(".drop-menu").hide();

        // Attach click event to all dropdown buttons
        $(".dropdown-btn").click(function () {
            // Toggle the associated drop-menu
            var targetMenu = $($(this).data("target"));
            targetMenu.slideToggle();

            // Rotate the arrow icon 180 degrees
            $(this).find("svg").toggleClass("rotate");

            // Close other open drop-menus
            $(".drop-menu").not(targetMenu).slideUp();
            $("svg").not($(this).find("svg")).removeClass("rotate");
        });
    });
});