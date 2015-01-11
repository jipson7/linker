//Handles the logic for the useriformation page

$(document).ready(function() {
	document.title = "Please Login First";

	checkLogin();

});

var checkLogin = function() {
	$.getJSON('/../linker/phpFiles/checkLogin.php', function(data){
		if (parseInt(data['loginValue']) == 1){
			loginTrue(data['user']);
		} else {
			loginFalse();
		}
	});
};

var loginTrue = function (username) {
	document.title = username + " profile";
	getUserInfo(username);
};

var loginFalse = function () {
	callLoginBoxes();
};

var callLoginBoxes = function () {

	$("<input name='username' type='text' value='username'/>").appendTo("#loginBoxes");
	$("<input name='password' type='password' value='password'/>").appendTo("#loginBoxes");
	$("<button onclick = 'login()' id = 'loginButton'></button").appendTo("#loginBoxes");
	$("#loginButton").text("Login");
	$("<div id='loginMessage'></div>").appendTo("#loginBoxes");
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
			$("#loginBoxes").empty();
			checkLogin();
		}
	});
	
};

var getUserInfo = function (username) {

	var userPassingValue = {uname: username};
	$.post('/../linker/phpFiles/getUserInfo.php', userPassingValue, function(userJSON) {
		displayUserData(userJSON);
	});

};

var displayUserData = function (userJSON) {

	var editButton1 = $("<button class = 'editButton'>edit</button>");
	var editButton2 = $("<button class = 'editButton'>edit</button>");
	var editButton3 = $("<button class = 'editButton'>edit</button>");
	var editButton4 = $("<button class = 'editButton'>edit</button>");
	var editButton5 = $("<button class = 'editButton'>edit</button>");
	var editButton6 = $("<button class = 'editButton'>edit</button>");
	var editButton7 = $("<button class = 'editButton'>edit</button>");

	$("#dataTable").css("display", "block");

	var userData = $.parseJSON(userJSON);

	$("#fullName").text(userData['firstName'] + " " + userData['lastName'] + "    ");
	$("#fullNameChange").append(editButton1);

	$("#dateJoined").text(userData['accountDate'] + "    ");
	$("#dateJoinedChange").append(editButton2);

	$("#username").text(userData['username'] + "    ");
	$("#usernameChange").append(editButton3);

	$("#city").text(userData['city'] + "    ");
	$("#cityChange").append(editButton4);

	$("#postal").text(userData['postal'] + "    ");
	$("#postalChange").append(editButton5);

	$("#province").text(userData['province'] + "    ");
	$("#provinceChange").append(editButton6);

	if (userData['emailConfirmed'] == 1){
		$("#email").text(userData['email'] + " (confirmed)" + "    ");
	} else {
		$("#email").text(userData['email'] + " (not confirmed)" + "    ");
	}
	$("#emailChange").append(editButton7);


};