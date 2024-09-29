<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of admins</title>
   <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Protest+Guerrilla&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../IWT_Group_project/style/manage_admins.css">
</head>
<body>
<!-- form -->
<div class="container " id="form-container">
    <h2>Make a Claim</h2>


<form method="post" action="">
   
   <div class="inputs">
    
     <label for="admin_id">Username</label><br>
     <input type="text" name="admin_id" id="id" required ><br>
     <label for="Claim Type">Claim Type</label><br>
     <input type="text" name="admin_name" id="name" required><br>
     <label for="admin_username">Enter Username</label><br>
     <input type="text" name="admin_username" id="username" required><br>
     <label for="admin_password">Enter password</label><br>
     <input type="password" name="password" id="password" required><br>


     <button type="submit" name="add_admin" class="button" id="btn">Request</button>
    
   </div> 
 </form>
