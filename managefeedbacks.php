<?php
// Include the database configuration file
$servername = "localhost"; // Database server
$username = "root"; // Database username
$password = ""; // Database password
$dbname = "IWT_group_project"; // Database name

session_start();
$connection = mysqli_connect("localhost", "root", "", "IWT_group_project");

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Fetch all feedbacks from the database
$sql = "SELECT id, name, occupation, message, rating, submitted_at FROM feedback ORDER BY submitted_at DESC";
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Feedback</title>
    <link rel="stylesheet" href="styles/managefeedback.css">
</head>
<body>

<div class="feedback-table-container">
    <h2>Manage Feedback</h2>

    <?php if ($result && $result->num_rows > 0): ?>
        <table border="1" cellspacing="0" cellpadding="10">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Occupation</th>
                    <th>Message</th>
                    <th>Rating</th>
                    <th>Submitted At</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo htmlspecialchars($row["name"]); ?></td>
                        <td><?php echo htmlspecialchars($row["occupation"]); ?></td>
                        <td><?php echo htmlspecialchars($row["message"]); ?></td>
                        <td><?php echo $row["rating"]; ?>/5</td>
                        <td><?php echo $row["submitted_at"]; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No feedback available yet.</p>
    <?php endif; ?>

    <?php $connection->close(); ?>
</div>

</body>
</html>
