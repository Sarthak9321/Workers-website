<?php
session_start();
include('php/config.php');

// Check if the form has been submitted
if (isset($_POST['Emailid']) && isset($_POST['password'])) {

    // Sanitize the form data
    $Emailid = filter_input(INPUT_POST, 'Emailid', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    
    
    // Check if the user exists in the database
    $db = mysqli_connect('localhost',"root",'',"sedatabase4");
    $sql = "SELECT * FROM users1 WHERE Emailid='$Emailid' AND userpassword='$password'";
    $result = mysqli_query($db, $sql);
   
    if (mysqli_num_rows($result) == 1) {
        // The user exists
        $row = mysqli_fetch_assoc($result);
        $id=$row['Emailid'];
        $num=$row['number'];
        $gen=$row['genderuser'];
        $role=$row['role'];
        $_SESSION['Emailid']=$id;
        $_SESSION['number']=$num;
        $_SESSION['genderuser']=$gen;
        $_SESSION['role']=$role;
        $userskill=$row['skill'];
        $_SESSION['skill']=$userskill;
        $effectivearea=$row['area'];
        $_SESSION['area']=$effectivearea;

        if($role =="Client"){
            header('Location: clientspage.php');
exit;
        }
        else if(empty($_SESSION['skill']) && empty($_SESSION['area'])&&($role=="Worker")){
        header('Location: workerspage2.php');
exit;
        }if(!empty($_SESSION['skill']) && !empty($_SESSION['area'])&&($role=="Worker"))
        {   header('Location: workerspage.php');
exit;
}
        }
       else {
        // The user does not exist
        echo 'Invalid email address or password.';
    }

} else {
    // The form has not been submitted
    echo 'Please fill out the form and click the "Login" button.';
}
?>
