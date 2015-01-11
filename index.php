<?php

session_start();

?><!DOCTYPE html>
<html>

<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="cssFiles/stylesheet.css"></link>
<link rel="stylesheet" href="cssFiles/jquery.sidr.light.css"></link>
<link rel="stylesheet" type="text/css" href="cssFiles/jquery-ui.css">
<!-- Menu bar code extracted from https://github.com/artberri/sidr -->
<script src="jsFiles/logic.js"></script>
<script src="jsFiles/jquery.sidr.js"></script>

<title>linker</title>
</head>

<body>

<div id = "wrapper">

	<div id = "header">Welcome to Linker</div>

		<div id = "loginArea">
			<tr>
				<div id = "loginBoxes">

					<input type="text" name="username" placeholder="username"
					onfocus="this.placeholder = ''" onblur="this.placeholder = 'username'">
					<!-- <div id = "usernameMessage"></div> -->
					<br>

					<input type="password" name="password" placeholder="password"
					onfocus="this.placeholder = ''" onblur="this.placeholder = 'password'">
					<!-- <div id = "passwordMessage"></div> -->
					
					<button id="submitButton" onclick = "loginSubmit()">Login</button>
					<button id="backButton" onclick = "undoLoginBoxes()">Back</button>
					

					<div id = "loginMessage"></div>
				</div>
				<button id="loginButton1" onclick = "loginBoxes()">Login</button>
				<a href = "registration.php"><button id="loginButton2">Register</button></a>
			</tr>
		</div>
		<div id = "loginSuccess">

		</div>
	</div>
	<div id = "help">
		<tr>
			<!-- <div id ='leftHint'>
				<div id ='leftMessage'><div><span>Find the right project for you</span></div></div>
			</div> -->
			<img id='hintBulb' src="cssFiles/images/bulb_off.png">
			

			<!-- <div id ='rightHint'>
				<div id ='rightMessage'><div><span>Find the right people for your project</span></div></div>
			</div> -->
		</tr>
	</div>
	<div id = "body">
		<tr>
			<div id ='leftBox'>
				<div id ='leftContent'>
					<div>
						<span>Find Project</span>
					</div>
				</div>
			</div>

			<div id ='rightBox'>
				<div id ='rightContent'>
					<div>
						<span>Create Project</span>
					</div>
				</div>
			</div>
		</tr>
	</div>

	<div id = "footer">
		<ul>
		  <li>About</li>
		  <li>Privacy</li>
		  <li>FAQ</li>
		  <li>Contact Us</li>
		</ul>
	</div>

</div>

</body>


</html>
