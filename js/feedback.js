// Star Rating System
const stars = document.querySelectorAll('.star');
let ratingValue = 0;

stars.forEach(star => {
    star.addEventListener('click', () => {
        ratingValue = star.getAttribute('data-value');
        stars.forEach(s => s.classList.remove('selected'));
        star.classList.add('selected');
        for (let i = 0; i < ratingValue; i++) {
            stars[i].classList.add('selected');
        }
    });
});

// Form Submission (for now, just preventing default action)
const feedbackForm = document.getElementById('feedbackForm');
feedbackForm.addEventListener('submit', function(event) {
    event.preventDefault();
    alert('Feedback submitted! Rating: ' + ratingValue);
});
