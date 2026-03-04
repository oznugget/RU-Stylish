//number 1
//sidebar functions
function showSidebar(){
    const navLinks = document.querySelector('.nav-links');
    navLinks.style.display = 'flex';
}

function closeSidebar(){
    const navLinks = document.querySelector('.nav-links');
    navLinks.style.display = 'none';
}

//message that displays if user is in South Africa or not
const message = document.getElementById("welcomeMessage");

if (navigator.language === "en-ZA") {
    message.textContent = "Welcome fellow South African! 🇿🇦";
} else {
    message.textContent = "RU Stylish unfortunately only supported in South Africa 🇿🇦";
}

//message that displays if user is offline
const status = document.getElementById("connectionStatus");

  function updateStatus() {
    if (navigator.onLine) {
      status.textContent = "";
    } else {
      status.textContent = "⚠️ You are offline. Some features may not work. ⚠️";
    }
  }

  window.addEventListener("online", updateStatus);
  window.addEventListener("offline", updateStatus);

  updateStatus();

  //message that displays if cookies are enabled or not
  const cookieWarning = document.getElementById("cookieWarning");

  if (!navigator.cookieEnabled) {
    cookieWarning.textContent =
      "Cookies have not been enabled. Please enable cookies to use all features of this site.";
  }else{
    cookieWarning.textContent =
        "This site uses cookies to enhance your experience. By continuing to browse, you consent to our use of cookies.";
  }

//message that displays user's browser
const browserInfo = document.getElementById("browser");

  browserInfo.textContent =
    "You are browsing Rustylish using: " + navigator.userAgent;

//function to copy website link to clipboard
function copyLink() {
    navigator.clipboard.writeText("https://www.rustylish.com");
    alert("Website link copied!");
  }

//__________________________________________________________________________________________________________________

//function for typing effect in about page
//number 3 and 9
let varForTyping = 0;
function typing(){
    const line = "What is RU Stylish?";
    
    if(varForTyping < line.length){
        document.getElementById("aboutSiteh2").innerHTML += line.charAt(varForTyping);
        varForTyping++;
        setTimeout(typing, 110); //rerun function
    }
}
window.onload = typing; //exe function after page loaded

//__________________________________________________________________________________________________________________


//footer last modified function
//number 3
document.getElementById("lastModified").innerHTML = "Last modified " + document.lastModified;

//__________________________________________________________________________________________________________________

//Number 8 validation of the inputs in forms
const form =document.getElementById('form')
const LastName =document.getElementById('LastName')
const FirstName =document.getElementById('FirstName')
const Password =document.getElementById('Password')
const Cpassword =document.getElementById('Cpassword')

const ErrorMessages =document.getElementById('Err-Messages');
const tcs = document.getElementById('termsSection');

form.addEventListener('submit',(e) =>{
    e.preventDefault();
    
    let errors= CreateAccErr(LastName.value,FirstName.value,Password.value,Cpassword.value);


    if(errors.length > 0){
        e.preventDefault();
        ErrorMessages.innerText = errors.join(".");
    }
    else{
        form.style.display = 'none';
        tcs.style.display = 'block';
        setTimeout(() => {
        window.location.href = "SignIn.html";}, 1000);

    }
    });



function CreateAccErr(LastNameV,FirstNameV,PasswordV,CpasswordV){
    let errors=[];

    if(FirstNameV ==''||FirstNameV==null){
        errors.push('Firstname is required');
        FirstName.parentElement.classList.add('incorrect');
    }
     if(LastNameV ==''||LastNameV==null){
        errors.push('LastName is required');
        LastName.parentElement.classList.add('incorrect');
    }
     if(PasswordV ==''||PasswordV==null){
        errors.push('Password is required');
        Password.parentElement.classList.add('incorrect');
    }
     if(CpasswordV ==''||CpasswordV==null){
        errors.push('Confirm Password is required');
        Cpassword.parentElement.classList.add('incorrect');
    }
     if(PasswordV !== CpasswordV){
        errors.push('Passwords do not match');
        Cpassword.parentElement.classList.add('incorrect');
        Password.parentElement.classList.add('incorrect');
    }

    return errors;
}

 
//__________________________________________________________________________________________________________________
