$(document).ready(function () {
  $(".hamberger").click(function () {
    $(this).toggleClass("is__active");
    $(".header__nav ul").slideToggle(400);
  });

  // testimonial-slider
  $(".section-testimonial .owl-carousel").owlCarousel({
    loop: true,
    margin: 10,
    nav: false,
    autoplay: true,
    autoplayHoverPause: true,
    responsive: {
      582: {
        items: 3,
      },

      0: {
        items: 1,
      },
    },
  });
});
