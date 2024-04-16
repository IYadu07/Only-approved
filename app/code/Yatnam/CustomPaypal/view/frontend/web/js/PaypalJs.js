define([
    'jquery',
    'knockout'
], function ($) {
    'use strict';

    $(document).ready(function () {
        // Check if any radio button is selected on page load
        checkRadioSelection();

        $(window).on('load', function () {
            checkRadioSelection();
        });


        setTimeout(function () {
            $('.radio').click(function () {
                console.log("change of state");
                checkRadioSelection();
            });
        }, 4000);


        // Add click event listener to the overlay to show alert
        $(document).on('click', '.paypal-overlay, .paypal-overlay::after', function () {
            console.log("click");
            alert('Please select a shipping rate.');
        });

        // Function to check if any radio button is selected
        function checkRadioSelection() {
            console.log("checkRadioSelection");

            if ($('div#cart-totals .shipping').length == 0) {
                $('.paypal-overlay-minicart').addClass('show-after');
                console.log("show");
            } else {
                $('.paypal-overlay-minicart').removeClass('show-after');
                console.log("not show");
            }
        }
    });

});
