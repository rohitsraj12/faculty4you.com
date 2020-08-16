$(document).ready(function () {
  $(".side-nav-toggle").click(function (e) {
    e.preventDefault();
    $(this).parent().find(".side-sub-nav").slideToggle();
    $(this).find("i").toggleClass("fa-angle-down");
    $(this).find("i").toggleClass("fa-angle-up");
  });

  $(".nav__link").click(function (e) {
    e.preventDefault();
    $(this).parent().find(".sub__nav").slideToggle();
    $(this).find("i").toggleClass("fa-angle-down");
    $(this).find("i").toggleClass("fa-angle-up");
  });

  $(".faq__header").click(function () {
    $(this).find("i").toggleClass("fa-angle-down");
    $(this).find("i").toggleClass("fa-angle-up");
    $(this).parent().find("footer").slideToggle(600);
  });
});
