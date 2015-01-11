<?php

session_start();

require 'dbConnect.php';

$loginSuccess = true;

$username = $_POST['uname'];

$password = $_POST['pass'];

$statement = $conn->prepare("SELECT * FROM userInfo WHERE username = :name");
$statement->bindParam(':name', $username, PDO::PARAM_STR);
$statement->execute();



if($statement->rowCount() > 0){
	$result = $statement->fetch(PDO::FETCH_ASSOC);
	if($result['password'] != $password) {
		$loginSuccess = false;
	}
} else {
	$loginSuccess = false;
}

if ($loginSuccess) {
	$_SESSION['loginStatus'] = 1;
	$_SESSION['user'] = $username;
} else {
	$_SESSION['loginStatus'] = 0;
	$_SESSION['user'] = "";
}

$statusName = array('loginValue' => $_SESSION['loginStatus'], 'user' => $_SESSION['user']);

echo json_encode($statusName);



require 'dbDisconnect.php';

?>