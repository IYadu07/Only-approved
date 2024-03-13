define([
    'jquery',
    'Magento_Customer/js/customer-data',
    'Magento_Checkout/js/model/quote',
    'Magento_Checkout/js/model/shipping-rate-registry',
    'Magento_Checkout/js/action/get-totals'
], function ($, customerData, mainQuote, rateReg, getTotalsAction) {
    'use strict';
    console.log("js loaded");
    // Function to bind event listener
    function bindEventListeners() {
        $('.input-text.qty').on('change', function () {
            var form = $('form#form-validate');
            quantityUpd(form);
        });
        $('.action.action-delete').on('click', function () {
            console.log("click event");
            // var form = $('form#form-validate');
            customDlt();
        });
    }

    // Initial binding of event listener
    bindEventListeners();

    function quantityUpd(form) {
        $.ajax({
            url: form.attr('action'),
            data: form.serialize(),
            showLoader: true,
            success: function (res) {
                var result = $($.parseHTML(res)).find("#form-validate");
                var sections = ['cart'];
                $("#form-validate").replaceWith(result);
                customerData.reload(sections, true);
                setTimeout(() => { shippingReload(); }, 1000);
                getTotalsAction([], $.Deferred());
                bindEventListeners();
            },
            error: function (xhr, status, error) {
                console.error("Error:", error);
            }
        });
    }
    function shippingReload() {
        var address = mainQuote.shippingAddress();
        rateReg.set(address.getKey(), null);
        rateReg.set(address.getCacheKey(), null);
        mainQuote.shippingAddress(address);
    }

    function customDlt() {
        console.log("function trigger");
        var cartItemId = $(".action.action-delete").data("cart-item-id");

        $.ajax({
            url: '/OnlyApproved/CustomQty/Cart/Delete',
            type: 'POST',
            data: 'cart-item-id=' + cartItemId,
            success: function (res) {
                console.log("Ajax request successful");

                // Remove the item's HTML elements from the form
                $('.action-delete[data-cart-item-id="' + cartItemId + '"]').closest('.cart.item').remove();

                // Check if there are any remaining items in the cart
                if ($('.cart.item').length === 0) {
                    // If no items left, replace the cart container with the cart-empty content
                    $('.cart-container').replaceWith('<div class="cart-empty"><p>You have no items in your shopping cart.</p><p>Click <a href="http://localhost/OnlyApproved/index.php/">here</a> to continue shopping.</p></div>');
                }

                // Reload customer data and other necessary actions
                var sections = ['cart'];
                customerData.reload(sections, true);
                setTimeout(() => { shippingReload(); }, 1000);
                getTotalsAction([]);
                bindEventListeners();
            },
            error: function (xhr, status, error) {
                // Handle error 
                console.error(xhr.responseText);
            }
        });

    }
});
