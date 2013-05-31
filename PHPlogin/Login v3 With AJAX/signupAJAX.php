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
	// Connect to the database and get memberlist
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die (mysqli_error()); 
	$query = "SELECT user_id, username, join_date FROM login_info WHERE username IS NOT NULL ORDER BY join_date DESC LIMIT 100";
	$data = mysqli_query($dbc, $query); 

	// Loop through the array of user data, formatting it as HTML
	echo '<legend><strong>Member List</strong></legend><table border="1">';
	while ($row = mysqli_fetch_array($data)) 
	{
		if (isset($_SESSION['user_id'])) // shows date if user logged in
		{
			echo '<tr><td>' . $row['username'] . '</td><td>' . $row['join_date'] . '</td></tr>';
		}
		else 
		{
			echo '<tr><td>' . $row['username'] . '</td></tr>';
		}
	}
	echo '</table>';
	mysqli_close($dbc);
?>

<html>
	</div></center>
	<center><div id="Info2"></div></center>
</html>

<?php
	require_once 'footer.php';
?>