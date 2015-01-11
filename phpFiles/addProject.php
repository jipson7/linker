<?php

session_start();

require 'dbConnect.php';

$intTrue = 1;


$projectName = $_POST["title"];
$description = $_POST["description"];
$postalCode = $_POST["postal"];
$deadline = $_POST["deadline"];

if (isset($_SESSION['user'])) {
	if (strcmp($_SESSION['user'], "") == 0) {
		die ("notLogin");
	} else {
		$creator = $_SESSION['user'];
	}
} else {
	die ("notLogin");
}

//The following code checks to make sure the user exists
$statement = $conn->prepare("SELECT username FROM userInfo WHERE username = :username");
$statement->bindParam(':username', $creator, PDO::PARAM_STR);
$statement->execute();

if ($statement->rowCount() == 0) {
	die (($creator) . ' does not exist');
}


//The following code checks if any skills were selected
if (!array_key_exists('skills', $_POST)) {
	die ('Must select at least 1 required skill');
} else {
	$skills = $_POST["skills"];
}

//The following code checks to make sure that the project name doesn't already exist in the database
$statement = $conn->prepare("SELECT title FROM projects WHERE title = :projectName");
$statement->bindParam(':projectName', $projectName, PDO::PARAM_STR);
$statement->execute();


if ($statement->rowCount() > 0) {
	die (($projectName) . ' is already registered...');

//The following code check to make sure the project name is valid
} else if (strlen($projectName) < 5) {
	die ('Project Title must be of length 5 or greater');
} else if (!preg_match("/^[a-zA-Z0-9 ]*$/",$projectName)) {
	die ('Project can only be alphanumeric with spaces');
}

//The following code is used to make sure the description exists
if (strlen($description) < 25) {
	die ('Must write at least 25 characters for description');
}

//The following code is used to make sure the postal code is valid
if (!preg_match("/^([a-ceghj-npr-tv-z]){1}[0-9]{1}[a-ceghj-npr-tv-z]{1}[0-9]{1}[a-ceghj-npr-tv-z]{1}[0-9]{1}$/i",$postalCode)){
	die ('Enter a valid Canadian Postal Code, (no spaces).');
}

//The following code is used to make sure the date wasn't tampered with.
//I used the regular expression found here http://stackoverflow.com/questions/2520633/what-is-the-mm-dd-yyyy-regular-expression-and-how-do-i-use-it-in-php
if (!preg_match('/(0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.](19|20)\d\d/', $deadline)){
	die ('Please use the selector to enter a valid date');
}

//The following code creates the SQLQuery to add the skills row dynamically
$sqlQuery = "INSERT INTO skills (projectName";

foreach($skills as $value) {
	$sqlQuery = $sqlQuery . ", " . $value;
}

$sqlQuery = $sqlQuery . ") values (:projectName";

for ($i = 0; $i < count($skills); $i++) {
	$sqlQuery = $sqlQuery . ', :boolVal' . $i;
}

$sqlQuery = $sqlQuery . ")";

//The following code pushes the skills to the skills table, and the rest to the projects table
$statement = $conn->prepare($sqlQuery);
$statement ->bindParam(':projectName', $projectName, PDO::PARAM_STR);

for ($j = 0; $j < count($skills); $j++){
	$boolValString = ':boolVal' . $j;
	$statement ->bindParam($boolValString, $intTrue, PDO::PARAM_INT);

}

$statement->execute();

//Uncomment this code to check if skills are being added to their table
// $numRowsAffected = $statement->rowCount();
// if ($numRowsAffected == 1){
// 	echo 'Skills added succefully';
// } else {
// 	echo 'Something went wrong';
// }

$skillsID = $conn->lastInsertId();

require 'dbDisconnect.php';
require 'dbConnect.php';

$statement = $conn->prepare("INSERT INTO projects (title, description, skillsID, postal, deadline, creator) 
		values (:title, :description, :skillsID, :postal, :deadline, :creation)");

$statement ->bindParam(':title', $projectName, PDO::PARAM_STR);
$statement ->bindParam(':description', $description, PDO::PARAM_STR);
$statement ->bindParam(':skillsID', $skillsID, PDO::PARAM_INT);
$statement ->bindParam(':postal', $postalCode, PDO::PARAM_STR);
$statement ->bindParam(':deadline', $deadline, PDO::PARAM_STR);
$statement ->bindParam(':creation', $creator, PDO::PARAM_STR);

$statement->execute();

$numRowsAffected = $statement->rowCount();
if ($numRowsAffected == 1){
	echo 'Project added succefully';
} else {
	echo 'Something went wrong';
}

require 'dbDisconnect.php';

?>