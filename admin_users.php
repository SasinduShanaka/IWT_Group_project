<?php
    require_once 'IWT_db.php';
    

    // Check if in edit mode
    if (isset($_GET['edit_id'])) {
        $username = $_GET['edit_id'];
        
        // Fetch the admin details based on the edit_id
        $sql = "SELECT * FROM users WHERE username= '$username'";
        $result = mysqli_query($conn, $sql);
        
        // Fetch the row
        if ($row = mysqli_fetch_assoc($result)) {

            $userID = $row['userID'];
            $username = $row['username'];
            $firstName = $row['firstName'];
            $lastName = $row['lastName'];
            $email = $row['email'];
            $contact = $row['mobileNo'];
            $address = $row['address'];
            $nic = $row['nic'];
        }
    }

    // Handle form submission
    if (isset($_POST['update'])) {
        $userID = $_POST['id'];
        $username=$_POST['username'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $contact = $_POST['mobileNo'];
        $address = $_POST['address'];
        $nic=$_POST['nic'];
        

        // Update query
        $sql = "UPDATE users SET  firstName = '$firstName' , lastName = '$lastName' , email= '$email', mobileNo = '$contact' ,address='$address'  WHERE username = '$username'";
        
        if (mysqli_query($conn, $sql)) {
            header('Location: admin_users.php'); 
        } 
        else {
            header('Location: admin_users.php?erroesomething-went-wrong'); 
        }
    }

    // Delete admin data
if (isset($_GET['delete_id'])) {
    $username = $_GET['delete_id'];
    $sql = "DELETE FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if ($query_run) {
        $_SESSION['success'] = "Admin account deleted";
        header('Location: admin_users.php');
    } else {
        $_SESSION['status'] = "Cannot delete the admin account";
        header('Location: admin_users.php');
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style\admin_users.css">
    <title>Document</title>
</head>
<body>

<!-- Form to Add or Edit Admin -->
<div class="container" id="form-container">
    <h2>Edit Users</h2>
    <form method="post" action="">
        <div class="inputs">
            <label for="admin_name">Enter User ID</label><br>
            <input type="text" name="id" id="name" value="<?php echo isset($userID) ? $userID : '';?>" required><br><br>

            <label for="admin_username">Enter user name</label><br>
            <input type="text" name="username" id="username" value="<?php echo isset($username) ? $username : ''; ?>" required><br><br>

            <label for="admin_username">Enter first name</label><br>
            <input type="text" name="firstName" id="username" value="<?php echo isset($firstName) ? $firstName : ''; ?>" required><br><br>

            <label for="admin_username">Enter last name</label><br>
            <input type="text" name="lastName" id="username" value="<?php echo isset($lastName) ? $lastName : ''; ?>" required><br><br>
            
            <label for="admin_username">Enter email</label><br>
            <input type="text" name="email" id="username" value="<?php echo isset($email) ? $email : ''; ?>" required><br><br>

            <label for="admin_username">Enter mobile no</label><br>
            <input type="text" name="mobileNo" id="username" value="<?php echo isset($contact) ? $contact : ''; ?>" required><br><br>

            <label for="admin_username">Enter nic</label><br>
            <input type="text" name="nic" id="username" value="<?php echo isset($nic) ? $nic : ''; ?>" required><br><br>

            <label for="admin_username">Enter address</label><br>
            <input type="text" name="address" id="username" value="<?php echo isset($address) ? $address : ''; ?>" required><br><br>

                <button type="submit" name="update" class="button" id="btn">Update</button>
            
        </div>
    </form>
</div>



    <!-- Admin Table -->
    <div class="container" id="table-container">
    <h2>List of Users</h2>
    <br>
    <!-- Fetch and Display List of Admins -->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>FirstName</th>
                <th>LastName</th>
                <th>NIC</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Address</th>
                <th>Action</th>
                
                
            </tr>
        </thead> 
        <tbody>
        <?php
        $query = "SELECT * FROM users";
        $query_run = mysqli_query($conn, $query);

        if (mysqli_num_rows($query_run) > 0) {
            while ($row = mysqli_fetch_assoc($query_run)) {
                ?>
                <tr>
                    <td><?php echo $row['userID']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['firstName']; ?></td>
                    <td><?php echo $row['lastName']; ?></td>
                    <td><?php echo $row['nic']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['mobileNo']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td>
                        <a class='button' id='btn1' href='admin_users.php?edit_id=<?php echo $row['username']; ?>'>Edit</a>
                        <a class='button' id='btn2' href='admin_users.php?delete_id=<?php echo $row['username']; ?>' onclick="return confirm('Are you sure you want to delete this admin?');">Delete</a>
                    </td>
                </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='8'>No record found</td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>

</body>
</html>