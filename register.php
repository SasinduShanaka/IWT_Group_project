<!DOCTYPE html>
<html>
    <head>
       <link rel="stylesheet" href="style/register.css">
       <script src="js/registerpage.js"></script>
        <title>LIFEGUARD Assurance</title>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Protest+Guerrilla&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    </head>

    <body>
        <div class="container">
        <header>Create Account</header>
        <form action="#" onsubmit = "return checkpassword()">

        <div class="form first">
            <div class="details personal">

                    <div class="fields">

                        <div class="input-field">
                            <lable>Full Name <br></lable>
                            <input type="text" placeholder="Enter your name" required><br>
                        </div>

                        <div class="input-field">
                            <lable>Email Address <br></lable>
                            <input type="email" placeholder="Email" required><br>
                        </div>

                        <div class="input-field">
                            <lable>Mobile Number <br></lable>
                            <input type="tel" placeholder="Enter your mobile number" pattern="07[0-9][0-9]{7}" required> <br>
                        </div>

                        <div class="input-field">
                            <lable>Date Of Birth<br></lable>
                            <input type="date" required> <br>
                        </div>

                        <div class="input-field">
                            <lable>NIC<br></lable>
                            <input type="numbers" placeholder="Enter your NIC number" required> <br>
                        </div>

                        <div class="input-field">
                            <lable>Password <br></lable>
                            <input type="password" id="psw"  name="psw"  placeholder="Enter Password" required><br>
                        </div>

                        <div class="input-field">
                            <lable>Re-enter Password<br></lable>
                            <input type="password" id="repsw"  placeholder="Re-enter password" required><br>
                        </div>

                        <div class="policy">
                            <lable><input type="checkbox" id="chk" >Accept Policy and Terms</lable>
                        </div>
                        
                    
                        <input type="submit" id="sbtbtn" value="Sign Up" desabled>
                        


                        <div class="register-link">
                            <p>Already have an account?<a href="#">Login Here</a></p>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
            
    </body>
</html>
