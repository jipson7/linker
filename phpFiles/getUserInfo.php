<?php

session_start();

require 'dbConnect.php';

$username = $_POST['uname'];

$sqlQuery = "SELECT * FROM userInfo where username = :uname";

$statement = $conn->prepare($sqlQuery);
$statement->bindParam(':uname', $username, PDO::PARAM_STR);
$statement->execute();

$userRow = $statement->fetch();

echo json_encode($userRow);

require 'dbDisconnect.php';

?>