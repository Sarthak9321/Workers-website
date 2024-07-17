<?php 
session_start();
include('php/config.php');
if(empty($_SESSION['Emailid'])&&(empty($_SESSION['role']))&&(empty($_SESSION['area']))):
    header('Location:index.php');
endif;
?>
<?php
// Check if the form has been submitted
if (isset($_POST['lat']) && isset($_POST['lon'])) {
    $lati = filter_input(INPUT_POST, 'lat', FILTER_SANITIZE_EMAIL);
    $longi = filter_input(INPUT_POST, 'lon', FILTER_SANITIZE_EMAIL);

    // Connect to the database
    $db = mysqli_connect('localhost',"root",'',"sedatabase4");
    // Update the user data in the database
    $sql = "UPDATE users1
            SET latitude = '$lati', longitude = '$longi'
            WHERE Emailid = '{$_SESSION['Emailid']}';";
    $db->query($sql);

    // Redirect the user to the home page
    if($_SESSION['role']=='client'){
        header('Location: workerspage.php');
    }else{
        header('Location: workerspage.php');
    }
} else {
    // The form has not been submitted
    echo 'Please fill out the form and click the "Register" button.';
}
?>
