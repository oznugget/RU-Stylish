const form =document.getElementById('form')
const LastName =document.getElementById('LastName')
const FirstName =document.getElementById('FirstName')
const Password =document.getElementById('Password')
const Cpassword =document.getElementById('Cpassword')

const ErrorMessages =document.getElementById('Err-Messages')

form.addEventListener('submit',(e) =>{
    let errors = []

    //Check weather we are in signUp or Login page
    if(FirstName){
        errors=CreateAccErr(LastName.value,FirstName.value,Password.value,Cpassword.value){

    
    }else{
        errors=SigErr(username.value,Password.value)
    }

       if(errors.length > 0){
        e.preventDefault()
        ErrorMessages.innerText = errors.join(".")
    }


    //e.preventDefault()

})



function CreateAccErr(LastName,FirstName,Password,Cpassword){
    let errors=[]

    if(FirstName ==''||FirstName==null){
        errors.push('Firstname is required')
        FirstName.parentElement.claassList.add('incorrect')
    }
     if(LastName ==''||LastName==null){
        errors.push('LastName is required')
        FirstName.parentElement.claassList.add('incorrect')
    }
     if(Password ==''||Password==null){
        errors.push('Password is required')
        Password.parentElement.claassList.add('incorrect')
    }
     if(Cpassword ==''||Cpassword==null){
        errors.push('Confirm Password is required')
        Cpassword.parentElement.claassList.add('incorrect')
    }
     if(Password ==''||Cpassword==null){
        errors.push('Firstname is required')
        Cpassword.parentElement.claassList.add('incorrect')
    }



    return errors;
}




