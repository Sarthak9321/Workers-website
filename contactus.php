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
    <script src="main2.js">
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
<div class="contactuscontainer">
    <h5>
        US!!
    </h5>
    <h6> This is who we are</h6>
    <li>Mayank Lad
        <p>Hello, This is Mayank Lad, A tech Enthusiast, A coder and A Developer</p>
        <p>Feel free to contact me</p>
        <a href="https://www.linkedin.com/in/mayank-lad-51b63023a/">linkedin</a><br>
        <a href="https://github.com/Mayank-Lad">github</a><br>
</li>
<li> Sarthak Giakwad
<p>Hello, This is Sarthak,Experienced front-end development with a passion for creating responsive and visually engaging web applications using HTML, CSS</p>
<a href="https://github.com/Sarthak9321">github</a><br>

</li>
<li> Parth Sase
<p>Hello, This is Parth Sase here, Engineering precision meets artistic vision in my creations</p>
<a href="https://github.com/ParthSase20">github</a><br>

</li>
<li> Aryaman Jain
<p>This is a prototype text</p>

</li>

</div>
<a href="clientspage.php"><button style="border-radius: 20%;">Go back</button></a>

</body>
</html>