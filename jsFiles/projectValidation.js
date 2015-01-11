$(document).ready(function(){
	/* Responsive design - on loading the website */
	if(window.innerWidth >= 1024) 
	// Full website
    {
		$("#projectInfo").css("width","700px");
	} 
	else if(window.innerWidth < 1024 && window.innerWidth >= 768) 
	// Tablet
	{
		$("#projectInfo").css("width","700px");
	} 
	else if(window.innerWidth < 768) 
	// Mobile
	{
		$("#projectInfo").css("width","300px");

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

var addToDB = function (){
	if(validateProject()){
		$.post('/../linker/phpFiles/addProject.php', $("#projectInfo").serialize(), function(data){
			if(data.trim() == "notLogin") {
				$("#message").text("Must login prior to creating");
				callLoginBoxes();
			} else {
				$("#loginBoxes").empty();
				$("#message").text(data);
			}
		});
	}
}

var validateProject = function () {
	var titleValue = titleTest($("input[name=title]").val());
	var descriptionValue = descriptionTest($("textarea[name=description]").val());
	var postalValue = postalTest($("input[name=postal]").val());
	var dateValue = dateTest($("input[name=deadline]").val());
	//var userValue = userTest($("input[name=creator]").val());
	return (titleValue&&descriptionValue&&postalValue&&dateValue);
}

var titleTest = function (title){

	var reg = /^[\w\-\s]+$/;

	if(title.length < 5){
		$("#titleMessage").text("Project title must be at least of length 5");
		return false;
	} else if (reg.test(title) == false) {
		$("#titleMessage").text("Project title Should only contain alphanumerics and spaces");
		return false;
	} else {
		$("#titleMessage").text("");
		return true;
	}
}

var descriptionTest = function (desc) {
	if(desc.length < 25){
		$("#descriptionMessage").text("The description should be at least 25 characters long, and meaningful");
		return false
	} else {
		$("#descriptionMessage").text("");
		return true;
	}
}

var postalTest = function (postal) {
	var reg = /^[ABCEGHJKLMNPRSTVXY]\d[ABCEGHJKLMNPRSTVWXYZ]( )?\d[ABCEGHJKLMNPRSTVWXYZ]\d$/i;
    if (reg.test(postal) == false){
    	$("#locationMessage").text("Invalid Postal Code");
		return false;
    } else {
    	$("#locationMessage").text("");
	    return true;
	}
}

var dateTest = function (date){
	var dateReg = /^(0[1-9]|1[0-2])\/(0[1-9]|1\d|2\d|3[01])\/(19|20)\d{2}$/;
	if (dateReg.test(date) == false) {
		$("#dateMessage").text("Please use the selector to enter a valid date");
		return false;
	} else {
		$("#dateMessage").text("");
		return true;
	}
}


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
			addToDB();
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
    
    /* Responsive design - on loading the website */
	if(window.innerWidth >= 1024) 
	// Full website
    {
		$("#projectInfo").css("width","700px");
	} 
	else if(window.innerWidth < 1024 && window.innerWidth >= 768) 
	// Tablet
	{
		$("#projectInfo").css("width","700px");
	} 
	else if(window.innerWidth < 768) 
	// Mobile
	{
		$("#projectInfo").css("width","300px");

	}

};
