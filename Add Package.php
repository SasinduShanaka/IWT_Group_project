<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet"  type="text/css" href="style/Add Package.css">
</head>

<body>
    <form  action="" method="post">
        <fieldset>
            <h2>Add Package Details</h2>
            
            <label>Package Name</label>
            <input type="text" class="input" name="pname" required><br><br>
            
            <label>Package Type</label>
            <select class="input" name="ptype">
                <option class="option" value="Life Insurance Plan">Life Insurance Plan</option>
                <option class="option" value="Retirement Plan">Retirement Plan</option>
                <option class="option" value="Medical Plan">Medical Plan</option>
                <option class="option" value="Investment Plan">Investment Plan</option>
                <option class="option" value="Group Plan">Group Plan</option>
            </select>
            <br><br>

            <label>Package Description </label>
            <textarea class="input" name="description" rows="10" cols="50" required></textarea><br><br>

            <label>Maximum Coverage Limit </label>
            <input type="number" class="input" name="mcoverage" required><br><br>
            
            <label>Payment Interval</label>
            <input type="number" class="input" name="pay_interval" required><br><br>
            
            <label>Premium Amount </label>
            <input type="number" class="input" name="premium_amount" required><br><br>
            
            <label>Regulation </label>
            <textarea class="input" name="regulation" rows="10" cols="50" required></textarea><br><br>
            
            <label>Total Amount </label>
            <input type="number" class="input" name="total_amount" required><br><br>
            
            <input type="submit" id="btn" value="Add a Package">
        </fieldset>
    </form>
</body>
</html>