$(document).ready(function(){
	/* Responsive design - on loading the website */
	if(window.innerWidth >= 1024) 
	// Full website
    {
		$("#userInfo").css("width","700px");
		$("#formContainer").css("width","550px");
	} 
	else if(window.innerWidth < 1024 && window.innerWidth >= 768) 
	// Tablet
	{
		$("#userInfo").css("width","700px");
		$("#formContainer").css("width","550px");
	} 
	else if(window.innerWidth < 768) 
	// Mobile
	{
		$("#userInfo").css("width","300px");
		$("#formContainer").css("width","261px");

	}

});

/* Responsive design - on resizing the window */
window.onresize = function() {
    if(window.innerWidth >= 1024) 
	// Full website
    {
		$("#userInfo").css("width","700px");
		$("#formContainer").css("width","550px");
		$("input").css("margin-bottom","7px");
		$("select").css("margin-bottom","7px");
		$("#submitButton").css("margin-top","50px");
		$("#formHeader").css("margin-bottom","40px");
	} 
	else if(window.innerWidth < 1024 && window.innerWidth >= 768) 
	// Tablet
	{
		$("#userInfo").css("width","700px");
		$("#formContainer").css("width","550px");
		$("input").css("margin-bottom","7px");
		$("select").css("margin-bottom","7px");
		$("#submitButton").css("margin-top","50px");
		$("#formHeader").css("margin-bottom","40px");
	} 
	else if(window.innerWidth < 768) 
	// Mobile
	{
		$("#userInfo").css("width","300px");
		$("#formContainer").css("width","261px");
		$("input").css("margin-bottom","4px");
		$("select").css("margin-bottom","4px");
		$("#submitButton").css("margin-top","30px");
		$("#formHeader").css("margin-bottom","20px");
	}

};