<?php session_start();
include('php/config.php');
if(empty($_SESSION['Emailid'])&& empty($_SESSION['number'])&& empty($_SESSION['name'])&& empty($_SESSION['genderuser'])&&empty($_SESSION['role'])):
    header('Location:index.php');
endif;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main1.css" />
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
    <div class="maincontent">
      <h2>Welcome to the Daily Jobs Now Portal</h2>

      <form action="authentation3.php"  method="POST">
      <div class="credentails">
        <br>
        
       <label> Enter your highest proficient Skill</label>
        <br>
        <input type="radio" name="skill" value="Carpenter "> Carpenter
        <br>
        <input type="radio" name="skill" value="Plumber "> Plumber
        <br>
        <input type="radio" name="skill" value="ConstructionWorker "> Construction Worker
        <br>
        <input type="radio" name="skill" value="Mason "> Mason
        <br>
        <br>
        <label> Your Area you are efficient to work with</label>
        <input type="" name="area"  required><br>
    
    </div>
        <input type="submit" name="submit" value="Register">
    </div>
</form>
    </div>
    </div>
</body>
</html>