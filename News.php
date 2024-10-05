<?php
// Include the database configuration file
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "IWT_group_project";

// Create connection  
$connection = mysqli_connect("localhost", "root", "", "IWT_group_project");

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

session_start();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture form data
    $name =  $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];
    
    // Insert data into the database
    $sql = "INSERT INTO contact_us (name, email, phone, message) 
            VALUES ('$name', '$email', '$phone', '$message')";
    
    if (mysqli_query($connection, $sql)) {
        echo "New contact request added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
}

// Fetch contact us data to display in the table
$sql = "SELECT cid, name, email, phone, message FROM contactus";
$result = mysqli_query($connection, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
    <link rel="stylesheet" href="style/News.css">
    <script src="js/News.js" defer></script>

</head>

<body>

    <h1>News</h1>

    <div class="wrapper">
        <i id="left" class="fa-solid  fas fa-angle-left"></i>
        <ul class="carousel">
            <li class="card">
                <div class="img"><img src="images/family.jpg"      alt="" draggable="false"> </div>
                <h2 style="color:  #03496c; font-weight:bold;">New Product Launch: Comprehensive Family Health Plan</h2>
                <span>Lifeguard Assurance introduces a new health plan designed to cover all your family’s medical needs under one umbrella. </span>
                <button class="info-btn" onclick="toggleInfo()">Read more</button>
                
            </li>

            <li class="card">
                <div class="img"><img src="images/award.jpg" alt="" draggable="false"> </div>
                <h2 style="color:  #03496c; font-weight:bold;">Award for Customer Service Excellence</h2>
                <span>Lifeguard Assurance wins the prestigious Customer Service Excellence Award for 2024. Our dedication to serving you better continues!</span>
                <button class="info-btn" onclick="toggleInfo()">Read more</button>
            </li>

            <li class="card">
                <div class="img"><img src="images/easy.jpg"  alt="" draggable="false"> </div>
                <h2 style="color:  #03496c; font-weight:bold;">Policy Renewal Made Easy with New Online Portal</h2>
                <span>We have simplified the process for renewing your insurance policies. Check out our new user-friendly online portal</span>
                <button class="info-btn" onclick="toggleInfo()">Read more</button>
            </li>

            <li class="card">
                <div class="img"><img src="images/app.jpg" alt="" draggable="false"> </div>
                <h2 style="color:  #03496c; font-weight:bold;">Launch of New Mobile App for Policy Management</h2>
                <span>Introducing our new mobile app that allows you to manage your insurance policies on the go. Download today</span>
                <button class="info-btn" onclick="toggleInfo()">Read more</button>
            </li>

            <li class="card">
                <div class="img"><img src="images/senior.jpg"alt="" draggable="false"> </div>
                <h2 style="color:  #03496c; font-weight:bold;">Special Discounts for Senior Citizens on Life Insurance Plans</h2>
                <span>In recognition of our senior citizens, Lifeguard Assurance is offering exclusive discounts on life insurance policies for those aged 60 and above</span>
                <button class="info-btn" onclick="toggleInfo()">Read more</button>
            </li>

            <li class="card">
                <div class="img"><img src="images/plant.jpg" alt="" draggable="false"> </div>
                <h2 style="color:  #03496c; font-weight:bold;">2024 CSR Initiative: Lifeguard Assurance to Plant 10,000 Trees</h2>
                <span>As part of our corporate social responsibility, Lifeguard Assurance pledges to plant 10,000 trees by the end of 2024. Get involved!</span>
                 <button class="info-btn" onclick="toggleInfo()">Read more</button>
            </li>
        </ul>

        <i id="right" class="fa-solid fas fa-angle-right"></i>
    </div>

</body>

</html>