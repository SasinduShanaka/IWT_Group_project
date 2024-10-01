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
    $email = mysqli_real_escape_string($connection, $_POST["email"]);
    $phone = mysqli_real_escape_string($connection, $_POST["phone"]);
    $message = mysqli_real_escape_string($connection, $_POST["message"]);
    
    // Insert data into the database
    $sql = "INSERT INTO contact_us (name, email, phone, message) 
            VALUES ('$name', '$email', '$phone', '$message')";
    
    if (mysqli_query($connection, $sql)) {
        echo "New contact request added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
}

// Fetch contact us data to display in the table
$sql = "SELECT cid, name, email, phone, message FROM contactus";
$result = mysqli_query($connection, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Contact Requests</title>
    <link rel="stylesheet" href="style/managecontacts.css">
</head>
<body>

<div class="contact-table-container">
    <h2>Manage Contact Requests</h2>

    <table border="1" cellspacing="0" cellpadding="10">
        <thead>
            <tr>
                <th>Contact ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
            </tr>
        </thead>
        <tbody>
            <?php if (mysqli_num_rows($result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row["cid"]); ?></td>
                        <td><?php echo htmlspecialchars($row["name"]); ?></td>
                        <td><?php echo htmlspecialchars($row["email"]); ?></td>
                        <td><?php echo htmlspecialchars($row["phone"]); ?></td>
                        <td><?php echo htmlspecialchars($row["message"]); ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No contact requests available yet.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <?php mysqli_close($connection); ?>
</div>

</body>
</html>
