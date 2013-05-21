<?php
  require_once('startsession.php');
  $page_title = 'Sign Up';
  require_once('header.php');
  require_once('connectvars.php');
  require_once('navmenu.php');

  // Connect to the database
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die (mysqli_error());

  if (isset($_POST['submit'])) {
    // Grab the profile data from the POST
    $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
    $password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
    $password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));
	$user_pass_phrase = sha1($_POST['verify']);

    if (!empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2) && ($_SESSION['pass_phrase'] == $user_pass_phrase)) {
      // Make sure someone isn't already registered using this username
      $query = "SELECT * FROM login_info WHERE username = '$username'";
      $data = mysqli_query($dbc, $query);
      if (mysqli_num_rows($data) == 0) {
        // The username is unique, so insert the data into the database
        $query = "INSERT INTO login_info (username, password, join_date) VALUES ('$username', SHA('$password1'), NOW())";
        mysqli_query($dbc, $query);

        // Confirm success with the user
        echo '<p>Your new account has been successfully created. You\'re now ready to <a href="login.php">log in</a>.</p>';

        mysqli_close($dbc);
        exit();
      }
      else {
        // An account already exists for this username, so display an error message
        echo '<p class="error">An account already exists for this username. Please choose a different username.</p>';
        $username = "";
      }
    }
    else {
	  if(empty($username) || empty($password1) || empty($password2) || empty($user_pass_phrase)) {
	    echo '<p class="error">You must enter all of the sign-up data.</p>';
	  }
      else if($password1 != $password2) {
	    echo '<p class="error">The 2 entered passwords are not the same.</p>';
		$password1 = "";
		$password2 = "";
	  }
	  else if($_SESSION['pass_phrase'] != $user_pass_phrase) {
	    echo '<p class="error">The entered CAPTCHA does not match the displayed.</p>';
	  }
	  else {
        echo '<p class="error">Error.</p>';
	  }
    }
  }

  mysqli_close($dbc);
?>

  <p>Please enter your desired username and password to sign up for Austin's Database.</p>
  <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <fieldset>
      <legend>Registration Info</legend>
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" value="<?php if (!empty($username)) echo $username; ?>" /><br />
      <label for="password1">Password:</label>
      <input type="password" id="password1" name="password1" value="<?php if (!empty($password1)) echo $password1; ?>" /><br />
      <label for="password2">Password (retype):</label>
      <input type="password" id="password2" name="password2" value="<?php if (!empty($password2)) echo $password2; ?>" /><br />
      <label for="captcha">CAPTCHA:</label>
	  <img src="captcha.php" alt="ERROR loading CAPTCHA" /><br />
	  <label for="verify">Verification:</label>
      <input type="text" id="verify" name="verify" value="Enter CAPTCHA here." />
	</fieldset>
    <input type="submit" value="Sign Up" name="submit" />
  </form>

<?php
  // Insert the page footer
  require_once('footer.php');
?>
