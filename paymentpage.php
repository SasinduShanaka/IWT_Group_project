<!DOCTYPE html>
<html>
<head>
    <title>LIFEGUARD Assurance</title>
    <link rel="stylesheet" href="style/paymentpage.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Protest+Guerrilla&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>

<body>

    <div class="payment">
        <h1>Payment</h1>
        <form class="inputs">

                <label>Cardholder's Name</label>
                <input type="text" id="cardName" placeholder="Enter cardholder's name" required>
           
                <label>Card Number</label>
                <input type="text" id="cardNumber" placeholder="Enter card number" required>
            
                <label>Expiry Date</label>
                <input type="text" id="expiryDate" placeholder="MM/YY" required>
            
                <label>CVV</label>
                <input type="text" id="cvv" placeholder="Enter cvv"required>
            
                <label>Amount (Rs.)</label>
                <input type="number" id="amount" placeholder="Enter amount" required>
            
                <button type="submit">Pay Now</button>

        </form>
        
    </div>

</body>
</html>
