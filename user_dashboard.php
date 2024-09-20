<?php
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./style/user_dashboard.css">
</head>
<body>
  <h1>Dashboard</h1>
  <h2>date</h2>
  <div class="side_bar">
    <img src="./images/user_icon.png" alt="icon"><br>
    <p id="username">user</p><br>
    <button class="detail_change">Change user details</button><br>

    <ul class="list">
     <li><a href="#">Setting</a></li>
     <li><a href="#">Help</a></li>
     <li><a href="#">Policies</a></li>
    </ul>

    <button>Logout</button>
  </div>

  <div id="activated_plans">
    <h2>Activated Plans</h2>
    


  </div>


</body>
</html>
<?php
include("footer.php");
?>