<?php

$username = 'root'; 
$password = 'password'; 
$host = "localhost"; 
$dbname = 'linker'; 



try {

	$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password); 

} catch(PDOException $e) {  

	echo $e->getMessage();
	//echo 'this is not working';

}

?>

