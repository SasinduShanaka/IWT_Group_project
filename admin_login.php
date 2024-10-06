<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style/admin_login.css">
        <title>Lifeguard Assurance</title>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Protest+Guerrilla&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    </head>
    <body>



<?php
$connection = mysqli_connect("localhost", "root", "", "IWT_Group_project");

$username = $_POST["Username"];
$pwd = $_POST["password"];

$sql = "SELEECT * FROM admins WHERE username =  '{$username}' AND password = '{$pwd}' LIMIT 1" ;
$result = mysqli_query($connection , $sql);

//if credentials are correct save them to use in further actions
if(mysqli_num_rows($result)>0){
    $row=mysqli_fetch_array($result);

    session_start();
    $_SESSION['id'] = $row['id'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['password'] = $row['password'];
}

if($username ==$row['username'] AND $pwd==$row['password'] ){
    header('location:admin_landing.php');
}
else {
    header('location:admin_login.php?error=invalid-username-or-password');
}




?>
        <div class="container">

            <form action="" method="post">
                <h1>Admin Login</h1>
                
                
                    <input type="text" placeholder="Username" required>
                    <input type="password" placeholder="password" required>
                    
                    <div class="remember-forgot">
                    <lable><input type="checkbox">Remember me</lable>
                    <a href="#">Forgot password?</a>
                    </div>
                
                    <button type="submit" class="btn">Login</button>

                
            </form>
        </div>
    </body>
</html>