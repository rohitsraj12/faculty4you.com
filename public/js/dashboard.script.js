$(document).ready(function () {
  var baseURL = "http://localhost/Projects/faculty4you.com/public/";
  
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
  

  //posts update
  $(document).on('click', '.activete_post', function(){
    // alert("clicked");
    var id = $(this).data('id');
    var element = this;
      $.ajax({
        url: baseURL + "dashboard/ajax/posts.php",
        method: "POST",
        data: { id: id},
        success: function (data) {
          // $(".subject-list").slideDown();
          // $(".subject-list").html(data);
          if(data == 1){
          $(element).closest('article').fadeOut();
          alert("post has moved to active section");
        } else {
          alert("failed");
        }
        },
      });
  })

  $(document).on('click', '.deactivete_post', function(){
    // alert("clicked");
    var id = $(this).data('id');
    var element = this;
      $.ajax({
        url: baseURL + "dashboard/ajax/post_deactivate.php",
        method: "POST",
        data: { id: id},
        success: function (data) {
          // $(".subject-list").slideDown();
          // $(".subject-list").html(data);
          if(data == 1){
          $(element).closest('article').fadeOut();
          alert("post has moved to deactive section");
        } else {
          alert("failed");
        }
        },
      });
  })

});

