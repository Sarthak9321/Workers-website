<?php
session_start();
include('php/config.php');
if (empty($_SESSION['Emailid']) && empty($_SESSION['emailid'])) {
    header('Location: index.php');
    exit();
}
$email = $_SESSION['Emailid'];
$email1 = $_SESSION['emailid'];
$day = $_COOKIE['event'];
$db = mysqli_connect('localhost', "root", '', "sedatabase4");

// The `UPDATE` statement should use the `SET` clause to update the `days` field, not the `into` keyword.
$sql = "UPDATE users1 SET days ='$day' WHERE hiredby = '$email' and Emailid='$email1' ";
$sql1 = "UPDATE users1 SET stat ='1' WHERE hiredby = '$email' and Emailid='$email1' ";
$result = mysqli_query($con, $sql);
$result = mysqli_query($con, $sql1);

// Create an array to store booked email IDs
$bookedEmails = array();

if (isset($_POST['remove_button'])) {
    $remove_email = $_POST['remove_email'];

    // Create an SQL statement to update the row in the database
    $remove_sql = "UPDATE users1 SET days = 0, hiredby = '' WHERE Emailid = '$remove_email'";
$sql1 = "UPDATE users1 SET stat ='0s' WHERE hiredby = '$email' and Emailid='$email1' ";

    if (mysqli_query($con, $remove_sql)&&mysqli_query($con, $sql1) ) {
        // Add the removed email to the array
        $bookedEmails[] = $remove_email;
    } else {
        echo "Error removing row: " . mysqli_error($con);
    }
}

// Store the array in a session variable
$_SESSION['bookedEmails'] = $bookedEmails;

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
    <div class>
        <div class="logocontainer"> <img src="images/logo-black.png" class="logo"></div>
        <div class="namecontainer"> <h3>Daily Jobs Now</h3>
        </div>
        <br>
        <br>
        <div class="maincontainer">
            <div class="cart">
                <h2>Cart</h2>
                <table class="table">
                <thead>
                <tr>
            <th>Email</th>
            <th>Name</th>
            <th>Number</th>
            <th>Area</th>
            <th>Days</th>
            <th>Skill</th>
            <th>Action</th>
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
                    <td> <form method="post">
            <input type="hidden" name="remove_email" value="<?= $row['Emailid'] ?>">
            <button type="submit" name="remove_button">Remove</button>
        </form></td>
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
                <a href="clientspage.php"><button style="border-radius: 20%;">Book More Workers</button></a>
                <a href="confirmationpage.php"><button style="border-radius: 20%;">Checkout</button></a>
            </div>
        </div>
        <br>
    </div>
</body>
</html>
