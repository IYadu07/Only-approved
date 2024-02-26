define([
    'jquery',
    'Magento_Customer/js/customer-data',
    'Magento_Checkout/js/model/quote',
    'Magento_Checkout/js/model/shipping-rate-registry',
    'Magento_Checkout/js/action/get-totals'
], function ($, customerData, mainQuote, rateReg, getTotalsAction) {
    'use strict';

    // Function to bind event listener
    function bindEventListeners() {
        $('.input-text.qty').on('change', function () {
            var form = $('form#form-validate');
            quantityUpd(form);
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
});
