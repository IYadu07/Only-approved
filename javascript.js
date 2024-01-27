
//Hamberger

function toggleMenu() {
  var hamburger = document.querySelector('.hamburger');
  hamburger.classList.toggle('active');
}

$(".drp-btn").click(function () {
  var $menuContainer = $($(this).attr("data-target"));

  $(".menu-container").not($menuContainer).removeClass("active");

  $(".drp-btn").not(this).removeClass("red");

  $(this).toggleClass("red");

  $menuContainer.toggleClass("active");
});

$(document).on("click", function (e) {
  if (!$(e.target).closest(".drp-btn").length && !$(e.target).closest(".menu-container").length) {
    $(".menu-container").removeClass("active");

    $(".drp-btn").removeClass("red");
  }
});

//Rating system

const stars = document.querySelectorAll(".stars i");
stars.forEach((star, index1) => {
  star.addEventListener("click", () => {
    stars.forEach((star, index2) => {
      index1 >= index2 ? star.classList.add("active") : star.classList.remove("active");
    });
  });
});

//Increment and Decrement

function up(max) {
  document.getElementById("myNumber").value = parseInt(document.getElementById("myNumber").value) + 1;
  if (document.getElementById("myNumber").value >= parseInt(max)) {
    document.getElementById("myNumber").value = max;
  }
}
function down(min) {
  document.getElementById("myNumber").value = parseInt(document.getElementById("myNumber").value) - 1;
  if (document.getElementById("myNumber").value <= parseInt(min)) {
    document.getElementById("myNumber").value = min;
  }
}

$(function () {
  $(".button").click(function (e) {
    e.preventDefault();
    $(".dropdownList").slideToggle(500);
    $(".fa-chevron-down").toggleClass("active");
  });
});

// Carousel

$(document).ready(function () {
  $('.owl-carousel').owlCarousel({
    loop: true,
    margin: 0,
    responsiveClass: true,
    responsive: {
      0: {
        items: 1,
        nav: true,
        autoHeight: true
      },
      400: {
        items: 1,
        nav: true,
        autoHeight: true
      },
      600: {
        items: 1,
        nav: true,
        autoHeight: true
      },
      1000: {
        items: 1,
        nav: false,
        loop: true,
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: false,
        autoHeight: true
      }
    }
  })
});

// Add to cart

$(document).ready(function () {
  $("#addtocart").click(function () {

    if ($('#flavour').val() == 1) {
      $("#addcartmodal").text("Choose a flavour.");
    }
    else {
      if ($("#myNumber").val() == 0) {
        $("#addcartmodal").text("Enter quantity.");
      }
      else {

        if($("#myNumber").val() == 1)
        {
          $("#addcartmodal").text($("#myNumber").val() + " item has been added to cart.");
        }
        else
        {
          $("#addcartmodal").text($("#myNumber").val() + " items has been added to cart.");
        }
      }
    }
  });
});