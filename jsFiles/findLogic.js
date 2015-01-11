$(document).ready(function(){

	/* Responsive design - on loading the website */
	if(window.innerWidth >= 1100) 
	// Full website
    {
    	var detailsWidth = window.innerWidth - 800;
    	$("#projectDetails").css("width",detailsWidth);
    	var prefindWidth = 720 + $("#projectDetails").outerWidth();
		$("#prefind").css("width",prefindWidth);
		$("#projectBySkills").css("margin","0 20px 20px 20px");
	} 
	else if(window.innerWidth < 1100 && window.innerWidth >= 768) 
	// Tablet
	{
		$("#prefind").css("width","700px");
		$("#projectBySkills").css("margin","0 0 20px 20px");
		$("#projectDetails").css("width","660px");

	} 
	else if(window.innerWidth < 768) 
	// Mobile
	{
		$("#prefind").css("width","350px");	
		$("#projectBySkills").css("margin","0 0 20px 0");
		$("#projectDetails").css("width","300px");	
	}



	/* select multiple options */
	$('#skillList option').on('mousedown', function (e) {
	    this.selected = !this.selected;
	    e.preventDefault();
	});

	$('#select_all').click(function() {
		var allSelected = $("#skillList option:not(:selected)").length == 0;
		if(!allSelected) {
    		$('#skillList option').prop('selected', true);
		} else {
    		$('#skillList option').prop('selected', false);
		}
	});

});

var findProjects = function (){
	$("#projectBySkills").empty();
	$.post('/../linker/phpFiles/findProject.php', $("#userSelection").serialize(), function(xmlData){
		var s = "project";
		if (xmlData.indexOf(s) > -1) {
			showProjectList(xmlData);
		} else {
			$("#projectBySkills").text("No results");
		}
	});
};

var validateFind = function () {
	return true;
};

var showProjectList = function (skillsXml) {
	var skillCount = 0;
	var projectsArray = [];
	var newTable = $(document.createElement('table'));	
	newTable.attr('id', 'projectTable');
	$("#projectBySkills").append("<div id = 'instruction'>Select project</div>");
	$("#projectBySkills").append("<input type='button' class='topButtons' name='display_all' value='Display All'></input>");

	$("#projectBySkills").append(newTable);
	// $("#projectTable").css("border", "solid 1px black");


	$(skillsXml).find("skill").each(function (){
		//skillCount++;
		// var skillName = $(this).attr('name');

		// var capitalizedSkill = skillName.charAt(0).toUpperCase() + skillName.substring(1);

		// $(document.createElement('tr')).appendTo('#projectTable');

		// var skillElement = $(document.createElement('td'));

		// skillElement.text(skillName);
		// skillElement.css("font-weight", "bold");

		// $("#projectTable tr:last").append(skillElement);

		$(this).find("project").each(function (){

			var projectTitle = $(this).attr('title');
			// Check projects to avoid duplicates
			if($.inArray(projectTitle, projectsArray) <= -1) {
				projectsArray.push(projectTitle);

				var newProject = $(document.createElement('div'));

				newProject.text(projectTitle);

				newProject.attr("class", "projectList");

				newProject.attr("id", projectTitle);

				newProject.attr("onclick", "getProjectInfo(this.id)");

				$("#projectTable").append(newProject);
			}
		});


	});



	//$("#projectBySkills").text(skillCount);

};

var getProjectInfo = function (projectTitle) {
	$("#projectDetails").empty();
	//Need aother php file to do some shit here.
	$("#projectDetails").append("<div id = 'instruction'>Project details</div>");
	$("#projectDetails").append("<input type='button' class='topButtons' name='apply' value='Apply'></input>");

	$.getJSON('/../linker/phpFiles/getProjectInfo.php', projectTitle, function(projectData){
			var title = projectData.title;
			var creator = projectData.creator;
			var description = projectData.description;
			var postal = projectData.postal;
			var deadline = projectData.deadline;

			var newTable = $(document.createElement('table'));	
			newTable.attr('id', 'infoTable');
			$("#projectDetails").append(newTable);
			// $("#infoTable").css("border", "solid 1px black");
			
			$(document.createElement('tr')).appendTo('#infoTable');

			var titleElement = $(document.createElement('td'));
			titleElement.text(title);
			titleElement.css("font-weight", "bold");
			titleElement.attr("border", "solid 1px black");
			$("#infoTable tr:last").append(titleElement);

			$(document.createElement('tr')).appendTo('#infoTable');

			var creatorLabel = $(document.createElement('td'));
			creatorLabel.text("Created by: ");
			creatorLabel.css("font-weight", "bold");
			creatorLabel.attr("border", "solid 1px black");
			$("#infoTable tr:last").append(creatorLabel);

			var creatorElement = $(document.createElement('td'));
			creatorElement.text(creator);
			//creatorElement.css("font-weight", "bold");
			creatorElement.attr("border", "solid 1px black");
			$("#infoTable tr:last").append(creatorElement);

			$(document.createElement('tr')).appendTo('#infoTable');

			var descriptionLabel = $(document.createElement('td'));
			descriptionLabel.text("About: ");
			descriptionLabel.css("font-weight", "bold");
			descriptionLabel.attr("border", "solid 1px black");
			$("#infoTable tr:last").append(descriptionLabel);

			var descriptionElement = $(document.createElement('td'));
			descriptionElement.text(description);
			descriptionElement.attr("border", "solid 1px black");
			descriptionElement.css("max-width", "300px");
			$("#infoTable tr:last").append(descriptionElement);

			$(document.createElement('tr')).appendTo('#infoTable');

			var postalLabel = $(document.createElement('td'));
			postalLabel.text("Where: ");
			postalLabel.css("font-weight", "bold");
			postalLabel.attr("border", "solid 1px black");
			$("#infoTable tr:last").append(postalLabel);

			var postalElement = $(document.createElement('td'));
			postalElement.text(postal);
			postalElement.attr("border", "solid 1px black");
			$("#infoTable tr:last").append(postalElement);

			$(document.createElement('tr')).appendTo('#infoTable');

			var deadlineLabel = $(document.createElement('td'));
			deadlineLabel.text("When: ");
			deadlineLabel.css("font-weight", "bold");
			deadlineLabel.attr("border", "solid 1px black");
			$("#infoTable tr:last").append(deadlineLabel);

			var deadlineElement = $(document.createElement('td'));
			deadlineElement.text(deadline);
			deadlineElement.attr("border", "solid 1px black");
			$("#infoTable tr:last").append(deadlineElement);

			$(document.createElement('tr')).appendTo('#infoTable');

			var applyElement = $("[name='apply'");
			applyElement.attr("id", projectData.title);
			applyElement.attr("onclick", "applyToProject(this.id)");
		});

};

var applyToProject = function (title) {
	$.get('/../linker/phpFiles/applyToProject.php', title, function (success) {
		if(success.trim() == "notLogin") {
				$("#message").text("Must login prior to Applying");
				callLoginBoxes();
			} else {
				$("#loginBoxes").empty();
				$("#message").text(success);
				successRedirect();
			}



	});
};

var callLoginBoxes = function () {

	$("<input name='username' type='text' value='username'/>").appendTo("#loginBoxes");
	$("<input name='password' type='password' value='password'/>").appendTo("#loginBoxes");
	$("<button onclick = 'login()' id = 'loginButton'></button").appendTo("#loginBoxes");
	$("#loginButton").text("Login");
	$("<button onclick = 'register()' id = 'registerButton'></button").appendTo("#loginBoxes");
	$("#registerButton").text("Register");

};

var login = function () {
	var username = $("input[name=username]").val();
	var password = $("input[name=password]").val();

	var dataSend = { uname: username, pass: password };

	
	$.post('/../linker/phpFiles/login.php', dataSend, function(data){
		var arrayData = $.parseJSON(data);
		if (arrayData['loginValue'] != 1) {
			$("#loginMessage").text("Username and or Passwords do not match");
		} else {
			$("#loginMessage").text("");
			applyToProject();
		}
	});
	
};

var register = function () {
	window.location.href = "register.php";
};

var successRedirect = function () {
	window.location.href = "http://localhost/linker/applySuccess.html";
};

/* Responsive design - on resizing the window */
window.onresize = function() {
	// Full website
    /* Responsive design - on loading the website */
	if(window.innerWidth >= 1100) 
	// Full website
    {
    	var detailsWidth = window.innerWidth - 800;
    	$("#projectDetails").css("width",detailsWidth);
    	var prefindWidth = 720 + $("#projectDetails").outerWidth();
		$("#prefind").css("width",prefindWidth);
		$("#projectBySkills").css("margin","0 20px 20px 20px");
	} 
	else if(window.innerWidth < 1100 && window.innerWidth >= 768) 
	// Tablet
	{
		$("#prefind").css("width","700px");
		$("#projectBySkills").css("margin","0 0 20px 20px");
		$("#projectDetails").css("width","660px");

	} 
	else if(window.innerWidth < 768) 
	// Mobile
	{
		$("#prefind").css("width","350px");	
		$("#projectBySkills").css("margin","0 0 20px 0");
		$("#projectDetails").css("width","300px");	
	}
};