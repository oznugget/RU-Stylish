function showSidebar(){
    const navLinks = document.querySelector('.nav-links');
    navLinks.style.display = 'flex';
}

function closeSidebar(){
    const navLinks = document.querySelector('.nav-links');
    navLinks.style.display = 'none';
}

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
