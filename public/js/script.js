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
      1200: {
        items: 3,
      },
      582: {
        items: 2,
      },

      0: {
        items: 1,
      },
    },
  });

  /*******************************

      tabs
  
  *********************************/

  // tab
  $(".tab button").click(function (event) {
    event.preventDefault();
    var selectAtt = $(this).attr("data-post");

    $(".tab button").removeClass("active");
    $(this).addClass("active");

    $(".post__cat").hide();
    $("." + selectAtt).fadeIn();
  });

  $(".teacher").hide();
  $(".student").hide();

  // tab
  $(".tab button").click(function (event) {
    event.preventDefault();
    var selectAtt = $(this).attr("data-faq");

    $(".tab button").removeClass("active");
    $(this).addClass("active");

    $(".section-faq").hide();
    $("." + selectAtt).fadeIn();
  });

  $(".study-type").click(function (event) {
    event.preventDefault();
    var selectAtt = $(this).attr("data-study-type");

    $(".study-type").find("a").removeClass("text-danger");
    $(this).find("a").addClass("text-danger");

    $(".wrap-study-type").hide();
    $("." + selectAtt).fadeIn();

    console.log(selectAtt);
  });

  //tab search
  // console.log("hi");

  // $(".form-tab").click(function () {
  //   console.log("hi");
  //   var selectAtt = $(this).attr("data-form");

  //   $(".form-tab").addClass("not-active");
  //   $(this).removeClass("not-active");

  //   // $(".search-form").removeClass(".hide");
  //   $(".search-form").hide();
  //   $("." + selectAtt).fadeIn();
  // });

  // FAQ
  $(".faq__header").click(function () {
    $(this).find("i").toggleClass("fa-angle-down");
    $(this).find("i").toggleClass("fa-angle-up");
    $(this).parent().find("footer").slideToggle(600);
  });

  $(".active-member-btn").click(function () {
    $(".student-details").slideUp();
    $(this).closest(".student-post").find(".student-details").slideToggle();
  });

  // $("").click(function () {
  //   $("container").toggleClass("right-panel-active");
  // });
});
