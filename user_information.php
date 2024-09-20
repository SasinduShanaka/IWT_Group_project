<?php
 include("header.php");
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
        <form action="#" method="post">
        
        <label for="username">Username:</label><br>
        <input type="text" id="user_name"><img src="./images/edit_icon.png" alt=""><br>
        <label for="firstname">Firstname:</label><br>
        <input type="text" id="first_name"><img src="./images/edit_icon.png" alt=""><br>
        <label for="lastname">Lastname:</label><br>
        <input type="text" id="last_name"><img src="./images/edit_icon.png" alt=""><br>
        <label for="Email">Email:</label><br>
        <input type="Email" id="email"><img src="./images/edit_icon.png" alt=""><br>
        <label for="nic">NIC number:</label><br>
        <input type="test" id="nic" readonly><br>
        <label for="address">Address:</label><br>
        <input type="text" id="address"><img src="./images/edit_icon.png" alt=""><br>
        <label for="phone">Contact number:</label><br>
        <input type="phone" id="contact"><img src="./images/edit_icon.png" alt=""><br>  
         
        </form>

    </div>
    <div class="user_manage">
      <img class="user" src="./images/user_icon.png" alt=""><br>
      <h2>User</h2>
      <div class="buttons">
      <form action="upload" method="post" >
        <label for="imageUpload">Choose an image:</label><br>
        <input type="file" id="imageUpload" name="image">
        <br><br>
        <img src="./images/upload_image.png" alt=""><br>
        <button type="submit">Upload Image</button>
    </form>
    <img src="./images/change_password.png" alt=""><br>
    <button id="btn1" onclick="direct_changePW()">Change Password</button><br>
    <img src="./images/delete_account.png" alt=""><br>
    <button id="btn2">Delete Account</button><br>
    </div>

    </div>
    <button class="btn3">Save changes</button>
 </div>
 </div>
</body>
</html>
<?php 
  include("footer.php");
  ?>