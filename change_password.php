<?php 
   
    include("header.php") 
?>

<!DOCTYPE html>
<html >
<head>
    <title>Document</title>

    <link rel="stylesheet" href="./style/change_password.css">
</head>

<body>
 <div class="background">
  <div class="container">

  <h2>Change Password</h2>

  <img src="./images/user_icon.png" alt="user">
   
  <form action="" method="post">
   
    <div class="inputs">
     
      <label for="current_password">Enter current password</label><br>
      <input type="password" id="current" required><br>
      <label for="new_password">Enter new password</label><br>
      <input type="password" id="new" required><br>
      <label for="re_enter_password">Re-Enter password</label><br>
      <input type="password" id="re" required><br>

      <input type="submit" id="submit" value="Confirm">


    </div> 

   
  </form>
  </div>
  </div>  

    
</body>
</html>
<?php 
   include("footer.php");
   ?>