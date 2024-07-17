<?php
session_start();
include('php/config.php');
if(empty($_SESSION['Emailid'])&& empty($_SESSION['number'])&& empty($_SESSION['name'])&& empty($_SESSION['genderuser'])&&empty($_SESSION['role'])&&empty($_SESSION['area'])):
    header('Location:index.php');
endif;
?>
<!DOCTYPE >
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main1.css" />
    <script src="main5.js">
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
    </div>
    <div class="maincontent">
      <h2>Welcome to the Daily Jobs Now Portal</h2>
      <div class="credentails">
        <br>
        <br>
        <label> Your Area you are efficient to work with</label>
        <a href='maps.php'><button>Select Area</button></a>
        </div>
        <form action="authentation4.php"  method="POST">
        <input type="text" id="lat" name="lat" required readonly value="<?php echo $_COOKIE['lat']; ?>">latitude
        <input type="text" id ="lon" name="lon" required readonly value="<?php echo $_COOKIE['lon']; ?>"> longitude
        <br>
        <br>    
        <input type="submit" name="submit" value="Register">

</form>
    </div>
  </div>
</body>
</html>
