<?php
session_start();
include('php/config.php');
if(empty($_SESSION['Emailid'])&&(empty($_SESSION['role']))):
    header('Location:index.php');
endif;
?>

<?php
// Check if the form has been submitted
if (isset($_POST['skill']) && isset($_POST['area'])) {

    // Sanitize the form data
    $skill = filter_input(INPUT_POST, 'skill', FILTER_SANITIZE_EMAIL);
    $area = filter_input(INPUT_POST, 'area', FILTER_SANITIZE_EMAIL);

    // Check if the usertype is valid
    if ($_SESSION['role'] != 'Client' && $_SESSION['role']!= 'Worker') {
        echo 'Invalid usertype.';
        exit;
    }

    // Connect to the database
    $db = mysqli_connect('localhost',"root",'',"sedatabase4");

    // Escape the user input to prevent SQL injection
    $skill = mysqli_real_escape_string($db, $skill);
    $area = mysqli_real_escape_string($db, $area);
    $_SESSION['Is_Hired']='0';
    // Update the user data in the database
    $sql = "UPDATE users1
            SET skill = '$skill', area = '$area'
            WHERE Emailid = '{$_SESSION['Emailid']}';";
    $db->query($sql);

    if($_SESSION['role']=='client'){
        
        header('Location: workerspage3.php');
    }else{
        header('Location: workerspage3.php');
    }
} else {
    // The form has not been submitted
    echo 'Please fill out the form and click the "Register" button.';
}

?>