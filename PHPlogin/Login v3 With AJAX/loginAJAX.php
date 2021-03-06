<?php
// ---------------------------------------- User login page ----------------------------------------
	require_once 'startsession.php';
	$page_title = 'Log In';
	require_once 'header.php';
	require_once 'navmenu.php';
?>
  
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="invisiblelogin.js"></script>  
<script type="text/javascript">
	$(document).ready(function() 
	{
		$('.error').hide(); 
		$('#Info').hide();	
		$('#loggedin').hide();
	});

	// Validation function
	function check_login() 
	{
		var username = $("#username").val();
		var password = $("#password").val();
		if (username.length > 0 && password.length > 0) 
		{
			$.post("logincheck.php", {
			username: $('#username').val(),
			password: $('#password').val(),
			}, function(response) 
			{
				$('#Info').html(unescape(response));
				var valid = $("#Info").html();
				if (valid == 0) 
				{
					$("label#username_error").show();
				}
				else 
				{
					location.reload();
				}
			});
			return false;
		}
	}
</script>
 
<?php
	// Show login form if user not logged in
	if (empty($_SESSION['user_id'])) 
	{
?>

<html> 
		<div id="contact_form">
			<form action="" name="contact">
				<fieldset><legend>Log In Info</legend>
  
					<label class="error" for="username" id="username_error">Invalid username/password combination.</label>
					<font color="red"><div id="Info"></div></font>
	  
					<table>
						<tr><td><label for="username" id="username_label">Username:</label>
						<input type="text" id="username" name="username" value="" class="text-input" /></td>
						<td><label class="error" for="username" id="username_error2">Enter your username.</label></td></tr>

						<tr><td><label for="password" id="password_label">Password:</label>
						<input type="password" id="password" name="password" value="" class="text-input" /></td>
						<td><label class="error" for="password" id="password_error">Enter your password.</label></td></tr>
					</table>
	  
					<input type="submit" name="submit" class="button" id="submit_btn" value="Sign Up" onclick="return check_login();" />
				</fieldset>
			</form> 
		</div>
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