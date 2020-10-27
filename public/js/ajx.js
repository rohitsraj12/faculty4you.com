$(document).ready(function () {
  var baseURL = "http://localhost/Projects/faculty4you.com/public/";
  // var baseURL = "http://facultyforyou.com/";

  // load subjects on search field
  $(".search_subject").keyup(function () {
    var query = $(this).val();
    // alert(query);
    if (query != "") {
      $.ajax({
        url:  baseURL + "aj/load_data.php",
        method: "POST",
        data: { subject: query },
        success: function (data) {
          $(".subject-list").slideDown();
          $(".subject-list").html(data);
          console.log(data);
        },
      });
    } else {
      $(".subject-list").slideUp();
      $(".subject-list").html();
    }
  });
  $(".subject-list").on("click", "li", function () {
    // alert('hi');
    $(".search_subject").val($(this).text());
    $(".subject-list").slideUp();
  });

  // load city on search field
  $(".city_name").keyup(function () {
    var query = $(this).val();
    // alert(query);
    if (query != "") {
      $.ajax({
        url: baseURL + "aj/load_data.php",
        method: "POST",
        data: { city: query },
        success: function (data) {
          $(".city_list").slideDown();
          $(".city_list").html(data);
        },
      });
    } else {
      $(".city_list").slideUp();
      $(".city_list").html();
    }
  });
  $(".city_list").on("click", "li", function () {
    var i = $(this).attr("data-city-id");
    $(".city_name").val($(this).text());
    $(".hidden_filed").attr({
      value: i,
    });
    $(".city_list").slideUp();
  });
});
