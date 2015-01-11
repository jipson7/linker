<!DOCTYPE html>
<html>
<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script src = "jsFiles/userInformation.js"></script>
	<title></title>	
	<style>
		#dataTable { display: none }
	</style>
	<link rel="stylesheet" type="text/css" href="cssFiles/userInformation.css"></link>
</head>
<body>


<div id = "header"><a href = "index.php" class="title">Linker</a></div>

<div id="loginBoxes"></div>

<div id = "userInfo">

<div id = "userHeader">Info</div>

<table id = "dataTable">
	<tr>
		<td>Name:</td>
		<td id = "fullName"></td>
		<td id = "fullNameChange"></td>
	</tr>
	<tr>
		<td>Date Joined:</td>
		<td id = "dateJoined"></td>
		<td id = "dateJoinedChange"></td>
	</tr>
	<tr>
		<td>Username:</td>
		<td id = "username"></td>
		<td id = "usernameChange"></td>
	</tr>
	<tr>
		<td>City:</td>
		<td id = "city"></td>
		<td id = "cityChange"></td>
	</tr>
	<tr>
		<td>Province:</td>
		<td id = "province"></td>
		<td id = "provinceChange"></td>
	</tr>
	<tr>
		<td>Postal Code:</td>
		<td id = "postal"></td>
		<td id = "postalChange"></td>
	</tr>
	<tr>
		<td>Primary Email:</td>
		<td id = "email"></td>
		<td id = "emailChange"></td>
	</tr>
</table>

</div>

<div id = "footer">
	<ul>
	  <li>About</li>
	  <li>Privacy</li>
	  <li>FAQ</li>
	  <li>Contact Us</li>
	</ul>
</div>


</body>
</html>