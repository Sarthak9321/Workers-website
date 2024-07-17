<?php
session_start();
include('php/config.php');
if (empty($_SESSION['Emailid']) && empty($_SESSION['emailid'])) {
    header('Location: index.php');
    exit();
}
$email = $_SESSION['Emailid'];
$bookedEmails=array();
$email1=$_SESSION['emailid'];
$bookedEmails = $_SESSION['bookedEmails']; // Retrieve the booked email IDs array from the session
$totalamt = 0;
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
    <title>Daily Jobs Now - confirmationpage</title>
    <link rel="website icon" type="png" href="images/daily-jobs-now-high-resolution-logo-white-on-transparent-background.png" >
</head>
<body>
    <div class>
        <div class="logocontainer"> <img src="images/logo-black.png" class="logo"></div>
        <div class="namecontainer"> <h3>Daily Jobs Now</h3>
        </div>
        <br>
        <br>
        <div class="maincontainer">
            <div class="cart">
                <h2>Confirm Details</h2>
                <table class="table">
                <thead>
                <tr>
            <th>Email</th>
            <th>Name</th>
            <th>Number</th>
            <th>Area</th>
            <th>Days</th>
            <th>Skill</th>
            <th>Amount in INR</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $query = "SELECT name,number,area,Emailid,days,skill FROM users1 WHERE Hiredby='$email'";
            $query_run= mysqli_query($con,$query);
            if(mysqli_num_rows($query_run)>0){
                foreach($query_run as $row)
                {
                ?>
                <tr>
                    <td><?=$row['Emailid']?></td>
                    <td><?=$row['name']?></td>
                    <td><?=$row['number']?></td>
                    <td><?=$row['area']?></td>
                    <td><?=$row['days']?></td>
                    <td><?=$row['skill']?></td>
                    <td> <?php

                    $_SESSION['email']=$row['Emailid'];
                        $skill = $row['skill'];
                        if ($skill == 'ConstructionWorker') {
                            echo($amount = $row['days'] * 10);
                        } elseif ($skill == 'Mason') {
                            echo($amount = $row['days'] * 800);
                        } elseif ($skill == 'carpenter') {
                            echo($amount = $row['days'] * 600);
                        } elseif ($skill == 'Plumber') {
                            echo($amount = $row['days'] * 750);
                        }
                        
                        $totalamt += $amount;
                        ?></td>
                </tr>
                <?php
                }
            }else{

            ?>
                <tr>
                    <td colspan="4">No record found</td>
                </tr>
            <?php
            }
            ?>
           
            </tbody>
            </table>
            <div class="total">
                <p>Total amount: “&#x20b9”<?php echo($totalamt);?>/-
        </p>
           <script>amount(<?php echo($totalamt)?>);
            function amount(amount){
        createCookies('amountininr',amount,1);
        function createCookies(name, value, days) {
            var expires;
            const date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        
            document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
        }
    }
    </script>
            </div>
                <a href="cart.php"><button style="border-radius: 20%;">Go back</button></a>
                <a href="payment.php"><button style="border-radius: 20%;">Checkout</button></a>
            </div>
        </div>
        <br>
    </div>
    <?php
    
    ?>
</body>
</html>
