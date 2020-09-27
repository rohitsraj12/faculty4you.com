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

  // header tab
  $(".header-tab__button").click(function(){
    $(".header-tab__button").removeClass("active-tab");
    $(this).addClass("active-tab");
    var att = $(this).attr("data-header-tab");
    $(".tab-detail").removeClass("active-tab-detail");
    $(".tab-detail").hide();
    $("." + att).fadeIn(500);
    
  });

});

