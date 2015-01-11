<?php

require 'dbConnect.php';

reset($_GET);
$projectName = key($_GET);

$projectName = str_replace('_', ' ', $projectName);

$statement = $conn->prepare("SELECT * FROM projects WHERE title = :projectTitle");
$statement->bindParam(':projectTitle', $projectName, PDO::PARAM_STR);
$statement->execute();

if ($statement->rowCount() == 0) {
	die (($projectName) . ' does not exist, something on our end has gone terribly wrong.');
}

$result = $statement->fetchAll();

$projectDetails = json_encode($result[0]);

echo $projectDetails;


require 'dbDisconnect.php';

?>