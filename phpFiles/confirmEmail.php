<?php

require 'dbConnect.php';

$username = $_GET["username"];

$sentHash = $_GET["passhash"];


$sqlQuery = "SELECT * FROM userInfo where username = :uname";

$statement = $conn->prepare($sqlQuery);
$statement->bindParam(':uname', $username, PDO::PARAM_STR);
$statement->execute();

$userRow = $statement->fetch();

if($statement->rowCount() < 1){
    die ('failed');
}



$trueHash = sha1($userRow['password']);

if ($sentHash != $trueHash) {
	die('failed');
}


$sqlUpdate = "UPDATE userInfo SET emailConfirmed = :confirmed WHERE username = :name";

$confirmValue = 1;

$statement = $conn->prepare($sqlUpdate);
$statement->bindParam(':name', $username, PDO::PARAM_STR);
$statement->bindParam(':confirmed', $confirmValue, PDO::PARAM_INT);
$statement->execute();

if($statement->rowCount() == 0){
    die ('failed');
}



echo "<!DOCTYPE html>";

echo '<html><head><title>linkerConfirm</title></head>';

echo '<body>';


echo '<div> Success! <br> Your email has been confirmed successfully, Thank You! </div> <br>';
echo '<a href = "http://localhost/linker/index.php">Click here</a> to return to the main page';




echo '</body>';

echo '</html>';

require 'dbDisconnect.php';

?>