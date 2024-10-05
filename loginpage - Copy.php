<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style/loginpage.css">
        <title>Lifeguard Assurance</title>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Protest+Guerrilla&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <script>

            function directhome(){

                window.location.href="home.php";
            }
        </script>
    </head>
    <body>
    
        <div class="container">

            <form action="loginpage_inc.php" method="post">
                <h1>Login</h1>
                
                
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="password" name="password" placeholder="password" required>
                    
                    <div class="remember-forgot">
                    <lable><input type="checkbox">Remember me</lable>
                    <a href="change_password.php">Forgot password?</a>
                    </div>
                
                    <button type="submit" class="btn" name="login" onclick="directhome()">Login</button>

                    <div class="register-link">
                        <p>Don't have an account?<a href="register.php">Register</a></p>
                    </div>
                
            </form>
        </div>
    </body>
</html>