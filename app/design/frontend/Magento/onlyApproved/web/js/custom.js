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

        function setProductItemHeight(containerSelector) {
            var maxHeight = 0;
            $(containerSelector + " .product-item").height("auto");
            $(containerSelector + " .product-item").each(function () {
                var currentHeight = $(this).height();
                if (currentHeight > maxHeight) {
                    maxHeight = currentHeight;
                }
            });
            $(containerSelector + " .product-item").height(maxHeight);
        }
        setProductItemHeight(".popular-products");
        setProductItemHeight(".newly-arrived-products");
        $(window).on("resize", function () {
            setProductItemHeight(".popular-products");
            setProductItemHeight(".newly-arrived-products");
        });

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

        // Iterate over each .product-item-info
        $(".product-item-info").each(function () {
            // Find the nearest ancestor with class .popular-products
            var popularProductsContainer = $(this).closest(".popular-products");

            // Calculate the height of the current .product-item-info relative to .popular-products
            var productInfoHeight = $(this).height();
            var productItemDetailsHeight = productInfoHeight - 280;
            $(".product-item-details").height(productItemDetailsHeight);
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

        // Hide all drop-menus initially
        $('.drop-menu').hide();

        // Attach click event to all dropdown buttons
        $('.dropdown-btn').click(function () {
            // Toggle the associated drop-menu
            var targetMenu = $($(this).data('target'));
            targetMenu.slideToggle();

            // Rotate the arrow icon 180 degrees
            $(this).find('svg').toggleClass('rotate');
            
            // Close other open drop-menus
            $('.drop-menu').not(targetMenu).slideUp();
            $('svg').not($(this).find('svg')).removeClass('rotate');
        });
    });
});