define(["jquery"], function ($) {
    "use strict";

    $(document).ready(function () {
        $(document).on("click", ".action.primary.checkout", function (event) {
            event.preventDefault();
            var deliveryInstructions = $(".admin__control-textarea").val();
            $("#delivery_instructions_display").text(deliveryInstructions);
            $.ajax({
                url: "/OnlyApproved/Instructions/Index/Index",
                type: "POST",
                dataType: "json",
                data: {
                    delivery_instructions: deliveryInstructions,
                },
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
