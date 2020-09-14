var emailExp = /^([a-zA-Z0-9\.-]+)([@])([a-zA-z0-9-]+.)([a-z]{2,8})(.[a-z]{2,8})?$/;
var telExp = /^([0-9]{10})$/;
var textOnlyExp = /^([a-zA-Z]+)$/;
var pincode = /^([0-9]{6})$/;
// var numExp = /^([0-9]{2})$/;

var name = document.getElementsByClassName("name"); //13
var dob = document.getElementsByClassName("dob"); // 66
var image = document.getElementsByClassName("image");
var gender = document.getElementsByClassName("gender"); //79
var email = document.getElementsByClassName("email"); //115
var phone = document.getElementsByClassName("phone"); //119
var city = document.getElementsByClassName("city"); //133
var state = document.getElementsByClassName("state"); //147
var pin = document.getElementsByClassName("pincode"); //160
var teachingExp = document.getElementsByClassName("experience"); //193
var subject = document.getElementsByClassName("subject"); //198
var about = document.getElementsByClassName("about"); //242
var category = document.getElementsByClassName("category");
var type = document.getElementsByClassName("type");
var title = document.getElementsByClassName("title");
var postDetail = document.getElementsByClassName("detail");

var errorIcon = '<i class="fa fa-info-circle" aria-hidden="true"></i>';

// function for error message
function errMsg(input, errorMsg) {
  input.previousElementSibling.innerText = "Please fill " + errorMsg;
  input.style.borderColor = "#ff7575";
}

//trainer form validation
function trainerValidation() {
  //first name
  if (name[0].value == "") {
    errMsg(name[0], "first name");
    return false;
  } else if (!textOnlyExp.test(name[0].value)) {
    errMsg(name[0], "only text");
    return false;
  }

  //lastname
  if (name[1].value == "") {
    errMsg(name[1], "last name");
    return false;
  } else if (!textOnlyExp.test(name[1].value)) {
    errMsg(name[1], "only text");
    return false;
  }

  //image
  // if(image[0].value == ""){
  //     errMsg(image[0], "image");
  //     return false;
  // }

  //gender
  if (
    gender[0].checked == false &&
    gender[1].checked == false &&
    gender[2].checked == false
  ) {
    alert("please select any one");
    return false;
  }

  //email
  if (email[0].value == "") {
    errMsg(email[0], "email id");
    return false;
  } else if (!emailExp.test(email[0].value)) {
    errMsg(email[0], "valid email id");
    return false;
  }

  //phone
  if (phone[0].value == "") {
    errMsg(phone[0], "telephone number");
    return false;
  } else if (!telExp.test(phone[0].value)) {
    errMsg(phone[0], "valid phone number.");
    return false;
  }

  //city
  if (city[0].value == "nooption") {
    errMsg(city[0], "city");
    return false;
  }

  //state
  if (state[0].value == "nooption") {
    errMsg(state[0], "state");
    return false;
  }

  //study category
  if (category[0].checked == false && category[1].checked == false) {
    alert("please select a category category");
    return false;
  }

  //teaching experience

  if (teachingExp[0].value == "") {
    errMsg(teachingExp[0], "teaching experience");
    return false;
  }

  // if(!numExp.test(teachingExp[0].value)){
  //     alert("please enter valid number");
  //     return false;
  // }

  //academic subject

  if (subject[0].value == "nooption") {
    errMsg(subject[0], "subject");
    return false;
  }

  //about me

  if (about[0].value == "") {
    errMsg(about[0], "something about you");
    return false;
  } else {
    return true;
  }
}

//student form validation

function studentValidation() {
  //first name
  if (name[0].value == "") {
    errMsg(name[0], "first name");
    // alert("name");
    return false;
  }

  if (!textOnlyExp.test(name[0].value)) {
    errMsg(name[0], "only text");
    return false;
  }

  //lastname
  if (name[1].value == "") {
    errMsg(name[1], " last name");
    return false;
  }

  if (!textOnlyExp.test(name[1].value)) {
    errMsg(name[1], "only text");
    return false;
  }
  // dob
  // image
  //gender

  if (
    gender[0].checked == false &&
    gender[1].checked == false &&
    gender[2].checked == false
  ) {
    // errMsg(gender[0], "gender");
    alert("gender");
    return false;
  }

  //email
  if (email[0].value == "") {
    errMsg(email[0], "mail id");
    return false;
  } else if (!emailExp.test(email[0].value)) {
    errMsg(email[0], "valid email");
    return false;
  }

  //phone
  if (phone[0].value == "") {
    errMsg(phone[0], " phone number");
    return false;
  } else if (!telExp.test(phone[0].value)) {
    errMsg(phone[0], "valid phone number.");
    return false;
  }

  //city
  if (city[0].value == "nooption") {
    errMsg(city[0], "city");
    return false;
  }

  //state
  if (state[0].value == "nooption") {
    errMsg(state[0], "state");
    return false;
  }

  //pincode
  if ((pin[0], value == "")) {
    errMsg(pin[0], "pincode");
  }
  if (!pincode.test(pin[0].value)) {
    errMsg(pin[0], "valid pincode");
    return false;
  } else {
    return true;
  }
}

//student post validation

function studentPost() {
  if (title[0].value == "") {
    errMsg(title[0], "title");
    return false;
  } else if (title[0].value.length > 30) {
    errMsg(title[0], "less than 30 ltrs");
    return false;
  }
  // detail

  if (postDetail[0].value == "") {
    errMsg(postDetail[0], "your requirement");
    return false;
  } else if (postDetail[0].value.length < 20) {
    errMsg(postDetail[0], "atleast 20 letters");
    return false;
  }
  // study type

  // study category
  if (category[0].value == "nooption") {
    errMsg(category[0], "category");
    return false;
  } else {
    return true;
  }
}

// function for login registration error message
// registration validation
function registration() {
  
  var regName = document.getElementByclass("reg_user");
  var regTel = document.getElementByclass("reg_tel");
  var regEmail = document.getElementByclass("reg_email");
  var regPassword = document.getElementByclass("reg_password");
  var regRepass = document.getElementByclass("reg_repass");
  // var input = document.getElementsByTagName("input");
  function errIcon(input) {
    // input.previousElementSibling.style.display = "block";
    // console.log(i);
    input.style.border = "1px solid #ff7575";
  }
  
  if(regName[0].value == "" || 
  regTel[0].value == "" || 
  regEmail[0].value == "" ||
  regPassword[0].value == "" ||
  regRepass[0].value == ""
) {
    errIcon(regName[0]);
    errIcon(regTel[0]);
    errIcon(regEmail[0]);
    errIcon(regPassword[0]);
    errIcon(regRepass[0]);
    alert("hi");
    return false;
  }

  if(!textOnlyExp.test(regName[0].value)){
    errIcon(regName[0]);
    return false;
  }
  if (!telExp.test(regTel[0].value)) {
    errIcon(regTel[0]);
    return false;
  }

  if (!emailExp.test(regEmail[0].value)) {
    errIcon(regEmail[0]);
    return false;
  }

  //password

  if(regPassword[0].value.length <= 6){
      errIcon(regPassword[0]);
      return false;

  }else if(regPassword[0].value.length >= 15){
      errIcon(regPassword[0]);
      return false;
  }
  if(regPassword[0].value !== regRepass[0].value){
      errIcon(regRepass[0]);
      return false;
  // }else{
  //     return true;
  }
  else {
    return true;
  }
}

//login validation

// function login(){
//     var loginName = document.getElementById("user_name");
//     var loginPassword = document.getElementById("password");

//     if(loginName.value == "" || loginPassword.value == ""){
//         alert("please enter your login user name and password");
//         return false;
//     }else{
//         return true;
//     }
// }
