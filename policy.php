<!DOCTYPE html>
<html>
<head>
    <title>Privacy Policy</title>
    <link rel="stylesheet" href="style/policy.css">
    <script src="js/policy.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Protest+Guerrilla&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Privacy Policy</h1>
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

            // query
            $query = "SELECT * FROM policy WHERE policy_description IS NOT NULL";
            $query_run = mysqli_query($connection, $query);

            // Check if the query execute successfully
            if ($query_run) 
            {
                 if (mysqli_num_rows($query_run) > 0)
                {
                     while ($row = mysqli_fetch_assoc($query_run)) 
                     {
                         $name = $row['policy_name']; //fetching details
                         $description = $row['policy_description'];

                        //display details
                         echo "<button>$name</button> 
                               <p>$description</p>";
                     }
                } 
                else 
                {
                  echo "No policies found.";
                }
            } 
            else 
            {
                 echo "Error: " . mysqli_error($connection);
            }

        // Close the connection
        $connection->close();
        ?>
      
    </div>

</body>
</html>
