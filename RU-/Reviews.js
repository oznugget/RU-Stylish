

// Array to store reviews 
let reviews = [
    {
        username: "Sarah Johnson",
        rating: 7,
        comment: "Amazing website! Very easy to use and great selection of items.",
        date: new Date().toLocaleDateString()
    },
    {
        username: "Mike Smith",
        rating: 6,
        comment: "Good experience overall. Shipping was fast.",
        date: new Date().toLocaleDateString()
    }
];

// Function to display all reviews
function displayReviews() {
    const allReviewsSection = document.querySelector('.AllReviews');
    if (!allReviewsSection) return;

    let reviewsHTML = '<h2>Customer Reviews</h2>';
    
  
    reviews.forEach(review => {
        //  star icons based on rating
        let starsHTML = '';
        for (let i = 1; i <= 7; i++) {
            if (i <= review.rating) {
                starsHTML += '<i class="fas fa-star" style="color: #008080;"></i>';
            } else {
                starsHTML += '<i class="far fa-star" style="color: #008080;"></i>';
            }
        }
        
        reviewsHTML += `
            <div class="review-card">
                <div class="user-header">
                    <img class="icon" src="images/DummyIcon.png" alt="User avatar">
                    <span class="username">${review.username}</span>
                    <span class="review-stars">
                        ${starsHTML} ${review.rating}/7
                    </span>
                </div>
                <p class="comment">${review.comment}</p>
                <small style="color: #999; margin-left: 50px;">${review.date}</small>
            </div>
        `;
    });
    
    allReviewsSection.innerHTML = reviewsHTML;
}

// Function to add  new review
function addReview(username, rating, comment) {
    //  new review object
    const newReview = {
        username: username,
        rating: parseInt(rating),
        comment: comment,
        date: new Date().toLocaleDateString()
    };
    
    // Adding review to array
    reviews.unshift(newReview);
     // Adds to beginning of array
  
     

    // Display updated reviews
    displayReviews();
    
    // Save to localStorage 
    saveReviewsToStorage();
}

// Function to save reviews to localStorage
function saveReviewsToStorage() {
    localStorage.setItem('websiteReviews', JSON.stringify(reviews));
}

// load to local storage
function loadReviewsFromStorage() {
    const savedReviews = localStorage.getItem('websiteReviews');
    if (savedReviews) {
        reviews = JSON.parse(savedReviews);
    }
    displayReviews();
}




document.addEventListener('DOMContentLoaded', function() {
    // Load saved reviews
    loadReviewsFromStorage();
    
    // Handle form submission
    const reviewForm = document.getElementById('reviewForm');
    if (reviewForm) {
        reviewForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form values
            const username = document.getElementById('username').value;
            const ratingInput = document.querySelector('input[name="rating"]:checked');
            const comment = document.getElementById('review').value;
            
            // Validate
            if (!username || !ratingInput || !comment) {
                alert('Please fill in all fields');
                return;
            }
            
            const rating = ratingInput.value;
            
            // Add the new review
            addReview(username, rating, comment);
            
            // Reset form
            reviewForm.reset();
            
            // Show success message
            alert('Thank you for your review!');
        });
    }
});