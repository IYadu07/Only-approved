// $(document).ready(function() {
//     // Function to adjust product item heights
//     function adjustProductItemHeights() {
//         var maxHeight = 0;

//         $('.product-item').each(function() {
//             $(this).height('auto'); // Reset height to auto before recalculating
//             var currentHeight = $(this).height();
//             maxHeight = Math.max(maxHeight, currentHeight);
//         });

//         $('.product-item').height(maxHeight);
//     }

//     // Initial adjustment on document ready
//     adjustProductItemHeights();

//     // Adjust heights on window resize
//     $(window).resize(function() {
//         adjustProductItemHeights();
//     });
// });

$(document).ready(function () {

    //full height for image group cards
    var targetElement = $(".row-one .pagebuilder-mobile-only");
    targetElement.css("height", "100%");
});