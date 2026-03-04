function showSidebar(){
    const navLinks = document.querySelector('.nav-links');
    navLinks.style.display = 'flex';
}

function closeSidebar(){
    const navLinks = document.querySelector('.nav-links');
    navLinks.style.display = 'none';
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

 
//_number 6 multi coloumns//

const container = document.querySelector('.article_container'); 
const nextBtn = document.getElementById('nextBtn');

function nextPage() {
  if (container && nextBtn) {
    container.scrollLeft += container.clientWidth;
  }
};