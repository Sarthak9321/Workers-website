<?php
session_start();
include('php/config.php');
if (empty($_SESSION['Emailid']) && empty($_SESSION['emailid'])) {
    header('Location: index.php');
    exit();
}
$email = $_SESSION['Emailid'];
$bookedEmails=array();
$bookedEmails = $_SESSION['bookedEmails']; // Retrieve the booked email IDs array from the session
$totalamt = $_COOKIE['amountininr'];

require('razorpay-php-2.8.6/Razorpay.php'); // Include the Razorpay PHP library
$key_id = "rzp_test_VcteOFdguJjvp2";
$secret = "wPldkyoocjaX74Kt5xk1CaEb";
// Amount in paise (e.g., 1000000 paise = 10000 INR)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main3.css" />
    <script src="main4.js">
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Daily Jobs Now - Cart</title>
    <link rel="website icon" type="png" href="images/daily-jobs-now-high-resolution-logo-white-on-transparent-background.png" >
</head>
<body>
    <div class="uppercontainer">
        <div class="logocontainer"><img src="images/logo-black.png" class="logo"></div>
        <div class="namecontainer"><h3>Daily Jobs Now</h3></div>
        <br>
        <br>
        <div class="maincontainer">
            <div class="cart">
                <h2>Confirm Details</h2>
                <table class="table">
                    <!-- ... (table header) ... -->
                    <tbody>
                        <?php
                        // ... (code for fetching and displaying order details) ...
                        ?>
                    </tbody>
                </table>
                <div class="total">
                <p>The emails are:
                <?php $query = "SELECT name,number,area,Emailid,days,skill FROM users1 WHERE Hiredby='$email' and stat='1'";
            $query_run= mysqli_query($con,$query);
            if(mysqli_num_rows($query_run)>0){
                foreach ($query_run as $row) {
                    $emails[] = $row['Emailid']; // Store each email in the array
                }
                echo implode(', ', $emails);
                    }
                    ?>
    </p>
                    <p>Total amount: <?php echo($totalamt); ?>/-</p>
                    <button id="rzp-button1">Pay</button>
                </div>
                <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
                <script>
                    var options = {
                        "key": "<?php echo $key_id; ?>",
                        "amount": <?php echo $totalamt; ?>,
                        "currency": "INR",
                        "name": "Daily Jobs Now",
                        "description": "Test Transaction",
                        "image": "file:///C:/xampp/htdocs/seminioroject/images/logo-black.png",
                        "order_id": "order_Mb7gjSY0K8LXj9",
                        "handler": function (response) {
                            window.location.href = "payment_successful.php";
                        },
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.on('payment.failed', function (response) {
                        alert(response.error.code);
                        alert(response.error.description);
                        alert(response.error.source);
                        alert(response.error.step);
                        alert(response.error.reason);
                        alert(response.error.metadata.order_id);
                        alert(response.error.metadata.payment_id);
                    });
                    document.getElementById('rzp-button1').onclick = function (e) {
                        rzp1.open();
                        e.preventDefault();
                    }
                </script>
            </div>
        </div>
        <br>
    </div>
</body>
</html>