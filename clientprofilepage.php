<?php session_start();
include('php/config.php');
if(empty($_SESSION['Emailid'])&& empty($_SESSION['number'])&& empty($_SESSION['genderuser'])&&empty($_SESSION['role'])):
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
    <script src="main.js">
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
        <br>
    </div>
    <div class="profilepage">
       <p> Welcome to Profile Page <p>
    <p>Logged in user's email: <?php echo $_SESSION['Emailid'] ?></p>
    <P>Logged in user's number: <?php echo $_SESSION['number'] ?></p>
    <P>Logged in user's gender: <?php echo $_SESSION['genderuser'] ?></p>
    <P>Logged in user's role: <?php echo $_SESSION['role'] ?></p>
    </div>
    <a href="clientspage.php"><button style="border-radius: 20%;">Go back</button></a>
</body>
</html>