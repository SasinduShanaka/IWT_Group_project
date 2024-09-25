<?php
include("header.php");
?>
<!DOCTYPE html>
<html>
<head>
    
    <title>Dashboard</title>
    <link rel="stylesheet" href="./style/user_dashboard.css">
    <script src="js\user_dashboard.js"></script>

</head>
<body onload="setDate();greeting()">
     <h1 class="dashboard">Dashboard</h1>
    <div class="side">
       <h2 id="greet"></h2>
       <h2 id="date"></h2>
    </div>
       <div class="card">
        <div class="side_bar">
           <img src="./images/user_icon.png" alt="icon"><br>
            <p id="username">user</p><br>
              <button class="detail_change" onclick="directUserInformation()">Change user details</button><br>

       <ul class="list">
         <li><a href="#">Settings</a></li>
         <li><a href="#">Help</a></li>
         <li><a href="#">Policies</a></li>
       </ul>

       <button>Logout</button>
  </div>
<div class="container">
  <div id="activated_plans">
  <img src="./images/plans_icon.png" alt="">
      <h2>Activated Plans</h2> 
      <p id="plans"></p>


  </div>
  <div id="make_claim">
  <img src="./images/claims_icon.png" alt="">
     <h2>Make a Claim</h2> 
  </div>

  <div id="pay">
  <img src="./images/pay_icon.png" alt="">
     <h2>Pay premium</h2> 

  </div>

  </div>
  </div>
</body>
</html>
<?php
include("footer.php");
?>