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

  // FAQ
  $(".faq__header").click(function () {
    $(this).find("i").toggleClass("fa-angle-down");
    $(this).find("i").toggleClass("fa-angle-up");
    $(this).parent().find("footer").slideToggle(600);
  });

  $(".student-details").hide();
  $(".active-member-btn").click(function () {
    $(".student-details").slideUp();
    $(this).closest(".student-post").find(".student-details").slideToggle();
  });



  // update profile
  
var emailExp = /^([a-zA-Z0-9\.-]+)([@])([a-zA-z0-9-]+.)([a-z]{2,8})(.[a-z]{2,8})?$/;
var telExp = /^([0-9]{10})$/;
var textOnlyExp = /^([a-zA-Z]+)$/;
var pincode = /^([0-9]{6})$/;

function updateProfile(){
    var name = document.getElementsByClassName("name"); //13
    var dob = document.getElementsByClassName("dob"); // 66
    var image = document.getElementsByClassName("image");
    var gender = document.getElementsByClassName("gender"); //79
    var email = document.getElementsByClassName("email"); //115
    var phone = document.getElementsByClassName("phone"); //119

    //first name
    if(name[0].value == ""){
        alert("input first name");
        return false;
    }else if(!textOnlyExp.test(name[0].value)){
        alert("enter only text");
        return false;
    }

    //lastname

    if(name[1].value == ""){
        alert("input first name");
        return false;
    }else if(!textOnlyExp.test(name[1].value)){
        alert("enter only text");
        return false;
    }

    //gender

    if(gender[0].checked == false || gender[1].checked == false || gender[2].checked == false){
        alert("please select any one");
        return false;
    }
    if(email[0].value == ""){
        alert("please enter mail id");
        return false;
    }else if(!emailExp.test(email[0].value)){
        alert("enter valid email");
        return false;
    }
    if(phone[0].value == ""){
        alert("enter phone number");
        return false;
    }
    else {
        return true;
    }




    //dob
    //image


}

});
