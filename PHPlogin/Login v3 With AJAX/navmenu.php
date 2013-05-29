<?php
// ---------------------------------------- Navigation bar ----------------------------------------
	// Generate the navigation menu
	echo '<div id="nav_menu"><hr />';
	if (isset($_SESSION['username'])) // adds logout if logged in
	{
		echo '&#10084;<a href="index.php">Home</a>&#10084;' . 
		'<a href="signupAJAX.php">Sign Up</a>&#10084;' .
		'<a href="loginAJAX.php">Log In</a>&#10084;' .
		'<a href="logout.php">Log Out <b><font color ="red">(' . $_SESSION['username'] . ')</font></b></a>&#10084;';
	}
	else
	{
		echo '&#10084;<a href="index.php">Home</a>&#10084;' .
		'<a href="signupAJAX.php">Sign Up</a>&#10084;' .
		'<a href="loginAJAX.php">Log In</a>&#10084;';
	}
	echo '<hr /></div>';
?>
