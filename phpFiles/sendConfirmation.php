<?php

require 'mail.php';

$getURL = "http://localhost/linker/phpFiles/confirmEmail.php?username=" . urlencode($username) . "&passhash=" . urlencode($passHash); 

$mail->AddAddress($email);

$mail->Subject  = "Thanks for registering with linker";

$message = "Welcome, " . $username . "!";

$message = $message . "\n\n";

$message = $message . "Thank you for registering with linker, here are your login credentials.";

$message = $message . "\n\n";

$message = $message . "    Username: " . $username;

$message = $message . "\n";

$message = $message . "    Password: " . $password;

$message = $message . "\n\n";

$message = $message . "Please follow the following link to confirm your email: " . $getURL; 

$message = $message . "\n\n";

$message = $message . "You can reply to this email if you have any further questions.";

$message = $message . "\n\n";

$message = $message . "Sincerely,";

$message = $message . "\n\n";

$message = $message . "Caleb and Elias";

$mail->Body = $message;

if(!$mail->Send()) {
  echo 'Message was not sent.';
  echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
  die ('success');
}

?>