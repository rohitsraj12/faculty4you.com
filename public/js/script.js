var baseURL = "http://localhost/Projects/faculty4you.com/public/";
// var baseURL = "http://facultyforyou.com/";

$(document).ready(function () {
  $(".hamberger").click(function () {
    $(this).toggleClass("is__active");
    $(".header__nav").slideToggle(400);
    $(".header-top .wrap-container").slideToggle(600);
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
      1024: {
        items: 2,
      },
      582: {
        items: 2,
      },

      0: {
        items: 1,
      },
    },
  });

  // teacher-slider
  $(".section__teacher-slider .owl-carousel").owlCarousel({
    loop: true,
    margin: 10,
    nav: false,
    autoplay: true,
    autoplayHoverPause: true,
    responsive: {
      1200: {
        items: 4,
      },
      1024: {
        items: 2,
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

  $(".tab button").click(function (event){
    event.preventDefault();
    var selectAtt = $(this).attr("data-testimonial");

    $(".tab button").removeClass(".active");
    $(this).addClass(".active");

  })

  //tab search

  $(".form-tab").click(function () {
    // console.log("hi");
    var selectAtt = $(this).attr("data-form");

    $(".form-tab").addClass("not-active");
    $(this).removeClass("not-active");

    // $(".search-form").removeClass(".hide");
    $(".search-form").hide();
    $("." + selectAtt).fadeIn();
  });

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

  // buy button function
  //Add a JQuery click event handler onto our checkbox.
  $(".agree__input").click(function () {
    //If the checkbox is checked.
    if ($(this).is(":checked")) {
      //Enable the submit button.
      var membership_id = $(this).attr("id");
      $(this)
        .closest(".member-block")
        .find(".buy__button")
        .attr("href", "payment_method.php?membership_type=" + membership_id);
      // alert("hi");
    } else {
      //If it is not checked, disable the button.
      // $(".buy__button").attr("disabled", true);
      $(this).closest(".member-block").find(".buy__button").attr("href", "#");
    }
  });


  // ajax city state selecter
  function loadData(type, col_id) {
    $.ajax({
      url: baseURL + "aj/load_location.php",
      type: "POST",
      data: {
        type: type,
        id: col_id,
      },
      success: function (data) {
        if (type == "cityName") {
          $(".city").html(data);
          console.log(data);
        } else {
          $(".state").append(data);
        }
      },
    });
  }
  // console.log(loadData());
  loadData();

  $("#state").change(function () {
    var state = $("#state").val();

    loadData("cityName", state);
  });

  // ajax study category -> subject category -> subject
  function loadSubject(type, col_id) {
    $.ajax({
      url: baseURL + "aj/load_subject.php",
      type: "POST",
      data: {
        type: type,
        id: col_id,
      },
      success: function (data) {
        if (type == "subject") {
          $(".subject").html(data);
          console.log(data);
        } else if (type == "subjectCat") {
          $(".subject_category").html(data);
          console.log(data);
        } else {
          $(".study-category").append(data);
          console.log(data);
        }
      },
    });
  }
  // console.log(loadData());
  loadSubject();

  $("#study_category").change(function () {
    var studyCategory = $("#study_category").val();

    // loadSubject("subject", subjectCategory);
    loadSubject("subjectCat", studyCategory);
  });

  $("#subject_category").change(function () {
    var subjectCategory = $("#subject_category").val();

    loadSubject("subject", subjectCategory);
    // loadSubject("subjectCat", studyCategory);
  });
});
