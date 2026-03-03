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
    else{form.style.display = 'none';
        if(tcs.style){}
        tcs.style.display = 'block';
    }
    }


   

);



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
