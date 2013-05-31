<?php
// ---------------------------------------- New user registarion page ----------------------------------------
	require_once 'startsession.php';
	$page_title = 'Sign Up';
	require_once 'header.php';
	require_once 'connectvars.php';
	require_once 'navmenu.php'; 
?>
  
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="invisiblesignup.js"></script>
<script type="text/javascript">
	$(document).ready(function() 
	{
		$('.error').hide(); 
		$('#Loading').hide();
		$('#Info').hide();	
		$('#Info2').hide();
		$('#submit_btn').attr('disabled', 'disabled');
		$('#submit_btn').hide();	
	});

	// Function verifies whether or not username is already taken
	function check_username()
	{
		$('#submit_btn').attr('disabled', 'disabled');
		$('#submit_btn').hide();
		var username = $("#username").val();
		if (username.length > 0)
		{
			$('#Loading').show();
			$.post("availablecheck.php", {
			username: $('#username').val(),
			}, function(response)
			{
				$('#Loading').hide();
				setTimeout("finishAjax('Info', '"+escape(response)+"')", 450);
			});		
		return false;
		}
	}
	
	// Function turns on submit button and makes it visible
	function finishAjax(id, response)
	{
		$('#'+id).html(unescape(response));
		var valid = $("#Info").html();
		if (valid == 0) 
		{
			$("label#username_error2").fadeIn(1000);
		}
		else 
		{
			$('#submit_btn').removeAttr('disabled');
			$('#submit_btn').fadeIn(1000);
			$("label#username_error2").hide();
		}
	}   
</script>

<?php
	// Show login form if user not logged in
	if (empty($_SESSION['user_id'])) 
	{
?>

<html>
		<p>Please enter your desired username and password to sign up for Austin's Database.</p>
		<div id="contact_form">
			<form action="" name="contact">
				<fieldset><legend>Registration Info</legend>
		  
					<font color="red"><div id="Info"></div></font>
			  
					<table>
						<tr><td><label for="username" id="username_label">Username:</label>
						<input type="text" id="username" name="username" value="" class="text-input" onchange="return check_username();" /></td>
						<td><label class="error" for="username" id="username_error2">An account already exists for this username. Please choose a different username.</label></td>
						<td><span id="Loading"><img src="images/loader.gif" alt="IMG LOAD FAIL" /></span></td></tr>

						<tr><td><label for="password1" id="password1_label">Password:</label>
						<input type="password" id="password1" name="password1" value="" class="text-input" /></td>
						<td><label class="error" for="password1" id="password1_error">Please enter desired password.</label></td></tr>
			  
						<tr><td><label for="password2" id="password2_label">Password (retype):</label>
						<input type="password" id="password2" name="password2" value="" class="text-input" /></td>
						<td><label class="error" for="password2" id="password2_error">Please confirm desired password.</label>
						<label class="error" for="password" id="password_error">The 2 entered passwords are not the same.</label></td></tr>
					</table>
			  
					<input type="submit" name="submit" class="button" id="submit_btn" value="Sign Up" />
					
				</fieldset>
			</form>
		</div>
		
		<center><div id="Members">
</html>

<?php
		require_once 'membertable.php';
?>

<html>
		</div></center>
		<center><div id="Info2"></div></center>
</html>

<?php
	}
	else 
	{
		// Shown if user is logged in
		echo('<p class="login">You are logged in as <b><font color ="red">' . $_SESSION['username'] . '</b></font>.</p>');
	}
	require_once 'footer.php';
?>