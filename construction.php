<?php
session_start();
include('php/config.php');
if (empty($_SESSION['Emailid']) && empty($_SESSION['number']) && empty($_SESSION['name']) && empty($_SESSION['genderuser']) && empty($_SESSION['role']) && empty($_SESSION['skill']) && empty($_SESSION['area'])) {
    header('Location:index.php');
    exit; // Add an exit to stop execution after the redirection
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="main3.css" />
    <script src="main.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Daily Jobs Now</title>
    <link rel="website icon" type="png" href="images/daily-jobs-now-high-resolution-logo-white-on-transparent-background.png" >
</head>
<body>
    <div class="uppercontainer">
        <div class="logocontainer"> <img src="images/logo-black.png" class="logo"></div>
        <div class="namecontainer"> <h3>Daily Jobs Now</h3></div>
        <br><br>
        <div class="maincontainer">
            <div class="rate"><h2>We support Equality</h2>
        <p>Hence we have fixed the Rates for Worker</p>
    <h6>The Rate for construction Worker is 1000 per day</h6></div>
            <div class="userslist">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Name</th>
                            <th>Number</th>
                            <th>Area</th>
                            <th>Book Worker</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT name, number, area, Emailid FROM users1 WHERE role='Worker' AND skill = 'ConstructionWorker' AND Is_Hired = '0'";
                        $query_run = mysqli_query($con, $query);
                        if (mysqli_num_rows($query_run) > 0) {
                            foreach ($query_run as $row) { 
                                ?>
                                <tr>
                                    <td><?= $row['Emailid'] ?></td>
                                    <td><?= $row['name'] ?></td>
                                    <td><?= $row['number'] ?></td>
                                    <td><?= $row['area'] ?></td>
                                    <td><a href="booking_details.php?email=<?=$_POST['email']= $row['Emailid'];?>"><button>booknow</button></a></td>
                                </tr>
                                <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="4">No record found</td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
    </div>
    <a href="clientspage.php"><button style="border-radius: 20%;">Go back</button></a>
    <a href="constructionmapspage.php"><button style="border-radius: 20%;">Check Map</button></a>
</body>
</html>
