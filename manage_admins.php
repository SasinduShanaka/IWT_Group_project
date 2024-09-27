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
    <div class="container my-5">
        <h2>List of Admins</h2>
        <a class="button" id="btn"  href="create.php" role="button">New Admin</a>
        <br>
        <!-- table-->
        <?php
                $connection= mysqli_connect("localhost" , "root" , "" , "testing01") ;
                $query = "SELECT * FROM admins" ;
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
                     <a class='button' id='btn1' href='edit_admins.php?id=$row[id]'>Edit</a>
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