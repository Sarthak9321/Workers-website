<?php
session_start();
include('php/config.php');
if (empty($_SESSION['Emailid']) && empty($_SESSION['emailid'])) {
    header('Location: index.php');
    exit;
}
$email = $_SESSION['Emailid'];
$email1 = $_SESSION['emailid'];
$totalamt = 0;

// Retrieve the 'amt' parameter from the URL
$amt = isset($_COOKIE['amountininr']) ? $_COOKIE['amountininr'] : '0'; // Default to 0 if 'amt' is not provided

// Perform currency conversion using a valid exchange rate source
$apiKey = 'c31a77dfb280f6207871a16637899f65'; // Replace with your API key
$convertedAmount = 0.00; // Default value

if (!empty($amt)) {
    $fromCurrency = 'INR';
    $toCurrency = 'USD';
    $exchangeRate = getExchangeRate($fromCurrency, $toCurrency);

    if ($exchangeRate !== false) {
        $convertedAmount = $amt * $exchangeRate;
    }
}

// Function to get the exchange rate (replace with a valid source)
function getExchangeRate($fromCurrency, $toCurrency)
{
    // Replace with a valid URL for exchange rate data
    $url = "https://api.example.com/exchangerates?base=$fromCurrency&symbols=$toCurrency";

    // Use cURL or another method to fetch the exchange rate data from the URL

    // For demonstration purposes, use a fixed exchange rate (1 INR = 0.014 USD)
    return 0.014;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PayPal Payment</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Product Checkout</h1>
        <div class="product">
            <p>Product: Sample Product</p>
            <p>Price in INR: <?php echo $amt; ?></p>
            <p>Price in USD: <?php echo number_format($convertedAmount, 2); ?></p>
            <div id="paypal-button-container"></div>
        </div>
    </div>

    <!-- Include the PayPal JavaScript SDK separately -->
    <script src="https://www.paypal.com/sdk/js?client-id=ARpGS3boxuc-S59wEW-6GMAYyOHZvM_pZVwd5zGcMNLhGYYAEF4sForX3LtQSYRh-31tbhRZ31oe0ABY&currency=USD"></script>

    <script>
        // Custom JavaScript code for PayPal integration
        paypal.Buttons({
            createOrder: function (data, actions) {
                // Set up the transaction
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: Number(<?php echo $convertedAmount; ?>), // Use the converted amount
                            currency_code: 'USD', // Currency code for USD
                        },
                    }],
                });
            },
            onApprove: function (data, actions) {
                // Capture the funds from the transaction
                return actions.order.capture().then(function (details) {
                    // Handle successful payment, e.g., show a thank you message
                    alert('Payment successful. Transaction ID: ' + details.id);
                });
            },
        }).render('#paypal-button-container'); // Replace with your button element ID
    </script>
</body>
</html>
