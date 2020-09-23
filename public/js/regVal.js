var emailExp = /^([a-zA-Z0-9\.-]+)([@])([a-zA-z0-9-]+.)([a-z]{2,8})(.[a-z]{2,8})?$/;
var telExp = /^([0-9]{10})$/;
 // var span = document.getElementsByClassName("error-icon");
var errorIcon = '<i class="fa fa-info-circle" aria-hidden="true"></i>';

// message error function for validation
function errIcon(input) {
  input.style.border = "1px solid #ff7575";
  input.previousElementSibling.style.display = "block";
}

/***************************
 * 
 *    registration validation
 * 
*************************** */
function registration(){
  var reg = document.getElementsByClassName("reg");
  var regPwd = document.getElementsByClassName("regPwd");
  
    if(reg[0].value == "" || reg[1].value == "" || reg[2].value == "" ||  reg[3].value == "" || reg[4].value == "") {
      errIcon(reg[0]);
      errIcon(reg[1]);
      errIcon(reg[2]);
      errIcon(reg[3]);
      errIcon(reg[4]);
      return false;
    }

    
    if(reg[0].value == ""){
      errIcon(reg[0]);
      return false;
  }
    
    /******** telephone validation ************
     * 
     *    no empty value 
     *    telephone validation(10 digit)
     * 
    *******************************************/
    if(reg[1].value == ""){
      errIcon(reg[1]);
      return false;
    }

    if (!telExp.test(reg[1].value)) {
      errIcon(reg[1]);
      return false;
    }

    // email validation
    if(reg[2].value == ""){
      errIcon(reg[2]);
      return false;
    }

    if (!emailExp.test(reg[2].value)) {
      errIcon(reg[2]);
      return false;
    }
  
    /******  password ********
     * 
     * min-length 6
     * max length 15
     * should match 2 password field
     * 
    **********************/
    if(reg[3].value == ""){
      errIcon(reg[3]);
        return false;
    }

    if(reg[3].value.length <= 6){
        errIcon(reg[3]);
        return false;
  
    } else if(reg[3].value.length >= 15){
        errIcon(reg[3]);
        return false;
    }

    if(reg[4].value == ""){
      errIcon(reg[4]);
        return false;
    }

    if(regPwd[0].value !== regPwd[1].value){
        errIcon(regPwd[0]);
        errIcon(regPwd[1]);
        return false;
    }
  
    else {
      return true;
    }
  }
  


/***************************
 * 
 *   login validation
 * 
*************************** */

function logIn(){
  var login = document.getElementsByClassName("login");
  var logpwd = document.getElementsByClassName("loginpass");
  
    if(login[0].value == ""){
      errIcon(login[0]);
     return false;
    }
    if(logpwd[0].value == ""){
      errIcon(logpwd[0]);
      return false;
    }else{
        return true;
    }
}
