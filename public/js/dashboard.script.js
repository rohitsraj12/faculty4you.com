$(document).ready(function () {
  $(".side-nav-toggle").click(function (e) {
    e.preventDefault();
    // $(".side-nav-toggle").parent().find(".side-sub-nav").slideUp(1000);
    // $(".side-nav-toggle").find("i").toggleClass("fa-angle-down");
    // $(".side-nav-toggle").find("i").toggleClass("fa-angle-up");

    $(this).parent().find(".side-sub-nav").slideToggle();
    $(this).find("i").toggleClass("fa-angle-down");
    $(this).find("i").toggleClass("fa-angle-up");
  });

  $(".faq__header").click(function () {
    $(this).find("i").toggleClass("fa-angle-down");
    $(this).find("i").toggleClass("fa-angle-up");
    $(this).parent().find("footer").slideToggle(600);
  });
});
