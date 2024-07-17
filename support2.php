<?php

// Sender's email address and password
$sender_email = "dailyjbsnow@gmail.com";
$sender_password = "atcaayzwpzlacozc";

// Receiver's email address
$receiver_email = "ladmayank15@gmail.com";

// Subject of the email
$subject = "Hi you Have been hired";

// Message body
$message = "This is daily jobs now contacting you, You have been hired to work as a construction worker for any querry contact this number mayank lad.";

// Send the email using the PHP mail() function
mail($receiver_email, $subject, $message, "From: $sender_email");

// Print a message to the console to indicate that the email has been sent
echo "Email sent successfully!";

?>
