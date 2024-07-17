<?php session_start();
include('php/config.php');
if(empty($_SESSION['Emailid'])&&empty($_GET['email'])):
    header('Location:index.php');
endif;?>
<?php
$email = $_SESSION['Emailid'];
$email1 = $_GET['email']; // Define the email variable
 // Define the email variable
// Update the user's hiredby field
$sql = "UPDATE users1 SET hiredby = '" . $email . "' WHERE Emailid = '" . $email1 . "'";
$result = mysqli_query($con, $sql);
$_SESSION['emailid']=$email1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main5.css" />
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
        </div>
</div>
    <div class="calendar">
        <div class="header">
            <button id="prevMonth">Previous</button>
            <h1 id="currentMonthYear"></h1>
            <button id="nextMonth">Next</button>
        </div>
        <div class="days"></div>
    </div>
    <div class="legend">
        <div class="legend-item">
            <div class="mark mark-empty"></div>
            <span>No Booking</span>
        </div>
        <div class="legend-item">
            <div class="mark mark-filled"></div>
            <span>Booking</span>
        </div>
    </div>
    <div id="eventCounter">Total Days: <span id="markedDaysCount"></span></div>
    <div id="eventCounter">Marked Dates: <ul id="marked-dates"></ul></div>
    <a href="cart.php?email=<?php $_SESSION['Emailid']; ?>"><button>go to cart</button></a>
    <script src="main4.js"></script>
</body>
</html>
