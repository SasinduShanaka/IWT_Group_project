<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&family=Protest+Guerrilla&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>LIFEGUARD Assurance</title>
    <link rel="stylesheet" href="style/policypage.css">
</head>
<body>

<div class="policy-form">
    <h1>Add / Update Policy</h1>
    <form id="policyForm">
        <label for="PolicyID">Policy ID:</label>
        <input type="text" id="PolicyID" placeholder="Enter Policy ID" required>

        <label for="PkgID">Pkg ID:</label>
        <input type="text" id="PkgID" placeholder="Enter Pkg ID" required>

        <label for="Policytype">Policy Type:</label>
        <input type="text" id="Policytype" placeholder="Enter Policy Type" required>

        <label for="Policystatus">Policy Status:</label>
        <input type="text" id="Policystatus" placeholder="Enter Policy Status" required>

        <label for="EffectiveDate">Effective Date:</label>
        <input type="date" id="EffectiveDate" required>

        <label for="ExpirationDate">Expiration Date:</label>
        <input type="date" id="ExpirationDate" required>

        <button type="submit">Add / Update Policy</button>
    </form>
</div>

<div class="policy-list">
    <h2>Policy List</h2>
    <table>
        <thead>
            <tr>
                <th>Policy ID</th>
                <th>Pkg ID</th>
                <th>Policy Type</th>
                <th>Policy Status</th>
                <th>Effective Date</th>
                <th>Expiration Date</th>
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
