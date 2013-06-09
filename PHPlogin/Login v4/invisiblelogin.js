$(document).ready(function() 
{
	$('.error').hide(); 	
	$('#loggedin').hide();
});

// ---------------------------------------- Verifies form fields have entries ----------------------------------------
$(function() 
{
	$('.error').hide();
	$(".button").click(function() 
	{
		$('.error').hide();
		var username = $("input#username").val();
		var password = $("input#password").val(); 		

		if (username == "" || password == "") 
		{ 
			if (username == "") 
			{
				$("label#username_error2").show();
				$("input#username").focus();
			}
			if (password == "") 
			{
				$("label#password_error").show();
				$("input#password").focus();
			}
			return false;
		}
			
		// Validation function
		if (username.length > 0 && password.length > 0) 
		{
			$.post("logincheck.php", {
			username: $('#username').val(),
			password: $('#password').val() },
			function(response) 
			{
				var valid = unescape(response);
				if (valid == 0) 
				{
					$("label#username_error").show();
				}
				else 
				{
					$('#contact_form').html('<p class="login">You are logged in as <b><font color ="red">' + username + '</b></font>.</p>');
					$('#nav_links').append('<div class="nav_button"><a href="logout.php">Log Out <b><font color ="red">(' + username + ')</font></b></a></div>');
				}
			});
			return false;
		}			
		return false;
	});
});