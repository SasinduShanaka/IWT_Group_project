// Function to trigger the fade-in effect
function fadeInText() {
    const fadeText = document.getElementById('fadeText');
    fadeText.classList.add('fade-in-active');
}

// Trigger the fade-in effect when the page loads
window.onload = function() {
    fadeInText();
};
