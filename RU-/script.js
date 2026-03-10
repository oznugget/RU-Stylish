
//number 1
//sidebar functions

function showSidebar() {
  const navLinks = document.querySelector(".nav-links");
  if (navLinks) {
    navLinks.style.display = "flex";
  }
}

function closeSidebar() {
  const navLinks = document.querySelector(".nav-links");
  if (navLinks) {
    navLinks.style.display = "none";
  }
}

//message that displays if user is in South Africa or not
const message = document.getElementById("welcomeMessage");
if (message) {
  if (navigator.language === "en-ZA") {
    message.textContent = "Welcome fellow South African! 🇿🇦";
  } else {
    message.textContent =
      "RU Stylish unfortunately only supported in South Africa 🇿🇦";
  }
}

//message that displays if user is offline
const st = document.getElementById("connectionStatus");
if (st) {
  function updateStatus() {
    if (navigator.onLine) {
      st.textContent = "";
    } else {
      st.textContent = " You are offline. Some features may not work. ";
    }
  }

  window.addEventListener("online", updateStatus);
  window.addEventListener("offline", updateStatus);

  updateStatus();
}

//message that displays if cookies are enabled or not
const cookieWarning = document.getElementById("cookieWarning");
if (cookieWarning) {
  if (!navigator.cookieEnabled) {
    cookieWarning.textContent =
      "Cookies have not been enabled. Please enable cookies to use all features of this site.";
  } else {
    cookieWarning.textContent =
      "This site uses cookies to enhance your experience. By continuing to browse, you consent to our use of cookies.";
  }
}
//message that displays user's browser
const browserInfo = document.getElementById("browser");
if (browserInfo) {
  browserInfo.textContent =
    "You are browsing Rustylish using: " + navigator.userAgent;

  //function to copy website link to clipboard
  function copyLink() {
    navigator.clipboard.writeText("https://www.rustylish.com");
    alert("Website link copied!");
  }
}
//__________________________________________________________________________________________________________________

//function for typing effect in about page
//number 3 and 9
//  varForTyping = 0;

let varForTyping = 0;
const elem = document.getElementById("aboutSiteh2");
if (elem) {
  elem.innerHTML = "";
}
function typing() {
  const line = "What is RU Stylish?";
  const elem = document.getElementById("aboutSiteh2");
  if (elem) {
    if (varForTyping < line.length) {
      elem.innerHTML += line.charAt(varForTyping);
      varForTyping++;
      setTimeout(typing, 110); //rerun function
    }
  }
}
window.onload = typing; //exe function after page loaded

//__________________________________________________________________________________________________________________

//footer last modified function
//number 3
document.getElementById("lastModified").innerHTML =
  "Last modified " + document.lastModified;

//__________________________________________________________________________________________________________________

//Number 8 validation of the inputs in forms

//extracts all the labels for the form
const form = document.getElementById("form");
const LastName = document.getElementById("LastName");
const FirstName = document.getElementById("FirstName");
const Password = document.getElementById("Password");
const Cpassword = document.getElementById("Cpassword");

const ErrorMessages = document.getElementById("Err-Messages");
const tcs = document.getElementById("termsSection");
console.log(`form=${form}`);
console.log(`LastName=${LastName}`);
console.log(`FirstName=${FirstName}`);
console.log(`Password=${Password}`);
console.log(`Cpassword=${Cpassword}`);

if (
  form &&
  LastName &&
  FirstName &&
  Password &&
  Cpassword &&
  ErrorMessages
) {
  //event listener for submit button
  form.addEventListener("submit", (e) => {
    e.preventDefault();

    let error = CreateAccErr(LastName, FirstName, Password, Cpassword);

    if (error.length > 0) {
      e.preventDefault();
      ErrorMessages.innerText = error.join(".");
    }
    //checks if there are no errors, then it will show the terms and conditions section and hide the form, then redirect to sign in page after 1 second.
    else {
      form.style.display = "none";
      tcs.style.display = "block";
      setTimeout(() => {
        window.location.href = "SignIn.html";
      }, 1000);
    }
  });

  //validation for create account page

  /**
 * @param {string} FirstNameV 
 * @param {string} LastNameV 
 * @param {string} EmailV 
 * @param {string} PasswordV 
 * @param {string} CpasswordV 
 * @returns {Array} Array of error messages
 */
function CreateAccErr(FirstNameV, LastNameV, EmailV, PasswordV, CpasswordV) {
  let errors = [];

  
  const addError = (element, message) => {
    errors.push(message);
    if (element && element.parentElement) {
      element.parentElement.classList.add("incorrect");
    }
  };

  const nameRegex = "/^[a-zA-Z\s\-]+$/";

  if (!FirstNameV || FirstNameV.trim() === "") {
    addError(FirstName, "First name is required");
  } else if (FirstNameV.length < 2) {
    addError(FirstName, "First name must be at least 2 characters long");
  } else if (!nameRegex.test(FirstNameV)) {
    addError(FirstName, "First name cannot contain special characters or numbers");
  }

  // --- 2. Last Name Validation ---
  if (!LastNameV || LastNameV.trim() === "") {
    addError(LastName, "Last name is required");
  } else if (LastNameV.length < 2) {
    addError(LastName, "Last name must be at least 2 characters long");
  } else if (!nameRegex.test(LastNameV)) {
    addError(LastName, "Last name cannot contain special characters or numbers");
  }

  // --- 3. Email Validation ---
  const emailRegex = "/^[^\s@]+@[^\s@]+\.[^\s@]+$/";

  if (!EmailV || EmailV.trim() === "") {
    addError(Email, "Email is required");
  } else if (!emailRegex.test(EmailV)) {
    addError(Email, "Please enter a valid email address");
  }

  // --- 4. Password Validation ---
  if (!PasswordV || PasswordV === "") {
    addError(Password, "Password is required");
  } else if (PasswordV.length < 8) {
    addError(Password, "Password must be at least 8 characters long");
  } 

  // --- 5. Confirm Password Validation ---
  if (PasswordV !== CpasswordV) {
    addError(Cpassword, "Passwords do not match");
    if (Password && Password.parentElement) {
      Password.parentElement.classList.add("incorrect");
    }
  }

  return errors;
}
}
console.log(`form=${form}`);
//__________________________________________________________________________________________________________________
//Validation for sign in page

//Essentially the same as the create account validation, but only checks for the password and if the admin checkbox is checked, if it is it will check if the first character of the password is a #, if it is it will alert the user that the admin login was successful, this is just a simple check for admin login without a database.
function SignInErr(PasswordV) {
  if (PasswordV) {
    let errors = [];
    if (PasswordV == "" || PasswordV == null) {
      errors.push("Password is required");
      PasswordV.parentElement.classList.add("incorrect");
    }
    if (PasswordV.length < 8) {
      errors.push("Password must be at least 8 characters long");
      PasswordV.parentElement.classList.add("incorrect");
    }

    return errors;
  }
}

//Cannot fully validate the sign in page without a database, but I can add a simple check for admin login.
function adminCheck() {
  const adminCheckbox = document.getElementById("admin");
  if (adminCheckbox) {
    if (adminCheckbox.checked && Password.value[0] === "#") {
      alert("Admin login successful");
    }
  }
}
//__________________________________________________________________________________________________________________

//using navigator to check if java is enabled and browser language

function isJavaEnabled() {
  document.getElementById("enabled").innerHTML = navigator.isJavaEnabled;
}

function whatLanguage() {
  document.getElementById("lang").innerHTML = navigator.language;
}

//__________________________________________________________________________________________________________________

//_number 6 multi coloumns//

const container = document.querySelector(".article_container");
const nextBtn = document.getElementById("nextBtn");

//password input type between text and password, and also toggles the visibility of the icons.
const showIcon = document.querySelector(".fa-eye");
const hideIcon = document.querySelector(".fa-eye-slash");
const passwordInput = document.getElementById("password");

//event listener for show icon, when clicked it will change the password input type to text and toggle the visibility of the icons however the visibility isnt toggled as proposed.
if (showIcon && passwordInput && hideIcon) {
  showIcon.addEventListener("click", () => {
    passwordInput.type = "text";
    hideIcon.classList.remove("hide");
    showIcon.classList.add("hide");
  });
  //event listener for hide icon, when clicked it will change the password input type to password and toggle the visibility of the icons however the visibility isnt toggled as proposed
  hideIcon.addEventListener("click", () => {
    passwordInput.type = "password";
    hideIcon.classList.add("hide");
    showIcon.classList.remove("hide");
  });
}

//___________________________________________________________________________________________________________________

//_number 6 multi coloumns//

function nextPage() {
  const container = document.querySelector(".scroll_window");

  if (container) {
    container.scrollBy({
      left: container.clientWidth,
      behavior: "smooth",
    });
  } else {
    console.error("Could not find the .scroll_window element!");
  }
}

//____________________________________________________________________________________________________________________
//bear animation
//cite: W3 schools
//https://www.w3schools.com/howto/howto_js_animate.asp

var id = null;
function moving() {
  var bear = document.getElementById("misconductBear"); //to move bear specifically
  var pos = 0;
  clearInterval(id);
  id = setInterval(frame, 10); //frame runs every 10ms

  function frame() {
    if (pos == 350) {
      clearInterval(id); //max movement
    } else {
      pos++;
      bear.style.top = pos + "px";
     // bear.style.left = pos + "px"; //diagonal motion with increasing top and left values
    }
  }
}
