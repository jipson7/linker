<?php

require 'dbConnect.php';

if (!array_key_exists('skills', $_POST)) {
	die ('Must select at least 1 required skill');
} else {
	$skills = $_POST["skills"];
}


echo "<?xml version=\"1.0\">";

echo '<skills>';

$projects = array();


foreach($skills as $skill){
	$$skill = array();
	array_push($projects, $$skill);
}

for ($i = 0; $i < count($projects); $i++){

	$sqlQuery = "SELECT projectName FROM skills where ";

	//I need to fix the below line to prevent sqlInjection,
	//But Bind param doesnt seem to be working atm.
	// -------Try bindValue at Randy's suggestion
	$sqlQuery = $sqlQuery . $skills[$i] . " = 1";

	$statement = $conn->prepare($sqlQuery);
	
	$statement->execute();


	$result = $statement->fetchAll();

	foreach($result as $row){
		array_push($projects[$i], $row['projectName']);
	}

}



for ($i = 0; $i < count($skills); $i++){
	if(count($projects[$i]) > 0) {
		echo "<skill name ='" . $skills[$i] . "'>";
		$currentSkill = $projects[$i];
		for($j = 0; $j < count($currentSkill); $j++){
			echo "<project title ='" . $currentSkill[$j] . "' />";
		}
		echo "</skill>";
	}
	
}

echo "</skills>";


require 'dbDisconnect.php';


?>