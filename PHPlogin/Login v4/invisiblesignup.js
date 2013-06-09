$(document).ready(function() 
{
	$('.error').hide(); 
	$('#Loading').hide();
	$('#submit_btn').attr('disabled', 'disabled');	
});

$(function() 
// ---------------------------------------- Validates form and then adds new user to database without page refresh ----------------------------------------
{
	$('.error').hide();
	
	// Function verifies whether or not username is already taken
	$('#username').change(function()
	{
		$('#submit_btn').attr('disabled', 'disabled');
		var username = $("#username").val();
		if (username.length > 0)
		{
			$('#Loading').show();
			$.post("availablecheck.php", {
			username: $('#username').val(),
			}, function(response)
			{
				$('#Loading').hide();
				var valid = unescape(response);
				if (valid == 0) 
				{
					$("label#username_error2").fadeIn(1000);
				}
				else 
				{
					$('#submit_btn').removeAttr('disabled');
					$("label#username_error2").hide();
				}
			});		
				return false;
		}
	});
	
	//field validation when submit button is pressed
    $(".button").click(function()
	{
		$('.error').hide();
  	    var username = $("input#username").val();
  		var password1 = $("input#password1").val(); 		
  		var password2 = $("input#password2").val();

		if (username == "" || password1 == "" || password2 == "" || password1 != password2) 
		{ 
			if (username == "") 
			{
				$("label#username_error").show();
				$("input#username").focus();
			}
			if (password1 == "") 
			{
				$("label#password1_error").show();
				$("input#password1").focus();
			}
			if (password2 == "") 
			{
				$("label#password2_error").show();
				$("input#password2").focus();
			}
			if (password1 != password2 && password1 != "" && password2 != "") 
			{
				$("label#password_error").show();
				$("input#password2").focus();
			}
			return false;
		}
		
		var dataString = 'username='+ username + '&password1=' + password1 + '&password2=' + password2;
		
		// passes to helper function to add to database
		$.ajax(
		{
			type: "POST",
			url: "process.php",
			data: dataString,
			success: function() 
			{
				$('#contact_form').html("<div id='message'></div>");
				$('#message').html("<h2>Successfully Registered!</h2>")
				.append("<p>You're now ready to <a href=\"loginAJAX.php\">Log In!</a> <p>")
				.hide()
				.fadeIn(1500, function() 
				{
					$('#message');
					$('#memtable').prepend('<tr><td><font color="red">' + username + '</font></td></tr>');
				});
			}
		});
		return false;
    }); 
});