



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New admin</title>
    <link rel="stylesheet" href="./style/create_admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Protest+Guerrilla&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
    
</body>
</html>

<div class="container my-5">
    <h2>New Admin</h2>


<form method="post">
   
   <div class="inputs">
    
     <label for="admin_id">Enter Admin ID</label><br>
     <input type="text" value="<?php echo $id; ?>" id="id" required ><br>
     <label for="admin_name">Enter Name</label><br>
     <input type="text" value="<?php echo $name; ?>" id="name" required><br>
     <label for="admin_username">Enter Username</label><br>
     <input type="text" value="<?php echo $username; ?>" id="username" required><br>
     <label for="admin_password">Enter password</label><br>
     <input type="password" value="<?php echo $password; ?>" id="password" required><br>


     <button class="button"><a href="../IWT_Group_project/manage_admins.php">Confirm</a></button>
    
   </div> 
 </form>

 <?php
 session_start();
 $connection = mysqli_connect("localhost" , "root" , "" , "admins") ;
if(isset($_POST['button']))
{
    $id=$_POST['admin_id'];
    $name=$_POST['admin_name'];
    $username=$_POST['admin_username'];
    $password=$_POST['password'];

    $query = "INSERT INTO admins(id,name,username,password) VALUES ('$id' , ' $name' , '$username' , ' $password')" ;

    $query_run = mysqli_query($connection,  $query);

    if ($query_run) {
      echo "saved" ;
      $_SESSION['success'] = "Admin account added" ;
      header('Location : manage_admins.php');

    }
    else {
        $_SESSION['status'] = "Cannot add the admin account" ;
      header('Location : manage_admins.php');
    }
}



?>

</div>






 
