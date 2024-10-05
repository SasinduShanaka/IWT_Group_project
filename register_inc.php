<?php
session_start();

require_once "IWT_db.php";

if (isset($_POST["submit"])) {
    
    $username = $_POST['Uname'];
    $firstname = $_POST['Fname'];
    $lastname = $_POST['Lname'];
    $email = $_POST['email'];
    $mobile = $_POST['tel'];
    $nic = $_POST['nic'];
    $address = $_POST['address'];
    $password = $_POST['psw'];

    // Check if the username already exists
    $checkUser = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $checkUser);

    if (mysqli_num_rows($result) > 0) {
     
        header('Location:register.php');
    } else {
        // If the username is not taken, insert the new record
        $sql = "INSERT INTO users(username, firstName, lastName, email, mobileNo, nic, address, password) 
                VALUES('$username', '$firstname', '$lastname', '$email', '$mobile', '$nic', '$address', '$password')";
        
        if (mysqli_query($conn, $sql)) {
            echo "<script> alert('Successfully registered!') ;</script>";
            header('Location: loginpage.php'); // Redirect to login page
        } else {
            echo "<script>alert('Error registering user.');</script>";
        }
    }
}
?>
