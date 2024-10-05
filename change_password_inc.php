<?php 
 
 require_once "IWT_db.php";

 session_start();

 $username = $_SESSION['username'];
  
  $currentpwd = $_POST['password'];

if(isset($_POST['confirm'])){  
  if($_SESSION['password'] == $currentpwd){
   
     $newpwd = $_POST['newpwd'];
     $repwd = $_POST['repwd'];

     if($newpwd == $repwd){

        $sql = "UPDATE users set password = '$newpwd' WHERE username = '$username'";
        $result = mysqli_query($conn,$sql); 

        header('location:user_information.php');
    
    }
     else{
        echo" <script> alert('Passwords mismatch!'); </script>";
     }


  }
  else{

     echo" <script> alert('Invalid current password'); </script>";
  }
}

?>