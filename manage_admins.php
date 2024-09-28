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
    <h2>New Admin</h2>


<form method="post" action="">
   
   <div class="inputs">
    
     <label for="admin_id">Enter Admin ID</label><br>
     <input type="text" name="admin_id" id="id" required ><br>
     <label for="admin_name">Enter Name</label><br>
     <input type="text" name="admin_name" id="name" required><br>
     <label for="admin_username">Enter Username</label><br>
     <input type="text" name="admin_username" id="username" required><br>
     <label for="admin_password">Enter password</label><br>
     <input type="password" name="password" id="password" required><br>


     <button type="submit" name="add_admin" class="button" id="btn">Add new admin</button>
    
   </div> 
 </form>

 <!-- php code- adding data to the database-->
 <?php
 session_start();
 $connection = mysqli_connect("localhost" , "root" , "" , "IWT_Group_project") ;
if(isset($_POST['add_admin']))
{
    $id=$_POST['admin_id'];
    $name=$_POST['admin_name'];
    $username=$_POST['admin_username'];
    $password=$_POST['password'];

    $query = "INSERT INTO admin(id,name,username,password) VALUES ('$id' , ' $name' , '$username' , ' $password')" ;

    $query_run = mysqli_query($connection,  $query);

    if ($query_run) {
      echo "saved" ;
      $_SESSION['success'] = "Admin account added" ;
      header('Location: manage_admins.php');

    }
    else {
        $_SESSION['status'] = "Cannot add the admin account" ;
      header('Location: manage_admins.php');
    }
}

?>

</div>

<br>


<!-- table -->
    <div class="container " id="table-container">
        <h2>List of Admins</h2>
        <!-- <a class="button" id="btn"  href="create.php" role="button">New Admin</a> -->
        <br>
        <!-- table-->
        <?php
                $connection= mysqli_connect("localhost" , "root" , "" , "IWT_Group_project") ;
                $query = "SELECT * FROM admin" ;
                $query_run = mysqli_query($connection , $query)
                 ?>
               
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>USERNAME</th>
                    <th>PASSWORD</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
            <!-- extracting data from database -->
               <?php 
               if(mysqli_num_rows($query_run) > 0 )  
               {
                while($row = mysqli_fetch_assoc($query_run))
                {
                   
                    ?>
                    
                   <tr>
                     <td><?php echo $row['id']; ?></td>
                     <td><?php echo $row['name']; ?></td>
                     <td><?php echo $row['username']; ?></td>
                     <td><?php echo $row['password']; ?></td>
                    <td>
                    <form action="" method="post">
                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                     <a class='button' id='btn1' href='edit_admins.php?id=$row[id]'>Edit</a>
                     </form>
              
                     <a class='button' id='btn2' href='delete_admins.php?id=$row[id]'>Delete</a>
                   
                    </td>
                 </tr>

                <?php
                } 
              }
              
            else {
                echo "No record found" ;
            }  

                ?>




             
            </tbody>


        </table>

    </div>
</body>
</html>


