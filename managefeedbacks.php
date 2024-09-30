<?php
// Include the database configuration file
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "IWT_group_project";

// Create connection
$connection = mysqli_connect("localhost", "root", "", "IWT_group_project");

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

session_start();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture form data
    $name = mysqli_real_escape_string($connection, $_POST["name"]);
    $occupation = mysqli_real_escape_string($connection, $_POST["occupation"]);
    $message = mysqli_real_escape_string($connection, $_POST["message"]);
    $rating = (int)$_POST["rating"];
    
    // Insert data into the database
    $sql = "INSERT INTO feedback (name, occupation, message, rating) 
            VALUES ('$name', '$occupation', '$message', $rating)";
    
    if (mysqli_query($connection, $sql)) {
        echo "New feedback added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
}

// Fetch feedback to display in the table
$sql = "SELECT name, occupation, message, rating FROM feedback";
$result = mysqli_query($connection, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Feedback</title>
    <link rel="stylesheet" href="style/managefeedbacks.css">
</head>
<body>

<div class="feedback-table-container">
    <h2>Manage Feedback</h2>

    <table border="1" cellspacing="0" cellpadding="10">
        <thead>
            <tr>
                <th>Name</th>
                <th>Occupation</th>
                <th>Message</th>
                <th>Rating</th>
            </tr>
        </thead>
        <tbody>
            <?php if (mysqli_num_rows($result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row["name"]); ?></td>
                        <td><?php echo htmlspecialchars($row["occupation"]); ?></td>
                        <td><?php echo htmlspecialchars($row["message"]); ?></td>
                        <td><?php echo $row["rating"]; ?>/5</td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No feedback available yet.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <?php mysqli_close($connection); ?>
</div>

</body>
</html>
