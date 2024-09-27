<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet"  type="text/css" href="style/Package Activation.css">
</head>

<body>
    <form action="" method="post">
        <fieldset>
            <h2>Package Activation</h2>
            <label>First Name :</label><br>
            <input type="text" class="input" name="fname" placeholder="first name" required><br><br>
            <label>Last Name :</label><br>
            <input type="text" class="input" name="lname" placeholder="last name" required><br><br>
            <label>Phone :</label><br>
            <input type="tel" class="input" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890" required><br><br>
            <label>E-Mail :</label><br>
            <input type="email" class="input" name="email" placeholder="you@example.com" required><br><br>
            <label>Product :</label><br>
            <input type="text" id="product" class="input" name="product" required><br><br>
            <br>
            <input type="submit" id="btn" value="Pay Now">
    </fieldset>
    </form>
</body>
</html>