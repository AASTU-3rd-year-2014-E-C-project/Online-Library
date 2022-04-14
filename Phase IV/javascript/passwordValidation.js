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

//check password confirmation
confirmPassword.onfocus = function() {
 
    changeBorder.classList.remove("pswStyle_onblur");
    changeBorder.classList.add("pswStyle_focus");
  
}
confirmPassword.onblur = function() {
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
//validation2

var newPassword2 = document.getElementById("newPsw2");
var confirmPassword2 = document.getElementById("confirmPsw2");
var changeBorder2 = document.getElementById("pswBorder2");
var letter2 = document.getElementById("letter2");
var capital2 = document.getElementById("capital2");
var number2 = document.getElementById("number2");
var length2 = document.getElementById("length2");


newPassword2.onfocus = function() {
    //don't display if all condition fulfill
    if (letter2.className === 'valid2'&&number2.className === 'valid2'&&capital2.className === 'valid2'&&length2.className === 'valid2')
       document.getElementById("message2").style.display = "none";
   else
       document.getElementById("message2").style.display = "block";

}
newPassword2.onblur = function() {
  document.getElementById("message2").style.display = "none";
}

// When the user starts to type something inside the password field
newPassword2.onkeyup = function() {


  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(newPassword2.value.match(lowerCaseLetters)) {  
    letter2.classList.remove("invalid2");
    letter2.classList.add("valid2");
  } else {
    letter2.classList.remove("valid2");
    letter2.classList.add("invalid2");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(newPassword2.value.match(upperCaseLetters)) {  
    capital2.classList.remove("invalid2");
    capital2.classList.add("valid2");
  } else {
    capital2.classList.remove("valid2");
    capital2.classList.add("invalid2");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(newPassword2.value.match(numbers)) {  
    number2.classList.remove("invalid2");
    number2.classList.add("valid2");
  } else {
    number2.classList.remove("valid2");
    number2.classList.add("invalid2");
  }
  
  // Validate length
  if(newPassword2.value.length >= 8) {
    length2.classList.remove("invalid2");
    length2.classList.add("valid2");
  } else {
    length2.classList.remove("valid2");
    length2.classList.add("invalid2");
  }

  //don't display if all condition fulfill
  if (letter2.className === 'valid2'&&number2.className === 'valid2'&&capital2.className === 'valid2'&&length2.className === 'valid2')
  document.getElementById("message2").style.display = "none";

}

//check password confirmation
confirmPassword2.onfocus = function() {
 
    changeBorder2.classList.remove("pswStyle_onblur2");
    changeBorder2.classList.add("pswStyle_focus2");
  
}
confirmPassword2.onblur = function() {
  changeBorder2.classList.remove("pswStyle_focus2");
  changeBorder2.classList.add("pswStyle_onblu2");
  
}

confirmPassword2.onkeyup = function() {
  if(confirmPassword2.value.match(newPassword2.value)){
      document.getElementById("confirmPsw2").style.border = "3px solid green";
  }
  else{
    document.getElementById("confirmPsw2").style.border = "3px solid red";
  }
}