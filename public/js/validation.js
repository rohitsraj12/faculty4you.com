
var emailExp = /^([a-zA-Z0-9\.-]+)([@])([a-zA-z0-9-]+.)([a-z]{2,8})(.[a-z]{2,8})?$/;
var telExp = /^([0-9]{10})$/;
var textOnlyExp = /^([a-zA-Z]+)$/;
var pincode = /^([0-9]{6})$/;
var numExp = /^([0-9]{2})$/;

function validation(){
    var name = document.getElementsByClassName("name"); //13
    var dob = document.getElementsByClassName("dob"); // 66
    var image = document.getElementsByClassName("image");
    var gender = document.getElementsByClassName("gender"); //79
    var email = document.getElementsByClassName("email"); //115
    var phone = document.getElementsByClassName("phone"); //119
    var city = document.getElementsByClassName("city");//133
    var state = document.getElementsByClassName("state"); //147
    var pin = document.getElementsByClassName("pincode"); //160
    var teachingExp = document.getElementsByClassName("experience"); //193
    var subject = document.getElementsByClassName("subject"); //198
    var about = document.getElementsByClassName("about");//242
    //

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

    if(gender[0].checked == false && gender[1].checked == false && gender[2].checked == false){
        alert("please select any one");
        return false;
    }

    //email
    if(email[0].value == ""){
        alert("please enter mail id");
        return false;
    }else if(!emailExp.test(email[0].value)){
        alert("enter valid email");
        return false;
    }

    //phone
    if(phone[0].value == ""){
        alert("enter phone number");
        return false;
    }else if(!telExp.test(phone[0].value)){
        alert("enter valid phone number.");
        return false;
    }
    
    //city
    if(city[0].value == "nooption"){
        alert("please choose city");
        return false;
    }

    //state
    if(state[0].value == "nooption"){
        alert("please choose state");
        return false;
    }


    //study category
    
    //teaching experience

    if(teachingExp[0].value == ""){
        alert("please  enter your teaching experience");
        return false;
    }
    
    if(!numExp.test(teachingExp[0].value)){
        alert("please enter valid number");
        return false;
    }

    //academic subject

    if(subject[0].value == "nooption"){
        alert("please enter subject");
        return false;
    }

    //about me

    if(about[0].value == ""){
        alert("please enter something about you");
        return false;   
    }


    //pincode

    if(!pincode.test(pin[0].value)){
        alert("please enter valid pincode");
        return false;
    }
    else {
        return true;
    }




    //dob
    //image


}


//student post validation

function studentPost(){
    var title = document.getElementsByClassName("title");
    var postDetail = document.getElementsByClassName("detail");


    if(title[0].value == ""){
        alert("please enter post title");
        return false;
    }else if(title[0].value.length > 30){
        alert("not more than 30 ltrs");
        return false;
    }
// about 

if(postDetail[0].value == ""){
    alert("please enter your requirement");
    return false;

}else if(postDetail[0].value.length < 20){
    alert("you need to write atleast 20 letters");
    return false;
}

    else{
        return true;
    }
}

// registration validation

function registration(){
    var name = document.getElementById("user_name");
    var email = document.getElementById("email");
    var tel = document.getElementById("telephone");
    var password = document.getElementById("password");
    var repass = document.getElementById("re-password");

    if(name.value == "" || email.value == "" || tel.value == "" || password == "" || repass.value == ""){
        alert("please fill all fields");
        return false;
    }else if(!emailExp.test(email.value)){
        alert("please enter valid mail id");
        return false;
    }else if(!telExp.test(tel.value)){
        alert("please enter valid phone number");
        return false;
    }
    //password

    if(password.value.length <= 6){
        alert("password should be atleast 6 letters");
        return false;

    }else if(password.value.length >= 15){
        alert("password should be less than 15 characters");
        return false;
    }else if(password.value !== repass.value){
        alert("password is not matching");
        return false;
    }else{
        return true;
    }
}

//login validation

// function login(){
//     var name = document.getElementById("user_name");
//     var password = document.getElementById("password");

//     if(name.value == "" || password.value == ""){
//         alert("please enter your login user name and password");
//         return false;
//     }else{
//         return true;
//     }
// }