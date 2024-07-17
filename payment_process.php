<?php
session_start();
include('php/config.php'); // Make sure 'db.php' contains a valid database connection

// Check if 'amt' and 'name' are set in the POST request
if(isset($_POST['amt']) && isset($_POST['name'])){
    $amt = floatval($_POST['amt']); // Convert the amount to a float
    $name = mysqli_real_escape_string($con, $_POST['name']); // Sanitize user input

    // Perform further validation if needed (e.g., check if $amt is a valid positive number)

    $payment_status = "pending";
    $added_on = date('Y-m-d H:i:s');

    // Insert payment details into the database
    $insert_query = "INSERT INTO payment (name, amount, payment_status, added_on) VALUES ('$name', '$amt', '$payment_status', '$added_on')";
    $result = mysqli_query($con, $insert_query);

    if ($result) {
        $_SESSION['OID'] = mysqli_insert_id($con); // Store the inserted payment ID in the session
    } else {
        // Handle the database insertion error (e.g., log it or display an error message)
        die("Payment failed. Please try again later.");
    }
}

// Check if 'payment_id' and 'OID' are set in the POST request and update payment status
if(isset($_POST['payment_id']) && isset($_SESSION['OID'])){
    $payment_id = mysqli_real_escape_string($con, $_POST['payment_id']); // Sanitize user input
    $oid = $_SESSION['OID'];

    // Update the payment status and payment_id in the database
    $update_query = "UPDATE payment SET payment_status='complete', payment_id='$payment_id' WHERE id='$oid'";
    $update_result = mysqli_query($con, $update_query);

    if (!$update_result) {
        // Handle the database update error (e.g., log it or display an error message)
        die("Payment update failed. Please contact customer support.");
    }
}
?>
