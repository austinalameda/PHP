<?php
// ---------------------------------------- Navigation bar ----------------------------------------
	// Generate the navigation menu
	$navbar = "";
	$navbar = '<div id="nav_menu"><hr />' . '&#10084;<a href="index.php">Home</a>&#10084;' . 
		'<a href="signupAJAX.php">Sign Up</a>&#10084;' .
		'<a href="loginAJAX.php">Log In</a>&#10084;';
	if (isset($_SESSION['username'])) // adds logout if logged in
	{
		$navbar = $navbar . '<a href="logout.php">Log Out <b><font color ="red">(' . $_SESSION['username'] . ')</font></b></a>&#10084;';
	}
	$navbar = $navbar . '<hr /></div>';
	echo $navbar;
?>
