<?php
// ---------------------------------------- New user registration page ----------------------------------------
	require_once 'startsession.php';
	$page_title = 'Sign Up';
	require_once 'header.php';
	require_once 'connectvars.php';
	require_once 'navmenu.php'; 
?>
  
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="invisiblesignup.js"></script>

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
			  
					<table>
						<tr><td><label for="username" id="username_label">Username:</label>
						<input type="text" id="username" name="username" value="" class="text-input" /></td>
						<td><label class="error" for="username" id="username_error2">An account already exists for this username.</label></td>
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
		
		<center>
			<div id="Members">
				<?php
					require_once 'membertable.php';
				?>
			</div>
		</center>
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