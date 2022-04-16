var signUP=document.getElementById("sUP");
var signIN=document.getElementById("sIN");
var form=document.getElementById("popup");
var signInBtn=document.getElementById("toSignInBtn");
var signUpBtn=document.getElementById("toSignUpBtn");

function signinSwap(){
   signIN.style.display="block";
   signUP.style.display="none";
   signInBtn.style.borderTop="2px solid green";
   signInBtn.style.background="white";  
   signUpBtn.style.backgroundColor="#e2e0e0";   
   signUpBtn.style.borderTop="none";
}
function signupSwap(){
    signUP.style.display="block";
    signIN.style.display="none";
    signUpBtn.style.borderTop="2px solid green";
    signUpBtn.style.background="white";
    signInBtn.style.borderTop="none";
    signInBtn.style.backgroundColor="#e2e0e0";

 }
 function closePopUp(){
    form.style.display="none";
 }

 
function showPopUp() {
     form.style.display="block";
     signinSwap();
}
function showPassword() {
   var x = document.getElementById("myPassword");
   if (x.type == "password") 
      x.type = "text";
   else 
       x.type = "password";

}