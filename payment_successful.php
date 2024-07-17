<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('php/config.php');

if (empty($_SESSION['Emailid']) && empty($_SESSION['emailid'])) {
    header('Location: index.php');
    exit();
}

$email = $_SESSION['Emailid'];
$query1 = "SELECT * FROM users1 WHERE Emailid='$email'";
$query_run = mysqli_query($con, $query1);
if (mysqli_num_rows($query_run) > 0) {
    foreach ($query_run as $row) {
$namec=$row['Name'];
$nom=$row['number'];
}}
$query = "SELECT name,number,area,Emailid,days,skill FROM users1 WHERE Hiredby='$email' AND stat='1'";
$query_run = mysqli_query($con, $query);
// Sender's email address and password


if (mysqli_num_rows($query_run) > 0) {
    foreach ($query_run as $row) {
        $bookedEmails[] = $row['Emailid'];
        $email1 = $row['Emailid'];
        $name = $row['name'];
        $pos = $row['skill'];
    
        $python_program = 'support1.py';
        // Execute the Python program and get the output
        $output = shell_exec("python $python_program \"$email1\" \"$name\" \"$pos\" \"$namec\" \"$nom\"");
        // Do something with $output if needed
    }
}

// Update the 'Is_Hired' field in the database
$sql = "UPDATE users1 SET Is_Hired = '1' WHERE Emailid = ?";
$stmt = mysqli_prepare($con, $sql);

if ($stmt) {
    foreach ($bookedEmails as $email1) {
        mysqli_stmt_bind_param($stmt, "s", $email1);
        mysqli_stmt_execute($stmt);
    }
    mysqli_stmt_close($stmt);
} else {
    echo "Error updating database: " . mysqli_error($con);
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main5.css" />
    <title>Daily Jobs Now</title>
    <link rel="website icon" type="png" href="images/daily-jobs-now-high-resolution-logo-white-on-transparent-background.png">
</head>
<body>
<div class="uppercontainer">
    <div class="logocontainer"><img src="images/logo-black.png" class="logo"></div>
    <div class="namecontainer"><h3>Daily Jobs Now</h3></div>
    <div class="maincontainer">
        <div class="alert alert-success">
            Payment Successful
        </div>
    </div>
    <div class="goback">
        <a href="clientspage.php"><button style="border-radius: 20%;">Return to Main Page</button></a>
    </div>
</div>
</body>
</html>
