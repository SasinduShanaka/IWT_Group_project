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
$connection = mysqli_connect($hostname,$username,$password,$database);

// Fetching data for update
if (isset($_GET['update_id'])) 
{
    $id = $_GET['update_id'];
    $query = "SELECT * FROM policy WHERE policy_id='$id'";
    $query_run = mysqli_query($connection, $query);

    if ($row = mysqli_fetch_assoc($query_run)) 
    {
        $policy_id = $row['policy_id'];
        $policy_name = $row['policy_name'];
        $policy_description = $row['policy_description'];
        $effective_date = $row['effective_date'];
        $expiration_date = $row['expiration_date'];
    }
}


/*function updatePolicy(policyID) 
{
    const policyRow = document.getElementById(`policy-${policyID}`);
    document.getElementById("PolicyID").value = policyID;
    document.getElementById("PkgID").value = policyRow.querySelector('.PkgID').textContent;
    document.getElementById("Policytype").value = policyRow.querySelector('.Policytype').textContent;
    document.getElementById("Policystatus").value = policyRow.querySelector('.Policystatus').textContent;
    document.getElementById("EffectiveDate").value = policyRow.querySelector('.EffectiveDate').textContent;
    document.getElementById("ExpirationDate").value = policyRow.querySelector('.ExpirationDate').textContent;
}*/






// Delete policy logic
if (isset($_GET['delete_id'])) 
{
    $id = $_GET['delete_id'];
    $query = "DELETE FROM policy WHERE policy_id='$id'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) 
    {
        $_SESSION['success'] = "policy is deleted";
        header('Location: manage_policy.php');
    } 
    else 
    {
        $_SESSION['status'] = "Cannot delete the policy";
        header('Location: manage_policy.php');
    }
}

// Adding policy data
if (isset($_POST['add_policy'])) 
{
    $id = $_POST['policy_id'];
    $name = $_POST['policy_name'];
    $description = $_POST['policy_description'];
    $effectivedate = $_POST['effective_date'];
    $expirationdate = $_POST['expiration_date'];

    $query = "INSERT INTO policy( policy_name, policy_description, effective_date, expiration_date) VALUES ( '$name', '$description', '$effectivedate', '$expirationdate')";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) 
    {
        $_SESSION['success'] = "Policy added";
        header('Location: manage_policy.php');
    } 
    else 
    {
        $_SESSION['status'] = "Cannot add the policy";
        header('Location: manage_policy.php');
    }
}

// Updating policy data
if (isset($_POST['update_policy'])) 
{
    $id = $_POST['policy_id'];
    $name = $_POST['policy_name'];
    $description = $_POST['policy_description'];
    $effectivedate = $_POST['effective_date'];
    $expirationdate = $_POST['expiration_date'];

    $query = "UPDATE policy SET name='$name', description='$description', effectivedate='$effectivedate', expirationdate='$expirationdate' WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) 
    {
        $_SESSION['success'] = "Policy updated";
        header('Location: manage_policy.php');
    } 
    else 
    {
        $_SESSION['status'] = "Cannot update the policy";
        header('Location: manage_policy.php');
    }
}
?>

<!-- Form to Add or Edit policy -->
<div class="container" id="form-container">
    <h2><?php echo isset($policy_id) ? 'Edit policy' : 'New policy'; ?></h2>
    <form method="post" action="">
        <div class="inputs">
            
            <label for="policy_name">Enter Policy Name</label><br>
            <input type="text" name="policy_name" id="name" value="<?php echo isset($policy_name) ? $policy_name : ''; ?>" required><br>
            <label for="policy_description">Enter Policy Description</label><br>
            <input type="text" name="policy_description" id="description" value="<?php echo isset($policy_description) ? $policy_description : ''; ?>" required><br>
            <label for="effective_date">Enter Effective Date</label><br>
            <input type="date" name="effective_date" id="effective_date" value="<?php echo isset($effective_date) ? $effective_date : ''; ?>" required><br>
            <label for="expiration_date">Enter Expiration Date</label><br>
            <input type="date" name="expiration_date" id="expiration_date" value="<?php echo isset($expiration_date) ? $expiration_date : ''; ?>" required><br>

            <?php if (isset($policy_id)) { ?>
                <button type="submit" name="update_policy" class="button" id="btn">Update Policy</button>
            <?php } else { ?>
                <button type="submit" name="add_policy" class="button" id="btn">Add New Policy</button>
            <?php } ?>
        </div>
    </form>
</div>

<br>

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
        if (mysqli_num_rows($query_run) > 0) 
        {
            while ($row = mysqli_fetch_assoc($query_run)) 
            {
                ?>
                <tr>
                    <td><?php echo $row['policy_id']; ?></td>
                    <td><?php echo $row['policy_name']; ?></td>
                    <td><?php echo $row['policy_description']; ?></td>
                    <td><?php echo $row['effective_date']; ?></td>
                    <td><?php echo $row['expiration_date']; ?></td>
                    <td>
                        <a class='button' id='btn1' href='manage_policy.php?edit_id=<?php echo $row['policy_id']; ?>'>Update</a>
                        <a class='button' id='btn2' href='manage_policy.php?delete_id=<?php echo $row['policy_id']; ?>' onclick="return confirm('Are you sure you want to delete this policy?');">Delete</a>
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
