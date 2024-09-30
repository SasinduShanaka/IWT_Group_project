document.addEventListener("DOMContentLoaded", function() {
    const stars = document.querySelectorAll(".star-rating .star");
    const ratingInput = document.getElementById("rating");

    stars.forEach(star => {
        star.addEventListener("click", function() {
            let ratingValue = this.getAttribute("data-value");
            ratingInput.value = ratingValue; // Set the hidden input's value

            stars.forEach(s => s.classList.remove("selected"));
            this.classList.add("selected");
        });
    });
});
