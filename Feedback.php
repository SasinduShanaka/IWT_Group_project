<?php
// Include the database configuration file
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "IWT_group_project";

// Create connection
$connection = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

session_start();

if (isset($_POST['submit'])) {
    
    // Capture form data
    $name = $_POST["name"];
    $occupation = $_POST["occupation"];
    $message = $_POST["message"];
    $rating = (int)$_POST["rating"];

    // Debugging step
    //echo "Captured data: Name - $name, Occupation - $occupation, Message - $message, Rating - $rating";
    
    // Insert data into the database
    $sql = "INSERT INTO feedback (name, occupation, message, rating) 
            VALUES ('$name', '$occupation', '$message', $rating)";
    
    if (mysqli_query($connection, $sql)) {
        //echo "New feedback added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <link rel="stylesheet" href="style/Feedback.css">
</head>
<body>


    <div class="feedback-container">

    <h2>Feedback Form</h2>

    <form action="" method="POST">
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

    <button type="submit" name="submit">Submit</button>
</form>

</div>
    

    <script src="js/feedback.js"></script>
</body>
</html>

