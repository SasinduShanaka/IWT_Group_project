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
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];
    
    // Insert data into the database
    $sql = "INSERT INTO contactus(name, email, phone, message) 
            VALUES ('$name', '$email', '$phone', '$message')";
    
    if (mysqli_query($connection, $sql)) {
        echo "Message sent successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
}

mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Us</title>
    <link rel="stylesheet" href="style/ContantUs.css" />
    <script src="js/ContactUs.js" defer></script>

  </head>
  <body>
    <div class="container">
      <div class="form">
        <div class="contact-info">

          <h3 class="title">Let's stay in touch</h3>
  
          <div class="info">

            <div class="information">
              <img src="images/location.png" class="icon" alt="" />
              <p>22/B, 123 RD, California</p>
            </div>

            <div class="information">
              <img src="images/email.png" class="icon" alt="" />
              <p>abc@insurance.com</p>
            </div>

            <div class="information">
              <img src="images/phone.png" class="icon" alt="" />
              <p>123-456-789</p>
            </div>
          </div>

          <div class="social-media">
            <p>Connect with us :</p>

            <div class="social-icons">
              <a href="#">
                <i class="facebook"></i>
                <img src="images\facebook-icon.png"  alt=""/>
              </a>
              <a href="#">
                <i class="twitter"></i>
                <img src="images\twitter.png"  alt=""/>
              </a>
              <a href="#">
                <i class="instagram"></i>
                <img src="images\instagram.webp"  alt=""/>
              </a>
              <a href="#">
                <i class="linkedin"></i>
                <img src="images\linkedin-logo.png"  alt=""/>
              </a>
            </div>
          </div>
          <div><img src="images/map.jpeg" alt=""/></div>
        </div>

        <div class="contact-form">
         
          <form action="" method="post">
            
            <h3 class="title">Contact us</h3>
            <div class="input-container">
              <input type="text" name="name" class="input" required/>
              <label for="">Username</label>
              <span>Username</span>
            </div>

            <div class="input-container">
              <input type="email" name="email" class="input" required/>
              <label for="">Email</label>
              <span>Email</span>
            </div>

            <div class="input-container">
              <input type="tel" name="phone" class="input" required/>
              <label for="">Phone</label>
              <span>Phone</span>
            </div>

            <div class="input-container textarea">
              <textarea name="message" class="input" required></textarea>
              <label for="">Message</label>
              <span>Message</span>
            </div>

            <input type="submit" value="Send" class="btn" name = "submit"/>
      
        </form>
        
    </div>
      
</div>
    
</div>
    
<script src="ContactUs.js"></script>
  
</body>
</html>