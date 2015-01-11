
var validateForm = function() {
	if (!fieldCheck()){
		//$("#message").text("Something you've entered was invalid");
	} else {
		$.post('/../linker/phpFiles/addUser.php', $("#userInfo").serialize(), function(data){
			$("#message").text(data);
			if(data.trim() == 'success'){
				window.location.href = "http://localhost/linker/registerSuccess.html";
			}
		});
	}
}

var fieldCheck = function () {
	var firstValue = firstCheck($("input[name=firstName]").val());
	var surValue = lastCheck($("input[name=surname]").val());
	var emailValue = emailCheck($("input[name=email]").val());
	var usrValue = usernameCheck($("input[name=username]").val());
	var passwordValue = passwordCheck($("input[name=password]").val(), $("input[name=confPassword]").val());
	var cityValue = cityCheck($("input[name=city]").val());
	var postalValue = postalCheck($("input[name=postal]").val());
	var provValue = provCheck($('#provTer').val());

	if (emailValue&&usrValue&&passwordValue&&cityValue&&postalValue&&provValue&&firstValue&&surValue) {
		return true;
	} else {
		return false;
	}

}

var lastCheck = function (last){
	if (last.length < 2) {
		//$("#surMessage").text("Invalid surname");
		$('[name="surname"]').css('box-shadow','0px 0px 1px 1px rgba(255,0,0,0.75)');
		return false;
	} else {
		// $("#surMessage").text("");
		$('[name="surname"]').css('box-shadow','none');
		return true;
	}
}

var firstCheck = function (first) {
	if (first.length < 2) {
		// $("#firstMessage").text("Invalid First Name");
		$('[name="firstName"]').css('box-shadow','0px 0px 1px 1px rgba(255,0,0,0.75)');
		return false;
	} else {
		// $("#firstMessage").text("");
		$('[name="firstName"]').css('box-shadow','none');
		return true;
	}
}

var cityCheck = function (city) {
	if (city.length < 4) {
		// $("#cityMessage").text("Invalid City Name");
		$('[name="city"]').css('box-shadow','0px 0px 1px 1px rgba(255,0,0,0.75)');
		return false;
	} else {
		// $("#cityMessage").text("");
		$('[name="city"]').css('box-shadow','none');
		return true;
	}
}

var emailCheck = function (emailValue){
	var reg = /^([A-Za-z0-9_\-\.]){1,}\@([A-Za-z0-9_\-\.]){1,}\.([A-Za-z]{2,4})$/;

	if (reg.test(emailValue) == false) {
		// $("#emailMessage").text("Invalid Email Address");
		$('[name="email"]').css('box-shadow','0px 0px 1px 1px rgba(255,0,0,0.75)');
		return false;
	} else {
		// $("#emailMessage").text("");
		$('[name="email"]').css('box-shadow','none');
		return true;
	}

}

var usernameCheck = function (username) {
	if(username.length < 4) {
		// $("#usernameMessage").text("Username is too short");
		$('[name="username"]').css('box-shadow','0px 0px 1px 1px rgba(255,0,0,0.75)');
		return false;
	} else {
		// $("#usernameMessage").text("");
		$('[name="username"]').css('box-shadow','none');
		return true;
	}
}


var passwordCheck = function (pass, confPass){
	if (pass.length == 0 || confPass.length == 0){
		// $("#passwordMessage").text("Must Enter Both Password Fields");
		$('[name="password"]').css('box-shadow','0px 0px 1px 1px rgba(255,0,0,0.75)');
		$('[name="confPassword"]').css('box-shadow','0px 0px 1px 1px rgba(255,0,0,0.75)');
		return false;
	} else if (pass != confPass){
		$("#passwordMessage").text("Passwords do not match");
		$('[name="password"]').css('box-shadow','0px 0px 1px 1px rgba(255,0,0,0.75)');
		$('[name="confPassword"]').css('box-shadow','0px 0px 1px 1px rgba(255,0,0,0.75)');
		return false;
	} else {
		$("#passwordMessage").text("");
		$('[name="password"]').css('box-shadow','none');
		$('[name="confPassword"]').css('box-shadow','none');
		return true;
	}
}

var provCheck = function(value){
	if (value.length <= 1) {
		// $("#provinceMessage").text("Must Select a Province");
		$('[name="province"]').css('box-shadow','0px 0px 1px 1px rgba(255,0,0,0.75)');
		return false;
	} else {
		// $("#provinceMessage").text("");
		$('[name="province"]').css('box-shadow','none');
		return true;
	}
}

function postalCheck(postal) {
    var reg = /^[ABCEGHJKLMNPRSTVXY]\d[ABCEGHJKLMNPRSTVWXYZ]( )?\d[ABCEGHJKLMNPRSTVWXYZ]\d$/i;
    if (reg.test(postal) == false){
    	// $("#postalMessage").text("Invalid Postal Code");
		$('[name="postal"]').css('box-shadow','0px 0px 1px 1px rgba(255,0,0,0.75)');
		return false;
    } else {
    	// $("#postalMessage").text("");
		$('[name="postal"]').css('box-shadow','none');
	    return true;
	}
}



