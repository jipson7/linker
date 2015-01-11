<?php

require("../lib/phpmailer/PHPMailerAutoload.php");
$mail = new PHPMailer();

$mail->IsSMTP();
$mail->Host = "ssl://smtp.googlemail.com";
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Username = "services.linker@gmail.com";
$mail->Password = "linkerTesting";
$mail->Port = "465";

$mail->SetFrom("services.linker@gmail.com","linker Team");
?>

