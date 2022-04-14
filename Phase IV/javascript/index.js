function openForm1() {           
    document.getElementById("Box1").style.display = "block";
    document.getElementById("forgetTag").style.display = "none";
    document.getElementById("popup").style.display = "block";
}

function openForm2() {           
    document.getElementById("Box1").style.display = "none";
    document.getElementById("Box2").style.display = "block";
}

function openForm3() {           
    document.getElementById("Box2").style.display = "none";
    document.getElementById("Box3").style.display = "block";
}

function closeForm() {
    document.getElementById("Box3").style.display = "none";
    document.getElementById("Box2").style.display = "none";
    document.getElementById("Box1").style.display = "none";
    document.getElementById("forgetTag").style.display = "inline";
    document.getElementById("popup").style.display = "none";
}

////
function showPassword() {
    var x = document.getElementById("myPassword");
    if (x.type == "password") 
       x.type = "text";
    else 
        x.type = "password";

}

function openRegister(){
    var card= document.getElementById("card");
    var element = document.getElementById("top");
    element.scrollIntoView();
    card.style.transform="rotateY(-180deg)";  
    
    var temp = document.getElementById("list");
       temp.classList.remove("signup");
       temp.classList.add("login"); 
       document.getElementById("list").innerHTML="LOG IN"   
       
       temp = document.getElementById("cn");
       temp.classList.remove("signup");
       temp.classList.add("login"); 
       document.getElementById("cn").innerHTML="LOG IN"  
}

function openLogin(){

    var element = document.getElementById("top");
    element.scrollIntoView();
    card.style.transform="rotateY(0deg)"; 
    
    var temp = document.getElementById("list");
       temp.classList.remove("login");
       temp.classList.add("signup");  
       document.getElementById("list").innerHTML="SIGN UP"

       temp = document.getElementById("cn");
       temp.classList.remove("login");
       temp.classList.add("signup");  
       document.getElementById("cn").innerHTML="JOIN US"

}

function change(n){
    let temp;

  if(n===1)  
      temp = document.getElementById("list");
  else
     temp = document.getElementById("cn");

  if (temp.className === "signup")
        openRegister()
  else 
      openLogin();
}

