<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <link rel="stylesheet" href="styles/Feedback.css">
</head>
<body>

    <div class="feedback-container">

    <form id="feedbackForm" action="submit_feedback.php" method="POST">
    <label for="name">Name</label>
    <input type="text" id="name" name="name" placeholder="Your Name" required>
    
    <label for="occupation">Occupation</label>
    <input type="text" id="occupation" name="occupation" placeholder="Your Occupation" required>
    
    <label for="message">Message</label>
    <textarea id="message" name="message" placeholder="Type your message" required></textarea>
    
    <label for="rating">Overall satisfaction with our insurance services:</label>
    <input type="hidden" id="rating" name="rating" value="">
    <div class="star-rating">
        <span class="star" data-value="1">★</span>
        <span class="star" data-value="2">★</span>
        <span class="star" data-value="3">★</span>
        <span class="star" data-value="4">★</span>
        <span class="star" data-value="5">★</span>
    </div>

    <button type="submit">Submit</button>
</form>

</div>
    

    <script src="js/feedback.js"></script>
</body>
</html>

