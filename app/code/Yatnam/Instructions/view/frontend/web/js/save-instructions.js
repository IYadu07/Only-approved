define(["jquery"], function ($) {
    "use strict";

    $(document).ready(function () {
        console.log("working until now");

        $(document).on("click", ".action.primary.checkout", function (event) {
            event.preventDefault();
            var deliveryInstructions = $(".admin__control-textarea").val();
            console.log(deliveryInstructions);
            $("#delivery_instructions_display").text(deliveryInstructions);
            $.ajax({
                url: '/yatnam/instructions/index/savedeliveryinstructions',
                type: "POST",
                dataType: "json",
                data: JSON.stringify({
                    delivery_instructions: deliveryInstructions,
                }),
                contentType: "application/json",
                success: function (response) {
                    if (response.success) {
                        console.log(
                            "Delivery instructions saved successfully."
                        );
                    } else {
                        console.error(
                            "Failed to save delivery instructions:",
                            response.error
                        );
                    }
                },
                error: function (xhr, status, error) {
                    console.error("AJAX request failed:", error);
                },
            });
        });
    });
});


// $('#co-shipping-form').submit(function(event){
//     console.log("Form submitted!");
// event.preventDefault();

// var deliveryInstructions = $('#delivery_instructions').val();
// console.log(deliveryInstructions);

// $('#delivery_instructions_display').text(deliveryInstructions);

// $.ajax({
//     url: '/Yatnam/Instructions/Observer/SaveDeliveryInstructionsObserver.php',
//     type: 'POST',
//     dataType: 'json',
//     data: JSON.stringify({ delivery_instructions: deliveryInstructions }), // Stringify the data
//     contentType: 'application/json', // Set content type to JSON
//     success: function(response) {
//         if (response.success) {
//             console.log('Delivery instructions saved successfully.');
//         } else {
//             console.error('Failed to save delivery instructions:', response.error);
//         }
//     },
//     error: function(xhr, status, error) {
//         console.error('AJAX request failed:', error);
//     }
// });
// });
