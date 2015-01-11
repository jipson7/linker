<?php

session_start();

?><!DOCTYPE html>
<html>
	<head>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
		<script src="jsFiles/findLogic.js"></script>
		<link rel="stylesheet" type="text/css" href="cssFiles/findProject.css"></link>
		<title>Find</title>
	</head>
	<body>
		<div id = "header"><a href = "index.php" class="title">Linker</a></div>
		<div id = "prefind">
			<form id = "userSelection">
				<div id = "instruction">Select skills</div>
				<input type="button" id="select_all" class="topButtons" name="select_all" value="Select All"></input>
				<select multiple name = "skills[]" id="skillList">
						<option id="helllo" value="actionscript"><span>ActionScript</span></option>
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
				<input id = "goButton" type = "button" value = "Go" onclick = "findProjects()">
			</form>
				
			<div id = "projectBySkills"></div>

			<div id = "projectDetails"></div>

			<div id = "message"></div>

			<div id = "loginBoxes"></div>
		</div>
	</body>
</html>