<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of News</title>
   <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Protest+Guerrilla&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="styles/managenews.css">
</head>
<body>

<!-- form -->
<div class="container " id="form-container">
    <h2>New News</h2>

<form method="post" action="" enctype="multipart/form-data"> <!-- Added enctype for file upload -->
   <div class="inputs">
     <label for="news_id">Enter News ID</label><br>
     <input type="text" name="n_id" id="id" required ><br>
     <label for="title">Enter Title</label><br>
     <input type="text" name="title" id="Ntitle" required><br>
     <label for="Content">Enter Content</label><br>
     <input type="text" name="content" id="content" required><br> <!-- Changed input name to content -->
     <label for="upload_image">Upload Image</label><br>
     <input type="file" name="image" id="imageUpload" accept="image/*" required><br>

     <button type="submit" name="add_News" class="button" id="btn">Add new News</button>
   </div> 
 </form>

<!-- PHP code for adding news to the database -->
<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "IWT_group_project");

if (isset($_POST['add_News'])) {
    $news_id = $_POST['n_id'];
    $title = $_POST['title'];
    $content = $_POST['content']; // Use the correct content field
    $image = $_FILES['image']['name'];

    // Set target directory and file path for image upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($image);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if the file is an image
    $check = getimagesize($_FILES['image']['tmp_name']);
    if ($check !== false) {
        // Move uploaded image to the target directory
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            // Insert news data into the database
            $query = "INSERT INTO news (news_id, title, content, image) VALUES ('$news_id', '$title', '$content', '$image')";
            $query_run = mysqli_query($connection, $query);

            if ($query_run) {
                echo "News added successfully!";
                $_SESSION['success'] = "News added successfully!";
                header('Location: managenews.php');
            } else {
                echo "Error adding news!";
                $_SESSION['status'] = "Failed to add news!";
                header('Location: managenews.php');
            }
        } else {
            echo "Error uploading the image!";
            $_SESSION['status'] = "Error uploading the image!";
        }
    } else {
        echo "File is not an image!";
        $_SESSION['status'] = "File is not an image!";
    }
}
?>

</div>

<br>

<!-- table -->
<div class="container " id="table-container">
    <h2>List of News</h2>
    <br>
    
    <?php
    // Connect to the database and fetch the news records
    $connection = mysqli_connect("localhost", "root", "", "IWT_group_project");
    $query = "SELECT * FROM news"; // Assuming your table is named 'news'
    $query_run = mysqli_query($connection, $query);
    ?>
               
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
        <!-- Extracting data from the database -->
        <?php 
        if (mysqli_num_rows($query_run) > 0) {
            while ($row = mysqli_fetch_assoc($query_run)) {
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['content']; ?></td>
                    <td><img src="uploads/<?php echo $row['image']; ?>" alt="News Image" width="100"></td> <!-- Display the image -->
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                            <a class='button' id='btn1' href='edit_news.php?id=<?php echo $row['id']; ?>'>Edit</a>
                        </form>
                        <a class='button' id='btn2' href='delete_news.php?id=<?php echo $row['id']; ?>'>Delete</a>
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
