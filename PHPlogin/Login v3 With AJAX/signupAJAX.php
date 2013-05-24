<?php
  require_once('startsession.php');
  $page_title = 'Sign Up';
  require_once('header.php');
  require_once('connectvars.php');
  require_once('navmenu.php');
  ?>

  <p>Please enter your desired username and password to sign up for Austin's Database.</p>
  <div id="contact_form">
  <form action="" name="contact">
    <fieldset><legend>Registration Info</legend>
	  <label class="error" for="password" id="password_error">The 2 entered passwords are not the same.</label>
      <label class="error" for="username" id="username_error">Please enter desired username.</label>
	  <label class="error" for="password1" id="password1_error">Please enter desired password.</label>
	  <label class="error" for="password2" id="password2_error">Please confirm desired password.</label><br />
	  
	  <label for="username" id="username_label">Username:</label>
      <input type="text" id="username" name="username" value="" class="text-input" /><br />
	  

	  <label for="password1" id="password1_label">Password:</label>
      <input type="password" id="password1" name="password1" value="" class="text-input" /><br />
	  

	  <label for="password2" id="password2_label">Password (retype):</label>
      <input type="password" id="password2" name="password2" value="" class="text-input" /><br />
	  
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
  
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="invisiblesignup.js"></script>

<?php
  // Insert the page footer
  require_once('footer.php');
?>
