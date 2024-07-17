<?php session_start();
include('php/config.php');
if(empty($_SESSION['Emailid'])):
    header('Location:index.php');
endif;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main3.css" />
    <script src="main1.js">
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Daily Jobs Now</title>
    <link rel="website icon" type="png" href="images/daily-jobs-now-high-resolution-logo-white-on-transparent-background.png" >
</head>
<body>
    <div class="uppercontainer">
        <div class="logocontainer"> <img src="images/logo-black.png" class="logo"></div>
        <div class="namecontainer"> <h3>Daily Jobs Now</h3>
        </div>
        <div class="maincontainer">
            Booking Page
            <?php
// Get the email address from the query string
$email = $_GET['email'];

// The path to the Python program
$python_program = 'support1.py';

// The function to call
$function = 'mail';

// The parameter to pass to the function

// Execute the Python program and get the output
$output = shell_exec("python $python_program \"$email\" ");


?>
        
</div>
</div>
</body>
</html>
