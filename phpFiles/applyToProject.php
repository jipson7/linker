<?php

session_start();

//This code makes sure the user is logged in

if (isset($_SESSION['user'])) {
	if (strcmp($_SESSION['user'], "") == 0) {
		die ("notLogin");
	} else {
		$applicant = $_SESSION['user'];
	}
} else {
	die ("notLogin");
}

//Stores the input from get

$projectName = key($_GET);

$projectName = str_replace('_', ' ', $projectName);

require 'dbConnect.php';

//The Following block of code populates several arrays that are
//going to be used to generate an application email.

$sqlQuery = "SELECT * FROM userInfo where username = :uname";

$statement = $conn->prepare($sqlQuery);
$statement->bindParam(':uname', $applicant, PDO::PARAM_STR);
$statement->execute();

$applicantRow = $statement->fetch();

$sqlQuery = "SELECT * FROM projects where title = :title";

$statement = $conn->prepare($sqlQuery);
$statement->bindParam(':title', $projectName, PDO::PARAM_STR);
$statement->execute();

$projectRow = $statement->fetch();

$creator = $projectRow['creator'];

$sqlQuery = "SELECT * FROM userInfo where username = :cname";

$statement = $conn->prepare($sqlQuery);
$statement->bindParam(':cname', $creator, PDO::PARAM_STR);
$statement->execute();

$creatorRow = $statement->fetch();

//We can now use the variables:
//	$creatorRow
//	$applicantRow
//	$projectRow

require 'sendApplication.php';

if ($emailSent == true){
	echo 'success';
} else {
	echo 'fail';
}

require 'dbDisconnect.php';

?>