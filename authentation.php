<?php

// Check if the form has been submitted
if (isset($_POST['Emailid']) && isset($_POST['password']) && isset($_POST['tel'])&& isset($_POST['name'])&& isset($_POST['type'])&&isset($_POST['address'])&&isset($_POST['aadhar']) && isset($_POST['usertype'])) {

    // Sanitize the form data
    $Emailid = filter_input(INPUT_POST, 'Emailid', FILTER_SANITIZE_EMAIL);
    $userpassword = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $number = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_NUMBER_INT);
    $Name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_EMAIL);
    $genderuser = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);
    $Address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_EMAIL);
    $Aadhar = filter_input(INPUT_POST, 'aadhar', FILTER_SANITIZE_EMAIL);
    $role = filter_input(INPUT_POST, 'usertype', FILTER_SANITIZE_STRING);
    // Check if the usertype is valid
    if ($role != 'Client' && $role != 'Worker') {
        echo 'Invalid usertype.';
        exit;
    }
    // Connect to the database
    $db = mysqli_connect('localhost',"root",'',"sedatabase4");
    // Insert the user data into the database
    $sql = "INSERT INTO users1 (Emailid, userpassword, number,Name, genderuser,Address,Aadhar, role) VALUES ('$Emailid', '$userpassword', '$number', '$Name','$genderuser','$Address','$Aadhar', '$role')";
    $db->query($sql);
    if($role=='client'){
    header('Location: loginsignuppage.php');
    }else{
    header('Location: loginsignuppage.php');
    }
} else {
    // The form has not been submitted
    echo 'Please fill out the form and click the "Register" button.';
}

?>
