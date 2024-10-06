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
    

    // Check if in edit mode
    if (isset($_GET['edit_id'])) {
        $id = $_GET['edit_id'];
        
        // Fetch the news details based on the id
        $sql = "SELECT * FROM news WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
        
        // Fetch the row
        if ($row = mysqli_fetch_assoc($result)) {

            $id = $row['id'];
            $title = $row['title'];
            $content = $row['content'];
            $image = $row['image'];

        }
    }

    // Handle form submission
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $image = $_POST['image'];

        $file_name = $_FILES['image']['name'];
        $tempname = $_FILES['image']['tmp_name'];
        $folder = 'newsImages/'. $file_name;

$query = "UPDATE news set image = '$file_name' WHERE id = '$id'";

$result1 = mysqli_query($conn , $query);

move_uploaded_file($tempname , $folder);
        

        // Update query
        $sql = "UPDATE news SET  title = '$title' , content = '$content' , image = '$image' WHERE id = '$id'";
        
        if (mysqli_query($conn, $sql)) {
            header('Location: managenews.php?errdone'); 
        } 
        else {
            header('Location: managenews.php?erroesomething-went-wrong'); 
        }
    }

    // Delete news
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $sql = "DELETE FROM news WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if ($query_run) {
        $_SESSION['success'] = "Admin account deleted";
        header('Location: managenews.php');
    } else {
        $_SESSION['status'] = "Cannot delete the admin account";
        header('Location: managenews.php');
}
}

// Adding news
if (isset($_POST['add'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $file_name = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = 'newsImages/'. $file_name;

    $query = "INSERT INTO news(id, title, content , image) VALUES ('$id', '$title', '$content' , '$file_name')";
    $query_run = mysqli_query($conn, $query);
    move_uploaded_file($tempname , $folder);

    if ($query_run) {
        $_SESSION['success'] = "Admin account added";
        header('Location: managenews.php');
    } else {
        $_SESSION['status'] = "Cannot add the admin account";
        header('Location: managenews.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style\managenews.css">
    <title>Manage News</title>
</head>
<body>

<!-- Form to Add or Edit news-->
<div class="container" id="form-container">
    <h2>Enter News</h2>
    <form method="post" action="">
        <div class="inputs">
            <label for="New_news">Enter News ID</label><br>
            <input type="text" name="id" id="ID" value="<?php echo isset($id) ? $id : '';?>" required><br><br>

            <label for="New_news">Enter Title</label><br>
            <input type="text" name="title" id="ID"  value="<?php echo isset($title) ? $title : ''; ?>" required><br><br>

            <label for="New_news">Content</label><br>
            <input type="text" name="content" id="ID"  value="<?php echo isset($content) ? $content : ''; ?>" required><br><br>

            <label for="imageUpload">Choose an image:</label><br>
        <input type="file" id="imageUpload" name="image">


            <?php if (isset($id)) { ?>
                <button type="submit" name="update" class="button" id="btn">Update</button>
            <?php } else { ?>
                <button type="submit" name="add" class="button" id="btn">Add New News</button>
            <?php } ?>
            
        </div>
    </form>
</div>



    <!-- News Table -->
    <div class="container" id="table-container">
    <h2>List of Users</h2>
    <br>
    <!-- Fetch and Display List of News -->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>TITLE</th>
                <th>CONTENT</th>
                <th>IMAGE</th>
                <th>ACTIONS</th>
            </tr>
        </thead> 
        <tbody>
        <?php
        $query = "SELECT * FROM news";
        $query_run = mysqli_query($conn, $query);

        if (mysqli_num_rows($query_run) > 0) {
            while ($row = mysqli_fetch_assoc($query_run)) {
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['content']; ?></td>
                    <td><?php echo $row['image']; ?></td>
                    <td>
                        <a class='button' id='btn1' href='managenews.php?edit_id=<?php echo $row['id']; ?>'>Edit</a>
                        <a class='button' id='btn2' href='managenews.php?delete_id=<?php echo $row['id']; ?>' onclick="return confirm('Are you sure you want to delete this admin?');">Delete</a>
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