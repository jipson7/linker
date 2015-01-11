<?php

session_start();

?><!DOCTYPE html>

<html>
<head>
<script type = "text/javascript" src="jsFiles/jquery-2.1.1.min.js"></script>
<script src = "jsFiles/registration.js"></script>
<script src = "jsFiles/registrationValidation.js"></script>
<link rel="stylesheet" type="text/css" href="cssFiles/registration.css"></link>
<title>registration</title>
</head>
<body>

<div id = "header"><a href = "index.php" class="title">Linker</a></div>

<form id = "userInfo">

	<div id="formHeader">Registration</div>

	<div id = "formContainer">

		<input type="text" name="firstName" placeholder="First Name"
		onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'">
		<!-- <div id = "firstMessage"></div> -->

		<input type="text" name="surname" placeholder="Surname" 
		onfocus="this.placeholder = ''" onblur="this.placeholder = 'Surname'">
		<!-- <div id = "surMessage"></div> -->

		<input type="text" name="email" placeholder="Email" 
		onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
		<!-- <div id = "emailMessage"></div> -->

	  	<input type="text" name="username" placeholder="Username" 
	  	onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
	    <!-- <div id = "usernameMessage"></div> -->

		<input type="password" name="password" placeholder="Password" 
		onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
		
		<input type="password" name="confPassword" placeholder="Confirm Password" 
		onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirm Password'">
		<div id = "passwordMessage"></div>

		<input type="text" name="city" placeholder="City" 
		onfocus="this.placeholder = ''" onblur="this.placeholder = 'City'">
		<!-- <div id = "cityMessage"></div> -->

		<select id = "provTer" name = "province">
			<option value="">Province/Territory</option>
			<option value="AB">Alberta</option>
			<option value="BC">British Columbia</option>
			<option value="MB">Manitoba</option>
			<option value="NB">New Brunswick</option>
			<option value="NL">Newfoundland and Labrador</option>
			<option value="NS">Nova Scotia</option>
			<option value="ON">Ontario</option>
			<option value="PE">Prince Edward Island</option>
			<option value="QC">Quebec</option>
			<option value="SK">Saskatchewan</option>
			<option value="NT">Northwest Territories</option>
			<option value="NU">Nunavut</option>
			<option value="YT">Yukon</option>
		</select>	<!-- <div id = "provinceMessage"></div>  -->

		<input type="text" name="postal" placeholder="Postal Code" 
		onfocus="this.placeholder = ''" onblur="this.placeholder = 'Postal Code'">
		<!-- <div id = "postalMessage"></div>	 -->


		<input type="button" onclick="validateForm()" value="Submit" id="submitButton">
	</div>
</form> 

<div id = "message"> </div>


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