<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add policy</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&family=Protest+Guerrilla&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/manage_policy.css">
</head>
<body>

<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "IWT_Group_project";

    session_start();
    $connection = mysqli_connect($hostname, $username, $password, $database);

    // Assign variables
    $name = '';
    $description = '';
    $effectivedate = '';
    $expirationdate = '';

    // Fetching data for edit
    if (isset($_GET['update_id'])) {
        $id = $_GET['update_id'];

        $query = "SELECT * FROM policy WHERE policy_id='$id'";
        $query_run = mysqli_query($connection, $query);

        if ($query_run && mysqli_num_rows($query_run) > 0) {
            $row = mysqli_fetch_assoc($query_run);

            $name = $row['policy_name'];
            $description = $row['policy_description'];
            $effectivedate = $row['effective_date'];
            $expirationdate = $row['expiration_date'];
        }
    }

    // Delete policy 
    if (isset($_GET['delete_id'])) {
        $id = $_GET['delete_id'];
        $query = "DELETE FROM policy WHERE policy_id='$id'";
        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            $_SESSION['success'] = "Policy is deleted";
            header('Location: manage_policy.php');
        } else {
            $_SESSION['status'] = "Cannot delete the policy";
            header('Location: manage_policy.php');
        }
    }

    // Adding policy data
    if (isset($_POST['add_policy'])) {
        $name = $_POST['policy_name'];
        $description = $_POST['policy_description'];
        $effectivedate = $_POST['effective_date'];
        $expirationdate = $_POST['expiration_date'];

        $query = "INSERT INTO policy (policy_name, policy_description, effective_date, expiration_date) VALUES ('$name', '$description', '$effectivedate', '$expirationdate')";
        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            $_SESSION['success'] = "Policy added";
            header('Location: manage_policy.php');
        } else {
            $_SESSION['status'] = "Cannot add the policy";
            header('Location: manage_policy.php');
        }
    }

    // Updating policy data
    if (isset($_POST['update_policy'])) {
        $id = $_POST['policy_id'];
        $name = $_POST['policy_name'];
        $description = $_POST['policy_description'];
        $effectivedate = $_POST['effective_date'];
        $expirationdate = $_POST['expiration_date'];

        $query = "UPDATE policy SET policy_name='$name', policy_description='$description', effective_date='$effectivedate', expiration_date='$expirationdate' WHERE policy_id='$id'";
        $query_run = mysqli_query($connection, $query);

        if ($query_run && mysqli_affected_rows($connection) > 0) {
            $_SESSION['success'] = "Policy updated";
            header('Location: manage_policy.php');
        } else {
            $_SESSION['status'] = "Cannot update the policy";
            header('Location: manage_policy.php');
        }
    }
?>


<!-- Form to Add or Update policy -->
<div class="container" id="form-container">
    <h2><?php echo isset($_GET['update_id']) ? 'Update Policy' : 'New Policy'; ?></h2>
    <form method="post" action="manage_policy.php">
        <input type="hidden" name="policy_id" value="<?php echo isset($id) ? $id : ''; ?>">
        <div class="inputs">
            <label>Enter Policy Name</label><br>
            <input type="text" name="policy_name" id="name" value="<?php echo $name ?>" required><br>
            <label>Enter Policy Description</label><br>
            <input type="text" name="policy_description" id="description" value="<?php echo $description ?>" required><br>
            <label>Enter Effective Date</label><br>
            <input type="date" name="effective_date" id="effective_date" value="<?php echo $effectivedate ?>" required><br>
            <label>Enter Expiration Date</label><br>
            <input type="date" name="expiration_date" id="expiration_date" value="<?php echo $expirationdate ?>" required><br>

            <?php if (isset($_GET['update_id'])) { ?>
                <button type="submit" name="update_policy" class="button" id="btn">Update Policy</button>
            <?php } else { ?>
                <button type="submit" name="add_policy" class="button" id="btn">Add New Policy</button>
            <?php } ?>
        </div>
    </form>
</div>

<!-- policy Table -->
<div class="container" id="table-container">
    <h2>List of Policies</h2>
    <br>
    <!-- Fetch and Display List of policies -->
    <?php
    $query = "SELECT * FROM policy";
    $query_run = mysqli_query($connection, $query);
    ?>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>DESCRIPTION</th>
                <th>EFFECTIVE DATE</th>
                <th>EXPIRATION DATE</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if (mysqli_num_rows($query_run) > 0) {
            while ($row = mysqli_fetch_assoc($query_run)) {
                ?>
                <tr>
                    <td><?php echo $row['policy_id']; ?></td>
                    <td><?php echo $row['policy_name']; ?></td>
                    <td><?php echo $row['policy_description']; ?></td>
                    <td><?php echo $row['effective_date']; ?></td>
                    <td><?php echo $row['expiration_date']; ?></td>


                    <td>
                        <a class='button' id='btn1' name="update" href='manage_policy.php?update_id=<?php echo $row['policy_id']; ?>'>Update</a>
                        <a class='button' id='btn2' name="delete" href='manage_policy.php?delete_id=<?php echo $row['policy_id']; ?>' onclick="return confirm('Are you sure you want to delete this policy?');">Delete</a>
                    </td>
                </tr>
                <?php
            }
        } 
        else
        {
            echo "<tr><td colspan='5'>No record found</td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>

</body>
</html>
