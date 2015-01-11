<?php

require 'mail.php';

$mail->AddAddress($creatorRow['email']);

$mail->Subject  = $projectRow['title'] . " has a new applicant";

$message = "Hey " . $creatorRow['firstName'];

$message = $message . "\n\n";

$message = $message . "Good news! " . $applicantRow['username'] . " would like to work with you on your project '" . $projectRow['title'] ."'.";

$message = $message . "\n\n";

$message = $message . "It's time to get into touch with them, you can send email to the address below to begin communicating.";

$message = $message . "\n\n";

$message = $message . $applicantRow['email'];

$message = $message . "\n\n";

$message = $message . "Sincerely,";

$message = $message . "\n\n";

$message = $message . "-linker";

$mail->Body = $message;

if(!$mail->Send()) {
  $emailSent = false;
  echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
  $emailSent = true;
}


?>