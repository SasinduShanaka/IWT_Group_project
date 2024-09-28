<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Admins</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&family=Protest+Guerrilla&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../IWT_Group_project/style/manage_admins.css">
</head>
<body>
<!-- form -->
<div class="container" id="form-container">
    <h2>New Admin</h2>

    <?php
    session_start();
    $connection = mysqli_connect("localhost", "root", "", "IWT_Group_project");

    // Fetching data for edit
    if (isset($_GET['edit_id'])) {
        $id = $_GET['edit_id'];
        $query = "SELECT * FROM admin WHERE id='$id'";
        $query_run = mysqli_query($connection, $query);

        if ($row = mysqli_fetch_assoc($query_run)) {
            $admin_id = $row['id'];
            $admin_name = $row['name'];
            $admin_username = $row['username'];
            $admin_password = $row['password'];
        }
    }

    // Adding or updating data
    if (isset($_POST['add_admin'])) {
        $id = $_POST['admin_id'];
        $name = $_POST['admin_name'];
        $username = $_POST['admin_username'];
        $password = $_POST['password'];

        $query = "INSERT INTO admin(id, name, username, password) VALUES ('$id', '$name', '$username', '$password')";
        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            $_SESSION['success'] = "Admin account added";
            header('Location: manage_admins.php');
        } else {
            $_SESSION['status'] = "Cannot add the admin account";
            header('Location: manage_admins.php');
        }
    }

    // Update admin data
    if (isset($_POST['update_admin'])) {
        $id = $_POST['admin_id'];
        $name = $_POST['admin_name'];
        $username = $_POST['admin_username'];
        $password = $_POST['password'];

        $query = "UPDATE admin SET name='$name', username='$username', password='$password' WHERE id='$id'";
        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            $_SESSION['success'] = "Admin account updated";
            header('Location: manage_admins.php');
        } else {
            $_SESSION['status'] = "Cannot update the admin account";
            header('Location: manage_admins.php');
        }
    }
    ?>

    <form method="post" action="">
        <div class="inputs">
            <label for="admin_id">Enter Admin ID</label><br>
            <input type="text" name="admin_id" id="id" value="<?php echo isset($admin_id) ? $admin_id : ''; ?>" required><br>
            <label for="admin_name">Enter Name</label><br>
            <input type="text" name="admin_name" id="name" value="<?php echo isset($admin_name) ? $admin_name : ''; ?>" required><br>
            <label for="admin_username">Enter Username</label><br>
            <input type="text" name="admin_username" id="username" value="<?php echo isset($admin_username) ? $admin_username : ''; ?>" required><br>
            <label for="admin_password">Enter Password</label><br>
            <input type="password" name="password" id="password" value="<?php echo isset($admin_password) ? $admin_password : ''; ?>" required><br>

            <?php if (isset($admin_id)) { ?>
                <button type="submit" name="update_admin" class="button" id="btn">Update Admin</button>
            <?php } else { ?>
                <button type="submit" name="add_admin" class="button" id="btn">Add New Admin</button>
            <?php } ?>
        </div>
    </form>
</div>

<br>

<!-- table -->
<div class="container" id="table-container">
    <h2>List of Admins</h2>
    <br>
    
    <!-- Fetch and display list of admins -->
    <?php
    $query = "SELECT * FROM admin";
    $query_run = mysqli_query($connection, $query);
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
        if (mysqli_num_rows($query_run) > 0) {
            while ($row = mysqli_fetch_assoc($query_run)) {
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                    <td>
                        <a class='button' id='btn1' href='manage_admins.php?edit_id=<?php echo $row['id']; ?>'>Edit</a>
                        <a class='button' id='btn2' href='delete_admin.php?id=<?php echo $row['id']; ?>'>Delete</a>
                    </td>
                </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='5'>No record found</td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>

</body>
</html>
