
var emailExp = /^([a-zA-Z0-9\.-]+)([@])([a-zA-z0-9-]+.)([a-z]{2,8})(.[a-z]{2,8})?$/;
var telExp = /^([0-9]{10})$/;
var textOnlyExp = /^([a-zA-Z]+)$/;
var pincode = /^([0-9]{6})$/;

// testimonial
var testimonial = document.getElementsByClassName("testimonial__textarea");

function validation(){
    if(testimonial[0].value == ""){
        alert("please enter testimonial data");
        return false;
        
    }else if(testimonial[0].value.length < 30){
        alert("not less than 30 letters");

        return false;
    } else{
        return true;
    }
}

//subject
var sub = document.getElementsByClassName("subject");
var subject_cat = document.getElementsByClassName("sub-cat");

    function subject_validation(){
        if(sub[0].value == ""){
            alert("please input subject");
            return false;
        }else if(!textOnlyExp.test(sub[0].value)){
            alert("enter only text");
            return false;
        }

        if(subject_cat[0].value == "nooption"){
            alert("plz choose any one");
            return false;
        }
        else {
            return true;
        }
    }

var city = document.getElementsByClassName("city__input");
var state = document.getElementsByClassName("select-state");
var newstate = document.getElementsByClassName("new-state");

function cityValidation(){
    if(city[0].value == ""){
        alert("enter your city");
        return false;
    }else if(!textOnlyExp.test(city[0].value)){
        alert("enter only text");
        return false;
    }
    if(state[0].value == "nooption"){
        alert("select a state");
        return false;
    }else{
        return true;
    }
}

function stateValidation(){
    
    if(newstate[0].value == ""){
        alert("enter your state");
        return false;
    }else if(!textOnlyExp.test(newstate[0].value)){
        alert("only text input");
        return false;
    }else{
        return true;
    }
}
var qstn = document.getElementById("question");
var qstncategory = document.getElementsByClassName("category");
var ans = document.getElementById("answer");

function faqValidation(){
    if(qstn.value == ""){
        alert("enter ur question");
        return false;
    }
    if(ans.value == ""){
        alert("fill answer");
        return false;
    }
    if(qstncategory[0].checked == false || qstncategory[1].checked == false || qstncategory[2].checked == false){
        alert("you have to chose one");
        return false;
    }else{
        return true;
    }
}