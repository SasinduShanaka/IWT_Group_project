<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Us</title>
    <link rel="stylesheet" href="style/ContantUs.css" />
    <script src="js/ContactUs.js" defer></script>
  </head>
  <body>
    <div class="container">
      <div class="form">
        <div class="contact-info">

          <h3 class="title">Let's stay in touch</h3>
  
          <div class="info">

            <div class="information">
              <img src="images/location.png" class="icon" alt="" />
              <p>22/B, 123 RD, California</p>
            </div>

            <div class="information">
              <img src="images/email.png" class="icon" alt="" />
              <p>abc@insurance.com</p>
            </div>

            <div class="information">
              <img src="images/phone.png" class="icon" alt="" />
              <p>123-456-789</p>
            </div>
          </div>

          <div class="social-media">
            <p>Connect with us :</p>

            <div class="social-icons">
              <a href="#">
                <i class="fab fa-facebook-f"></i>
                <img src="images/facebook.png"  alt=""/>
              </a>
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#">
                <i class="fab fa-instagram"></i>
              </a>
              <a href="#">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </div>
          <div><img src="images/map.jpeg" alt=""/></div>
        </div>

        <div class="contact-form">
         
          <form action="ContactUs.php" autocomplete="off">
            
            <h3 class="title">Contact us</h3>
            <div class="input-container">
              <input type="text" name="name" class="input" required/>
              <label for="">Username</label>
              <span>Username</span>
            </div>

            <div class="input-container">
              <input type="email" name="email" class="input" required/>
              <label for="">Email</label>
              <span>Email</span>
            </div>

            <div class="input-container">
              <input type="tel" name="phone" class="input" required/>
              <label for="">Phone</label>
              <span>Phone</span>
            </div>

            <div class="input-container textarea">
              <textarea name="message" class="input" required></textarea>
              <label for="">Message</label>
              <span>Message</span>
            </div>

            <input type="submit" value="Send" class="btn" />
         
        </form>
        
    </div>
      
</div>
    
</div>
    
<script src="ContactUs.js"></script>
  
</body>
</html>