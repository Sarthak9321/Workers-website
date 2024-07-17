<?php
session_start();
include('php/config.php');
if (empty($_SESSION['Emailid']) && empty($_SESSION['number']) && empty($_SESSION['name']) && empty($_SESSION['genderuser']) && empty($_SESSION['role']) && empty($_SESSION['skill']) && empty($_SESSION['area'])) {
    header('Location:index.php');
}

$email = $_SESSION['Emailid'];

if (isset($_POST['change'])) {
    // Make sure to sanitize user input to prevent SQL injection
    $status = intval($_POST['status']);

    // Prepare and execute the SQL query
    $sql = "UPDATE users1 SET Is_Hired='$status' WHERE Emailid='$email'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        // Update the session variable to reflect the new status
        $_SESSION['Is_Hired'] = $status;
    }
}

// Fetch the user's current status
$status = $_SESSION['Is_Hired'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main3.css"/>
    <script src="main1.js">
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Daily Jobs Now</title>
    <link rel="website icon" type="png" href="images/daily-jobs-now-high-resolution-logo-white-on-transparent-background.png" >
</head>
<body>
    <div class="uppercontainer">
        <div class="logocontainer"><img alt="login" src="images/logo-black.png" class="logo" ></div>
        <div class="namecontainer"> <h3>Daily Jobs Now</h3>
        </div>
        <div class="profile-container">
                <div class="logwrapper">
                    <div class="right-menu">
                        <button class="profilebtn" style="height:max-content;width: fit-content; margin-left: 50%; margin-top:-2%;"><img class="profile-pic" src="images/user-64.ico" alt="" style="width:30%;height: 50%;"></button>
                        <div class="drop-down-menu">
                            <button style="background:#fff; outline:0mm; margin-left: -10%;" ><a href="workersprofilepage.php">Profile</a></button>
                            <button style="background:#fff; outline:none;margin-left: -10%;" ><a href="services.php">Services</a></button>
                          <button style="background:#fff; outline:none;margin-left: -10%;" ><a href="php/logout.php">Log-Out</a></button>
                            <button style="background:#fff; outline:none;margin-left: -10%;"><a href="contactus.php">Contact us</a></button>
                        </div>
                    </div>
                </div>
            </div>
            <br>
<br>
    <div class="maincontainer">
        <br>
        Welcome to the Workers page!!!
        <br>
        <br>
        <div class="details">
        <p>Logged in user's email: <?php echo $email ?></p>
        <p>Logged in user's status: <span id="user-status"><?php echo ($status == 0) ? "Not Hired" : "Hired"; ?></span></p>
        <p>Change your status:</p>
        <!-- Form to change user's status -->
        <form method="post" onsubmit="updateUserStatus()">
            <label for="status">Are you already hired for now?</label>
            <select name="status" id="status">
                <option value="0" <?php if ($status == 0) echo "selected"; ?>>Not Hired</option>
                <option value="1" <?php if ($status == 1) echo "selected"; ?>>Hired</option>
            </select>
            <input type="submit" name="change" value="Change Status">
        </form>
    </div>
    </div>
    </div>
    <!-- JavaScript to update the status dynamically -->
    <script>
        function updateUserStatus() {
            const statusSelect = document.getElementById('status');
            const userStatus = document.getElementById('user-status');

            // Get the selected status value
            const newStatus = statusSelect.value;

            // Update the displayed status
            userStatus.textContent = (newStatus == 0) ? "Not Hired" : "Hired";
        }
    </script>
</body>
</html>
