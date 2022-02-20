var newPassword = document.getElementById("newPsw");
var confirmPassword = document.getElementById("confirmPsw");
var changeBorder = document.getElementById("pswBorder");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");


newPassword.onfocus = function() {
    //don't display if all condition fulfill
    if (letter.className === 'valid'&&number.className === 'valid'&&capital.className === 'valid'&&length.className === 'valid')
       document.getElementById("message").style.display = "none";
   else
       document.getElementById("message").style.display = "block";

}
newPassword.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
newPassword.onkeyup = function() {


  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(newPassword.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(newPassword.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(newPassword.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(newPassword.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }

  //don't display if all condition fulfill
  if (letter.className === 'valid'&&number.className === 'valid'&&capital.className === 'valid'&&length.className === 'valid')
  document.getElementById("message").style.display = "none";

}

//check password confirmaconfirmPassword.onblur = function() {
  changeBorder.classList.remove("pswStyle_focus");
  changeBorder.classList.add("pswStyle_onblur");
  
}

confirmPassword.onkeyup = function() {
  if(confirmPassword.value.match(newPassword.value)){
      document.getElementById("confirmPsw").style.border = "1px solid green";
  }
  else{
    document.getElementById("confirmPsw").style.border = "1px solid red";
  }
}
