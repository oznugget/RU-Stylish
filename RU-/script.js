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

//extracts all the labels for the form
const form =document.getElementById('form')
const LastName =document.getElementById('LastName')
const FirstName =document.getElementById('FirstName')
const Password =document.getElementById('Password')
const Cpassword =document.getElementById('Cpassword')

const ErrorMessages =document.getElementById('Err-Messages');
const tcs = document.getElementById('termsSection');

//event listener for submit button
form.addEventListener('submit',(e) =>{
    e.preventDefault();
    
    let errors= CreateAccErr(LastName.value,FirstName.value,Password.value,Cpassword.value);


    if(errors.length > 0){
        e.preventDefault();
        ErrorMessages.innerText = errors.join(".");
    }
    //checks if there are no errors, then it will show the terms and conditions section and hide the form, then redirect to sign in page after 1 second.
    else{
        form.style.display = 'none';
        tcs.style.display = 'block';
        setTimeout(() => {
        window.location.href = "SignIn.html";}, 1000);

    }
    });



//validation for create account page

function CreateAccErr(LastNameV,FirstNameV,PasswordV,CpasswordV){
    let errors=[];

    //checks if the inputs are empty, if they are it will add an error message to the errors array and add the incorrect class to the input's parent element to show the red border.
    if(FirstNameV ==''||FirstNameV==null){
        errors.push('Firstname is required');
        FirstName.parentElement.classList.add('incorrect');
    }
    //validation for the password.
     if(LastNameV ==''||LastNameV==null){
        errors.push('LastName is required');
        LastName.parentElement.classList.add('incorrect');
    }
    //more validation for the password, checks if the password is at least 8 characters long, if not it will add an error message to the errors array and add the incorrect class to the input's parent element to show the red border.
     if(PasswordV ==''||PasswordV==null){
        errors.push('Password is required');
        Password.parentElement.classList.add('incorrect');
    }

        //checks if the confirm password matches the password, if not it will add an error message to the errors array and add the incorrect class to both the password and confirm password input's parent element to show the red border.
     if(PasswordV !== CpasswordV){
        errors.push('Passwords do not match');
        Cpassword.parentElement.classList.add('incorrect');
        Password.parentElement.classList.add('incorrect');
    }

    return errors;
}

//__________________________________________________________________________________________________________________
//Validation for sign in page


//Essentially the same as the create account validation, but only checks for the password and if the admin checkbox is checked, if it is it will check if the first character of the password is a #, if it is it will alert the user that the admin login was successful, this is just a simple check for admin login without a database.
function SignInErr(PasswordV){
    let errors=[];
        if(PasswordV ==''||PasswordV==null){
        errors.push('Password is required');
        Password.parentElement.classList.add('incorrect');
    }
    if(PasswordV.length < 8){
        errors.push('Password must be at least 8 characters long');
        Password.parentElement.classList.add('incorrect');
    }

    return errors;
}

//Cannot fully validate the sign in page without a database, but I can add a simple check for admin login.
function adminCheck(){
    const adminCheckbox = document.getElementById('admin');
    if(adminCheckbox.checked && Password.value[0] === "#"){
        alert("Admin login successful");
    }
}   

//__________________________________________________________________________________________________________________

//using navigator to check if java is enabled and browser language

function isJavaEnabled(){
    document.getElementById("enabled").innerHTML = navigator.isJavaEnabled;
}

function whatLanguage(){
    document.getElementById("lang").innerHTML = navigator.language;
}

 
//__________________________________________________________________________________________________________________

 
//_number 6 multi coloumns//

const container = document.querySelector('.article_container'); 
const nextBtn = document.getElementById('nextBtn');

function nextPage() {
  if (container && nextBtn) {
    container.scrollLeft += container.clientWidth;
  }
};password input type between text and password, and also toggles the visibility of the icons.
const showIcon = document.querySelector('.fa-eye');
const hideIcon = document.querySelector('.fa-eye-slash');
const passwordInput = document.getElementById('password');

//event listener for show icon, when clicked it will change the password input type to text and toggle the visibility of the icons however the visibility isnt toggled as proposed.
showIcon.addEventListener('click', () => {
    passwordInput.type = 'text';
    hideIcon.classList.remove("hide");
    showIcon.classList.add("hide");
});
//event listener for hide icon, when clicked it will change the password input type to password and toggle the visibility of the icons however the visibility isnt toggled as proposed
hideIcon.addEventListener('click', () => {
    passwordInput.type = 'password';
    hideIcon.classList.add("hide");
    showIcon.classList.remove("hide");
   
});


//___________________________________________________________________________________________________________________

 
//_number 6 multi coloumns//

const container = document.querySelector('.article_container'); 
const nextBtn = document.getElementById('nextBtn');

function nextPage() {
  if (container && nextBtn) {
    container.scrollLeft += container.clientWidth;
  }
};