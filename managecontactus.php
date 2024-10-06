<?php
   
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "IWT_group_project";
   
   // Create connection
   $conn = mysqli_connect("localhost", "root", "", "IWT_group_project");
   
   // Check connection
   if (!$conn) {
       die("Connection failed: " . mysqli_connect_error());
   }
    

    
    

    // Delete contactus data
if (isset($_GET['delete_cid'])) {
    $id = $_GET['delete_cid'];
    $sql = "DELETE FROM contactus WHERE cid='$id'";
    $result = mysqli_query($conn, $sql);

    if ($query_run) {
        $_SESSION['success'] = "Admin account deleted";
        header('Location: managecontactus.php');
    } else {
        $_SESSION['status'] = "Cannot delete the admin account";
        header('Location: managecontactus.php');
}
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style\managecontactus.css">
    <title>Manage ContactUs</title>
</head>
<body>


 <!-- Contactus Table -->
    <div class="container" id="table-container">
    <h2>List of Users</h2>
    <br>

    <table class="table">
        <thead>
            <tr>
                <th>CID</th>
                <th>USERNAME</th>
                <th>EMAIL</th>
                <th>PHONE</th>
                <th>MESSAGE</th>
                <th>ACTION</th>
            </tr>
        </thead> 
        <tbody>
        <?php
        $query = "SELECT * FROM contactus";
        $query_run = mysqli_query($conn, $query);

        if (mysqli_num_rows($query_run) > 0) {
            while ($row = mysqli_fetch_assoc($query_run)) {
                ?>
                <tr>
                    <td><?php echo $row['cid']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['message']; ?></td>
                    <td>
                        <a class='button' id='btn2' href='managecontactus.php?delete_cid=<?php echo $row['cid']; ?>' onclick="return confirm('Are you sure you want to delete this feedback?');">Delete</a>
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