let slideIndex = 0;
autoSlides();

function autoSlides() {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    
    // Failsafe: if there are no slides, stop the function to prevent errors
    if (slides.length === 0) return; 

    // Hide all slides
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    
    // Increase index to move to the next slide
    slideIndex++;
    
    // Reset back to 1 if we've reached the end
    if (slideIndex > slides.length) {
        slideIndex = 1;
    }
    
    // Show the current slide
    slides[slideIndex - 1].style.display = "block";
    
    // Automatically run this function again every 5 seconds (5000ms)
    setTimeout(autoSlides, 5000); 
}