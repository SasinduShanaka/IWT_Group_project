<?php

require_once "IWT_db.php";

session_start();

if(isset($_POST['btn'])){

$username = $_POST['username'] ;
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$nic = $_POST['nic'];
$address = $_POST['address'];
$phone = $_POST['phone'];

$file_name = $_FILES['image']['name'];
$tempname = $_FILES['image']['tmp_name'];
$folder = 'dpImages/'. $file_name;

$query = "UPDATE users set file = '$file_name' WHERE username = '$username'";

$result1 = mysqli_query($conn , $query);

move_uploaded_file($tempname , $folder);
   
//update information

    $sql="UPDATE users set firstName = '$firstName', lastName = '$lastName', email = '$email', address='$address', mobileNo = '$phone' WHERE username = '$username' ";
    $result = mysqli_query($conn,$sql);

    if(!$result){
        die("querry failed");//getting errors
        echo "alert('Not working!!')";
    }
    else{
        //again filling the details of the form with the new data entered
        $sql = "SELECT * FROM users WHERE username = '$username' LIMIT 1";

        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result) > 0){

            $row = mysqli_fetch_array($result);//getting relevent row regard to email

            //saving the details to sessions
            $_SESSION['username'] = $row['username'];
            $_SESSION['firstName'] = $row['firstName'];
            $_SESSION['lastName'] = $row['lastName'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['address'] = $row['address'];
            $_SESSION['mobile'] = $row['mobileNo'];
            $_SESSION['password'] =$row['password'];
            $_SESSION['file'] = $row['file'];

            echo 'alert("Saved changes successfully");';
            
            header('location:user_dashboard.php');//redirecting to the site
        }
            
        }
}

if(isset($_POST['delete'])){
    $sql = "DELETE FROM users WHERE username='{$_SESSION['username']}'";
    $result = mysqli_query($conn, $sql);
    header('location:loginpage.php');//redirecting to the site
}



$conn->close();

?>