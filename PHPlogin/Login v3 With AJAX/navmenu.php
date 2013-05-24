<?php
  // Generate the navigation menu
  echo '<hr />';
  if (isset($_SESSION['username'])) {
    echo '&#10084;<a href="index.php">Home</a>&#10084;';
    echo '<a href="signupAJAX.php">Sign Up</a>&#10084;';
    echo '<a href="login.php">Log In</a>&#10084;';
    echo '<a href="logout.php">Log Out <b><font color ="red">(' . $_SESSION['username'] . ')</font></b></a>&#10084;';
  }
  else {
    echo '&#10084;<a href="index.php">Home</a>&#10084;';
	echo '<a href="signupAJAX.php">Sign Up</a>&#10084;';
    echo '<a href="login.php">Log In</a>&#10084;';
  }
  echo '<hr />';
?>
