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
            <div class="profile-container">
                <div class="logwrapper">
                    <div class="right-menu">
                        <button class="profilebtn" style="height:max-content;width: fit-content; margin-left: 50%; margin-top:-2%;"><img class="profile-pic" src="images/user-64.ico" alt="" style="width:30%;height: 50%;"></button>
                        <div class="drop-down-menu">
                            <button style="background:#fff; outline:0mm; margin-left: -10%;" ><a href="clientprofilepage.php">Profile</a></button>
                            <button style="background:#fff; outline:none;margin-left: -10%;" ><a href="services.php">Services</a></button>
                          <button style="background:#fff; outline:none;margin-left: -10%;" ><a href="php/logout.php">Log-Out</a></button>
                            <button style="background:#fff; outline:none;margin-left: -10%;"><a href="contactus.php">Contact us</a></button>
                        </div>
                    </div>
                </div>
            </div>
</div>
<br>
<br>
    <div class="maincontainer">
        <br>
        Welcome to the clients page!!!
    </div>
    <div class="skillname">
        Enter the skill you want to hire
    </div>
    <div class="imagecontainer">
        <img src="images/image1.png" alt="" class="slide">
        <div class="content">
        <a href="carpenter.php"><div class="carpenter"><button style="margin-top: -2%;">Book a Carpenter</button></div></a>
        </div>
        <img src="images/image2.png" alt="" class="slide">
        <div class="content">
        <a href="plumber.php"><div class="plumber"><button style="margin-top: -2%;">Book a plumber</button></div></a>
        </div>
        <img src="images/image3.png" alt="" class="slide">
        <div class="content">
        <a href="construction.php"><div class="construction"><button style="margin-top: -2%;">Book a construction worker</button></div></a>
        </div>
        <img src="images/image4.png" alt="" class="slide">
        <div class="content">
        <a href="mason.php"><div class="mason"><button style="margin-top: -2%;">Book a mason</button></div></a>
        </div>
     </div>
</div>
<h2>Your bookings!!!</h2>
<div class="bookinggs">
<?php
 $db = mysqli_connect('localhost',"root",'',"sedatabase4");
$sql = "SELECT Name,number,Emailid FROM users1 WHERE Hiredby = '" . $_SESSION['Emailid'] . "' and Is_Hired = '1'";
$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) > 0) {
  echo "<div class='yourbookings'>";
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<span>Booked worker: " . $row['Name'] . "</span>";
    echo "<br>";
    echo "<span>Worker Email ID: " . $row['Emailid'] . "</span>";
    echo "<br>";
    echo "<span>Worker Number: " . $row['number'] . "</span>";
    echo "<br>";
    echo "<br>";
    echo "<br>";

  }
  echo "</div>";
} else {
  echo "<div class='yourbookings'>";
  echo "<span>No bookings yet!!!</span>";
  echo "</div>";
}

mysqli_close($db);
?>
</div>
<div class="moredeatils" style="background-color:lightblue">
    Contact us 
    73219293176
    gmail 
    linked in
</div>
</body>
</html>
