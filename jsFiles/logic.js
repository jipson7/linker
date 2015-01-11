$(document).ready(function(){
	/* Responsive design - on loading the website */
	if(window.innerWidth >= 1024) 
	// Full website
    {
		var boxWidth = $("#leftBox").outerWidth();
		var fullMargin = ((window.innerWidth - 2*boxWidth)/4);
		document.getElementById("leftBox").setAttribute("style", 
			"margin-left:" + fullMargin.toString() + "px");
		document.getElementById("rightBox").setAttribute("style", 
			"margin-right:" + fullMargin.toString() + "px");
	} 
	else if(window.innerWidth < 1024 && window.innerWidth >= 768) 
	// Tablet
	{
		var tabMargin = 7;
		document.getElementById('leftBox').setAttribute("style", 
			"margin-left:" + tabMargin.toString() + "px");
		document.getElementById('rightBox').setAttribute("style", 
			"margin-right:" + tabMargin.toString() + "px");
	} 
	else if(window.innerWidth < 768) 
	// Mobile
	{
		var mobMargin = 7;
		document.getElementById('leftBox').setAttribute("style", 
			"margin-left:" + mobMargin.toString() + "px");
		document.getElementById('rightBox').setAttribute("style", 
			"margin-right:" + mobMargin.toString() + "px");
	}

	/* Link find button to find.php */
	$( "#leftBox" ).click(function() {
		location.href='findProject.php';
	});

	/* Link create button to createProject.php */
	$( "#rightBox" ).click(function() {
		location.href='createProject.php';
	});

	checkLogin();

});



/* Typing effect animation function */
function TypeEffect() {		
	var $el = $('.writer'),
    txt = $el.text(),
    txtLen = txt.length,
    timeOut,
    char = 0;

	$el.text('|');

	(function typeIt() {   
	    var humanize = Math.round(Math.random() * (100 - 30)) + 30;
	    timeOut = setTimeout(function() {
	        char++;
	        var type = txt.substring(0, char);
	        $el.text(type + '|');
	        typeIt();

	        if (char == txtLen) {
	            $el.text($el.text().slice(0, -1)); // remove the '|'
	            clearTimeout(timeOut);
	        }

	    }, humanize);
	}());
};

function TypeReset() {
	$('.writer').text('');
};


/* Responsive design - on resizing the window */
window.onresize = function() {
    if(window.innerWidth >= 1024) 
	// Full website
    {
		var boxWidth = $("#leftBox").outerWidth();
		var fullMargin = ((window.innerWidth - 2*boxWidth)/4);
		document.getElementById("leftBox").setAttribute("style", 
			"margin-left:" + fullMargin.toString() + "px");
		document.getElementById("rightBox").setAttribute("style", 
			"margin-right:" + fullMargin.toString() + "px");
	} 
	else if(window.innerWidth < 1024 && window.innerWidth >= 768) 
	// Tablet
	{
		var tabMargin = 7;
		document.getElementById('leftBox').setAttribute("style", 
			"margin-left:" + tabMargin.toString() + "px");
		document.getElementById('rightBox').setAttribute("style", 
			"margin-right:" + tabMargin.toString() + "px");
	} 
	else if(window.innerWidth < 768) 
	// Mobile
	{
		var mobMargin = 7;
		document.getElementById('leftBox').setAttribute("style", 
			"margin-left:" + mobMargin.toString() + "px");
		document.getElementById('rightBox').setAttribute("style", 
			"margin-right:" + mobMargin.toString() + "px");
	}

};

var loginBoxes = function(){
	$( "#loginButton1" ).hide( "slide");
	$( "#loginButton2" ).hide( "slide", function(){
			$( "#loginBoxes").show("slide");
	});
};

var undoLoginBoxes = function() {
	$( "#loginBoxes").hide("slide", function() {
		$( "#loginButton2" ).show("slide");
		$( "#loginButton1" ).show("slide");
	});
};

var loginSubmit = function () {
	var username = $("input[name=username]").val();
	var password = $("input[name=password]").val();

	var usernameValue = usernameTest(username);
	var passwordValue = passwordTest(password);

	var dataSend = { uname: username, pass: password };

	if (usernameValue&&passwordValue) {
		$.post('/../linker/phpFiles/login.php', dataSend, function(data){
			var arrayData = $.parseJSON(data);
			if (arrayData['loginValue'] != 1) {
				$("#loginMessage").text("Username and or Passwords do not match");
			} else {
				$("#loginMessage").text("");
				loginSuccessful(arrayData['user']);
			}
		});
	}
};

var checkLogin = function () {
	$.getJSON('/../linker/phpFiles/checkLogin.php', function(data){
		if (data['loginValue'] == 1) {
			loginSuccessful(data['user']);
		}
	});

};

var loginSuccessful = function (username) {
	$("#loginArea").css("display", "none");
	$("#loginSuccess").css("display", "block");


	$("#loginSuccess").append("<button id = 'userButton' onclick='userProfile()'>" + username + "</button>");
	var logoutButton = $("<button></button>");
	logoutButton.attr("onclick", "logout()");
	logoutButton.text("logout");
	$("#loginSuccess").append($("<br>"));
	$("#loginSuccess").append(logoutButton);
}

var logout = function () {
	$.post('/../linker/phpFiles/logout.php', function() {

		location.reload();
	});
};


var usernameTest = function (username){
	return true;
};

var passwordTest = function (password){
	return true;
};

var userProfile = function () {
	window.location.href = "http://localhost/linker/userInformation.php"
};





