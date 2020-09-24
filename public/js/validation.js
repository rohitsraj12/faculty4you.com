var emailExp = /^([a-zA-Z0-9\.-]+)([@])([a-zA-z0-9-]+.)([a-z]{2,8})(.[a-z]{2,8})?$/;
var telExp = /^([0-9]{10})$/;
var textOnlyExp = /^([a-zA-Z]+)$/;
var pincode = /^([0-9]{6})$/;
var tranG = /^([0-9]{12})$/;
// var numExp = /^([0-9]{2})$/;


//trainer form validation
function trainerValidation() {
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

// function for error message
function errMsg(input, errorMsg) {
  input.previousElementSibling.innerText = "Please fill " + errorMsg;
  input.style.borderColor = "#ff7575";
}
  //first name
  if (name[0].value == "") {
    errMsg(name[0], "first name");
    return false;
  }
  
  if (!textOnlyExp.test(name[0].value)) {
    errMsg(name[0], "only text");
    return false;
  }

  //lastname
  if (name[1].value == "") {
    errMsg(name[1], "last name");
    return false;
  } 
  if (!textOnlyExp.test(name[1].value)) {
    errMsg(name[1], "only text");
    return false;
  }

  //image
  // if(image[0].value == ""){
  //     errMsg(image[0], "image");
  //     return false;
  // }

  //gender
  // if (
  //   gender[0].checked == false &&
  //   gender[1].checked == false &&
  //   gender[2].checked == false
  // ) {
  //   gender[0].previousElementSibling.innerText = "Please fill " + errorMsg;
  //   gender[0].style.borderColor = "#ff7575";
  //   return false;
  // }

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
  if (category[0].value == "nooption") {
    errMsg(category[0], "category");
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
  var name = document.getElementsByClassName("name"); //13
var dob = document.getElementsByClassName("dob"); // 66
var image = document.getElementsByClassName("image");
var gender = document.getElementsByClassName("gender"); //79
var email = document.getElementsByClassName("email"); //115
var phone = document.getElementsByClassName("phone"); //119
var city = document.getElementsByClassName("city"); //133
var state = document.getElementsByClassName("state"); //147
var pin = document.getElementsByClassName("pincode"); //160
// var teachingExp = document.getElementsByClassName("experience"); //193
// var subject = document.getElementsByClassName("subject"); //198
// var about = document.getElementsByClassName("about"); //242
// var category = document.getElementsByClassName("category");
// var type = document.getElementsByClassName("type");
// var title = document.getElementsByClassName("title");
// var postDetail = document.getElementsByClassName("detail");

// function for error message
function errMsg(input, errorMsg) {
  input.previousElementSibling.innerText = "Please fill " + errorMsg;
  input.style.borderColor = "#ff7575";
}
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
  var category = document.getElementsByClassName("category");
  var type = document.getElementsByClassName("type");
  var title = document.getElementsByClassName("title");
  var postDetail = document.getElementsByClassName("detail");
  var subject = document.getElementsByClassName("subject");
  
  
// function for error message
function errMsg(input, errorMsg) {
  input.previousElementSibling.innerText = "Please fill " + errorMsg;
  input.style.borderColor = "#ff7575";
}

  if (title[0].value == "") {
    errMsg(title[0], "title");
    return false;
  } else if (title[0].value.length > 30) {
    errMsg(title[0], "less than 30 ltrs");
    return false;
  }
  
  // study category
  if (category[0].value == "nooption") {
    errMsg(category[0], "category");
    return false;
  }
  //subjects
  if(subject[0].value == "nooption"){
    errMsg(subject[0], "subject");
    return false;
  }
  
  // study type
  if(type[0].value == "nooption"){
    errMsg(type[0], "study type");
    return false;
  }
  // detail

  if (postDetail[0].value == "") {
    errMsg(postDetail[0], "your requirement");
    return false;
  } else if (postDetail[0].value.length < 20) {
    errMsg(postDetail[0], "atleast 20 letters");
    return false;
  } else {
    return true;
  }
}
// transaction validation
function transactionTypeOne(){
  var transactionId = document.getElementsByClassName("transaction_id");
  var phone = document.getElementsByClassName("phone");

// function for error message
function errMsg(input, errorMsg) {
  input.previousElementSibling.innerText = "Please " + errorMsg;
  input.style.borderColor = "#ff7575";
}

  if(transactionId[0].value === "" || phone[0].value === ""){
    errMsg(transactionId[0], "enter valid transaction id");
    errMsg(phone[0], "enter phone number");
    return false;
  }
  
  if(transactionId[0].value === ""){
    errMsg(transactionId[0], "enter valid transaction id");
    return false;
  }
  
  if(!tranG.test(transactionId[0].value)){
    errMsg(transactionId[0], "enter valid transaction id");
    return false;
  }
  
  if(phone[0].value === ""){
    errMsg(phone[0], "enter phone number");
    return false;
  }
  if(!telExp.test(phone[0].value)){
    errMsg(phone[0], "enter valid phone number");
    return false;
  }else{
    return true;
  }

}

// phone pe transaction validation
function transactionTypeTwo(){
  var transactionId = document.getElementsByClassName("phonepe_transaction_id");
  // function for error message
  function errMsg(input, errorMsg) {
    input.previousElementSibling.innerText = "Please " + errorMsg;
    input.style.borderColor = "#ff7575";
  }
  
  if(transactionId[0].value === ""){
    errMsg(transactionId[0], "enter valid transaction id");
    // alert("hi");

    return false;
  }else {
    return true;
  }
}