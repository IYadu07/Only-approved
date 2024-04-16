define([
    'jquery',
    'jquery/jquery.cookie',
    'mage/cookies'
], function ($) {
    'use strict';

    $(document).ready(function () {
        var buttonClickedFlag = sessionStorage.getItem('button_clicked_flag');

        if (buttonClickedFlag) {
            // Check if the product data cookie exists and display modal if it does
            var productDataString = $.mage.cookies.get('product_data_cookie');
            if (productDataString) {
                try {
                    // Parse the product data from the cookie
                    var productData = JSON.parse(productDataString);

                    // Build modal content with product names, images, and prices
                    var modalContent = '';

                    // Add hyperlink to comparison list
                    modalContent += '<a href="http://localhost/OnlyApproved/index.php/catalog/product_compare/">Comparison List</a>';

                    $.each(productData, function (productId, productInfo) {
                        // Log product information
                        console.log('Product ID: ' + productId);
                        console.log('Product Name: ' + productInfo.name);
                        console.log('Product Price: ' + productInfo.price);
                        console.log('Product Image URL: ' + productInfo.image_url);

                        modalContent += '<div class="product-item">';
                        modalContent += '<img src="' + productInfo.image_url + '" alt="' + productInfo.name + '">';
                        modalContent += '<div class="product-info">';
                        modalContent += '<h3>' + productInfo.name + '</h3>';
                        modalContent += '<p>Price: ' + productInfo.price + '</p>';
                        modalContent += '<a href="#" class="remove-product" data-product-id="' + productId + '">Remove</a > '; // Add remove button
                        modalContent += '</div>';
                        modalContent += '</div>';
                    });

                    // Update modal content with all product information
                    $('#my-modal .main-content').html(modalContent);

                    // Open the modal
                    $('#my-modal').show();

                    // Close the modal after 4 seconds
                    setTimeout(function () {
                        $('#my-modal').hide();
                    }, 4000);
                } catch (error) {
                    console.error('Error parsing product data from cookie:', error);
                }
            } else {
                console.log('Product data not found in the cookie.');
            }

            // Clear the flag from session storage
            sessionStorage.removeItem('button_clicked_flag');
        }

        $('.action.tocompare').on('click', function () {
            // Set a flag in session storage indicating that the button has been clicked
            sessionStorage.setItem('button_clicked_flag', 'true');

            // Reload the page
            window.location.reload();
        });

        // Close modal when close button or outside modal is clicked
        $('.modal .close, .modal').on('click', function () {
            $('#my-modal').hide();
        });

        // Prevent modal from closing when clicking inside modal content
        $('#my-modal .modal-content').on('click', function (event) {
            event.stopPropagation();
        });

        // Remove product from compare list when remove button is clicked
        $('.remove-product').on('click', function () {
            var productIdToRemove = $(this).data('product-id');
            var $productItem = $(this).closest('.product-item'); // Store a reference to the product item

            // Retrieve form key value
            var formKey = $('input[name="form_key"]').val();
            console.log('formkey:' + formKey + 'id:' + productIdToRemove);
            // AJAX request to remove the product
            $.ajax({
                url: '/OnlyApproved/index.php/catalog/product_compare/remove',
                type: 'POST',
                dataType: 'json',
                data: {
                    product: productIdToRemove,
                    form_key: formKey
                },
                success: function (response) {
                    // Handle success response if needed
                    console.log(response);
                    console.log('ajax success');
                    // Remove the product item from the DOM
                    $productItem.remove();

                    // Check if all products have been removed
                    if ($('.product-item').length === 0) {
                        $('#my-modal').hide();
                    }
                },
                error: function (xhr, status, error) {
                    // Handle error if needed
                    console.error(xhr.responseText);
                    console.log('ajax fail');
                }
            });
            return false; // Prevent default anchor behavior
        });
    });
});
