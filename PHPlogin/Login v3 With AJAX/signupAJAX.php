<?php
  require_once('startsession.php');
  $page_title = 'Sign Up';
  require_once('header.php');
  require_once('connectvars.php');
  require_once('navmenu.php');
  
  
    // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die (mysqli_error()); 

  // Retrieve the user data from MySQL
  $query = "SELECT user_id, username, join_date FROM login_info WHERE username IS NOT NULL ORDER BY join_date DESC LIMIT 100";
  $data = mysqli_query($dbc, $query);

  
  
  ?>
  
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="invisiblesignup.js"></script>
  
  <script type="text/javascript">

  $(document).ready(function() {
    $('.error').hide(); 
	$('#Loading').hide();
	$('#Members').hide();
	$('#Info').hide();	
    $('#submit_btn').attr('disabled', 'disabled');
	$('#submit_btn').hide();	
  });

  function check_username(){
	$('#submit_btn').attr('disabled', 'disabled');
	$('#submit_btn').hide();
	var username = $("#username").val();
	if(username.length > 0){
		$('#Loading').show();
		$.post("availablecheck.php", {
			username: $('#username').val(),
		}, function(response){
			 $('#Loading').hide();
			setTimeout("finishAjax('Info', '"+escape(response)+"')", 450);
		});
		return false;
	}
  }

  function finishAjax(id, response){
 
  $('#'+id).html(unescape(response));
  var valid = $("#Info").html();
  if( valid > 0) {
        $('#submit_btn').removeAttr('disabled');
		$('#submit_btn').fadeIn(1000);
		$("label#username_error2").hide();
  }
  else {
    $("label#username_error2").fadeIn(1000);
  }
  } 

</script>
  
  <p>Please enter your desired username and password to sign up for Austin's Database.</p>
  <div id="contact_form">
  <form action="" name="contact">
  <fieldset><legend>Registration Info</legend>
  
  	  <font color="red"><div id="Info"></div></font>
	  
	  <table>
	  <tr><td><label for="username" id="username_label">Username:</label>
      <input type="text" id="username" name="username" value="" class="text-input" onchange="return check_username();" /></td>
	  <td><label class="error" for="username" id="username_error2">An account already exists for this username. Please choose a different username.</label></td>
	  <td><span id="Loading"><img src="loader.gif" alt="" /></span></td></tr>

	  <tr><td><label for="password1" id="password1_label">Password:</label>
      <input type="password" id="password1" name="password1" value="" class="text-input" /></td>
	  <td><label class="error" for="password1" id="password1_error">Please enter desired password.</label></td></tr>
	  

	  <tr><td><label for="password2" id="password2_label">Password (retype):</label>
      <input type="password" id="password2" name="password2" value="" class="text-input" /></td>
	  <td><label class="error" for="password2" id="password2_error">Please confirm desired password.</label>
	  <label class="error" for="password" id="password_error">The 2 entered passwords are not the same.</label></td></tr></table>
	  
	  <!--
	  <label class="error" for="captcha" id="captcha_error">This field is required.</label>
	  ##<label for="captcha" id="captcha_label">CAPTCHA:</label>
	  <img src="captcha.php" alt="ERROR loading CAPTCHA" /><br />
	  
	  <label class="error" for="verify" id="verify_error">This field is required.</label>
	  <label for="verify" id="verify_label">Verification:</label>
      <input type="text" id="verify" name="verify" class="text-input" placeholder="Enter CAPTCHA here." />
	  -->
	  
      <input type="submit" name="submit" class="button" id="submit_btn" value="Sign Up" />
    </fieldset>
  </form>
  </div>
  
  <span id="Members">
  <?php
    // Loop through the array of user data, formatting it as HTML
  echo '<legend><strong>Member List</strong></legend><table border="1">';
  while ($row = mysqli_fetch_array($data)) {
    if (isset($_SESSION['user_id'])) {
      echo '<tr><td>' . $row['username'] . '</td><td>' . $row['join_date'] . '</td></tr>';
    }
    else {
      echo '<tr><td>' . $row['username'] . '</td></tr>';
    }
  }
  echo '</table>';

  mysqli_close($dbc);
  ?>
  </span>

<?php
  // Insert the page footer
  require_once('footer.php');
?>
