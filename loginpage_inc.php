<?php 
   require_once'IWT_db.php';

   if(isset($_POST["login"])){

    $username = $_POST["username"];
    $password = $_POST["password"];
   
   //checking credentials
   $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' LIMIT 1";
   $result = mysqli_query($conn,$sql);

   //if credentials are there save data to sessions
   if(mysqli_num_rows($result)>0){

    $row = mysqli_fetch_array($result);
   
     session_start();
     $_SESSION['username'] = $row['username'];
     $_SESSION['firstName'] = $row['firstName'];
     $_SESSION['lastName'] = $row['lastName'];
     $_SESSION['email'] = $row['email'];
     $_SESSION['mobile'] = $row['mobileNo'];
     $_SESSION['nic'] = $row['nic'];
     $_SESSION['address'] = $row['address'];
     $_SESSION['password'] = $row['password'];

     header('Location:home.php');

   }
   else{

    echo"<script> alert('Invalid username or password')";
    header('Location:loginpage.php');
   }
}
else{

    header('Location:loginpage.php');
 }








?>