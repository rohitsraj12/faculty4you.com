
var emailExp = /^([a-zA-Z0-9\.-]+)([@])([a-zA-z0-9-]+.)([a-z]{2,8})(.[a-z]{2,8})?$/;
var telExp = /^([0-9]{10})$/;
var textOnlyExp = /^([a-zA-Z]+)$/;
var pincode = /^([0-9]{6})$/;

function validation(){
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
alert("hiii");