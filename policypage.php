<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Protest+Guerrilla&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>LIFEGUARD Assurance</title>
    <link rel="stylesheet" href="style/policypage.css">
</head>
<body>

    
    <div class="policy-form">
        <h1>Add / Update Policy</h1>
        <form id="policyForm">
            <label for="policyNumber">Policy Number:</label>
            <input type="text" id="policyNumber" placeholder="Enter Policy Number" required>

            <label for="policyName">Policy Name:</label>
            <input type="text" id="policyName" placeholder="Enter Policy Name" required>

            <label for="premium">Premium Amount:</label>
            <input type="text" id="premium" placeholder="Enter Premium Amount" required>

            <label for="coverage">Coverage:</label>
            <input type="text" id="coverage" placeholder="Enter Coverage Amount" required>

            <button type="submit">Add / Update Policy</button>
        </form>
    </div>

    
    <div class="policy-list">
        <h2>Policy List</h2>
        <table>
            <thead>
                <tr>
                    <th>Policy Number</th>
                    <th>Policy Name</th>
                    <th>Premium</th>
                    <th>Coverage</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="policyTableBody">
               
            </tbody>
        </table>
    </div>

    <script src="js/policypage.js"></script>
</body>
</html>
