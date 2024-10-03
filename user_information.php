<?php
 include("header.php");
 session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>Document</title>
    <link rel="stylesheet" href="./style/user_information.css">
    <script >
    
    function direct_changePW(){
         window.location.href="change_password.php";
        }   
    function back() {
        window.location.href="user_dashboard.php";
    }    
    </script>  
</head>
<body>
    <div class="topbar">
        <button id="btn1" onclick="back()">Back</button>
    </div>
    <div class="interface">
    <div class="fam">
        <img src="./images/family1.jpg" alt="family">
    </div>
    <div class="container">
        <h1>User Information</h1>
    <div class="user_details">
        <form action="user_information_inc.php" method="post" enctype="multipart/form-data">

        <label for="username">Username:</label><br>
        <input type="text" id="user_name" name="username" value="<?php echo $_SESSION['username'];?>"><img src="./images/edit_icon.png" alt=""><br>
        <label for="firstname">Firstname:</label><br>
        <input type="text" id="first_name" name="firstName" value="<?php echo $_SESSION['firstName'];?>"><img src="./images/edit_icon.png" alt=""><br>
        <label for="lastname">Lastname:</label><br>
        <input type="text" id="last_name" name="lastName" value="<?php echo $_SESSION['lastName'];?>"><img src="./images/edit_icon.png" alt=""><br>
        <label for="Email">Email:</label><br>
        <input type="Email" id="email" name="email" value="<?php echo $_SESSION['email'];?>"><img src="./images/edit_icon.png" alt=""><br>
        <label for="nic">NIC number:</label><br>
        <input type="text" id="nic" name="nic"  value="<?php echo $_SESSION['nic'];?>"><br>
        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address" value="<?php echo $_SESSION['address'];?>"><img src="./images/edit_icon.png" alt=""><br>
        <label for="phone">Contact number:</label><br>
        <input type="phone" id="contact" name="phone" value="<?php echo $_SESSION['mobile'];?>"><img src="./images/edit_icon.png" alt=""><br>  
         
    </div>
    <div class="user_manage">
      <img class="user" src="dpImages\<?php echo $_SESSION['file'];?>" alt=""><br>
      <h2><?php echo $_SESSION['username'] ?></h2>
      <div class="buttons">
   
        <label for="imageUpload">Choose an image:</label><br>
        <input type="file" id="imageUpload" name="image">
        <br><br>
    <img src="./images/change_password.png" alt=""><br>
    <button id="btn1" onclick="direct_changePW()">Change Password</button><br>
    <img src="./images/delete_account.png" alt=""><br>
    <button id="btn2">Delete Account</button><br>
    </div>

    </div>
    <input type="submit" class="btn3" name="btn" value="Save Changes">

    </form>
 </div>
 </div>
</body>
</html>
<?php 
  include("footer.php");
  ?>