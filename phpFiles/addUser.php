<?php

	require 'dbConnect.php';

	$success = false;
	$provinceList = array("BC", "ON", "NL", "NS", "PE", "NB", "QC",
	    "MB", "SK", "AB", "NT", "NU", "YT");

	$email = $_POST["email"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$confPassword = $_POST["confPassword"];
	$city = $_POST["city"];
	$province = $_POST["province"];
	$firstName = $_POST["firstName"];
	$surname = $_POST["surname"];
	$postal = $_POST["postal"];
	
	//The following is code to check email validity
	$statement = $conn->prepare("SELECT email FROM userInfo WHERE email = :email");
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->execute();

    if ($statement->rowCount() > 0) {
    	die (($email) . ' is already registered...');
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	    die ('Email ' . ($email) . ' is invalid.');
	} 

	//The following is code to check username validity
	$statement = $conn->prepare("SELECT username FROM userInfo WHERE username = :name");
    $statement->bindParam(':name', $username, PDO::PARAM_STR);
    $statement->execute();

    if($statement->rowCount() > 0){
        die ('Cannot add ' . ($username) . '. Username already exists.');
    } else if (!preg_match("/^[a-zA-Z0-9]*$/",$username)){
    	die ('Usernames should be alphanumeric');
    } else if (strlen($username) < 4) {
    	die ('Username must be at least 4 characters long');
    }

    //The following code checks first and last name validity
	if (!preg_match("/^[a-zA-Z ]*$/",$firstName)) {
		die ('Names should only contain Letters and spaces.');
	} else if (!preg_match("/^[a-zA-Z ]*$/",$surname)) {
		die ('Names should only contain Letters and spaces.');
	} else if ((strlen($firstName) < 2) || (strlen($surname) < 2)) {
		die ('Length of first and last name should be greater than 1');
	}

	//The following code checks password validity
	if (strlen($password) < 6) {
		die ('Passwords must be at least 6 Characters');
	} else if (strcmp($password, $confPassword) != 0) {
		die ('Passwords must match');
	}

	//The following code checks postal code validity
	//used the regex found at http://roshanbh.com.np/2008/03/canda-postal-code-validation-php.html
	if(!preg_match("/^([a-ceghj-npr-tv-z]){1}[0-9]{1}[a-ceghj-npr-tv-z]{1}[0-9]{1}[a-ceghj-npr-tv-z]{1}[0-9]{1}$/i",$postal)) {
		die ('Please enter a valid Canadian Postal Code (no spaces)');
	}

	//The following code checks for a valid City name
	//This will eventually be expanded to use google's api to check for a valid city
	//For now it just checks that the user entered something.
	if (!preg_match("/^[a-zA-Z ]*$/",$city)) {
		die ('City name should only contain letters and spaces');
	} else if (strlen($city) < 4) {
		die ('City names must be at least 4 characters');
	}

	//The following code checks to make sure a province was selected
	if(!in_array($province, $provinceList)){
		die ('Must Select a Province');
	}

	//The following code creates a unique hash out of the password value
	$passHash = sha1($password);
	
	//The following code pushes all of the values to a new row in the db
	//Assuming all tests above passed succesfully
	$statement = $conn->prepare("INSERT INTO userInfo (email, username, password, passHash, city, province, firstName, lastName, postal) 
		values (:email, :username, :password, :passHash, :city, :province, :firstName, :surname, :postal)");

	$statement ->bindParam(':email', $email, PDO::PARAM_STR);
	$statement ->bindParam(':username',$username, PDO::PARAM_STR);
    $statement ->bindParam(':password', $password, PDO::PARAM_STR);
    $statement ->bindParam(':passHash', $passHash, PDO::PARAM_STR);
    $statement ->bindParam(':city', $city, PDO::PARAM_STR);
    $statement ->bindParam(':province', $province, PDO::PARAM_STR);
    $statement ->bindParam(':firstName', $firstName, PDO::PARAM_STR);
    $statement ->bindParam(':surname', $surname, PDO::PARAM_STR);
    $statement ->bindParam(':postal', $postal, PDO::PARAM_STR);


	$statement->execute();
	$numRowsAffected = $statement->rowCount();

	if ($numRowsAffected == 1){
		//echo 'User ' . $username . ' was added successfully.';

		require 'sendConfirmation.php';

		$success = true;

	} else {
		echo 'Adding ' . $username . ' failed.';
	}
	


	//close the db link
	require 'dbDisconnect.php'; 

	// if ($success){
	// 	echo 'Success' ;
	// }

?>