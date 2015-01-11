<?php

session_start();

?><!DOCTYPE html>

<html>
	<head>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
		<script src="jsFiles/projectLogic.js"></script>
		<script src="jsFiles/projectValidation.js"></script>
		<link rel="stylesheet" type="text/css" href="cssFiles/createProject.css"></link>
		<title>Create</title>
	</head>
	<body>
		<div id = "header"><a href = "index.php" class="title">Linker</a></div>
		<form id = "projectInfo">

			<li>
				<label>Title</label>
				<div class="fields">
					<input type = "text" name = "title">
				</div>
				<div id = "titleMessage"></div>
			</li>

			<li>
				<label>Description</label>
				<div class="fields">
					<textarea rows="10" cols="50" name = "description" placeholder="I am passionate about…"></textarea>
				</div>
				<div id = "descriptionMessage"></div>
			</li>

			<li>
				<label>Skills Required</label>
				<select multiple name = "skills[]" id="skillList">
					<option value="actionscript">ActionScript</option>
					<option value="assembly">Assembly</option>
					<option value="bash">Bash</option>
					<option value="batch">Batch</option>
					<option value="c">C</option>
					<option value="cpp">C++</option>
					<option value="csharp">C#</option>
					<option value="cobol">COBOL</option>
					<option value="coffeescript">Coffee Script</option>
					<option value="css">CSS</option>
					<option value="fortran">Fortran</option>
					<option value="go">Go</option>
					<option value="haskell">Haskell</option>
					<option value="html">HTML</option>
					<option value="java">Java</option>
					<option value="javascript">Javascript</option>
					<option value="jquery">jQuery</option>
					<option value="lisp">Lisp</option>
					<option value="lua">Lua</option>
					<option value="matlab">MatLab</option>
					<option value="objectivec">Objective-C</option>
					<option value="pascal">Pascal</option>
					<option value="perl">Perl</option>
					<option value="php">PHP</option>
					<option value="python">Python</option>
					<option value="racket">Racket</option>
					<option value="ruby">Ruby</option>
					<option value="swift">Swift</option>
					<option value="visualbasic">Visual Basic</option>
					<option value="yql">YQL</option>
				</select>  
				<div id = "skillsMessage"></div>
			</li>

			<li>
				<label>Postal Code</label>
				<div class="fields">
					<input type = "text" name = "postal">
				</div>
				<div id = "locationMessage"></div>
			</li>

			<li>
				<label>Project Deadline</label>
				<div class="fields">
					<input type="text" name="deadline" id="datepicker">
				</div>
				<div id="dateMessage"></div>
			</li>

			<!-- Creator(Username): <input type="text" name="creator" id="creator"><div id="creatorMessage"></div> -->
		</form>

		<input type = "button" value = "Create" onclick="addToDB()">


		<div id = "message"></div>

		<div id = "loginBoxes"></div>

		<div id = "loginMessage"></div>


	</body>
</html>
