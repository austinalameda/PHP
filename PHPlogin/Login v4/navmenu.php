<?php
// ---------------------------------------- Navigation bar ----------------------------------------
	// Generate the navigation menu
	$navbar = "";
	$navbar = '<div id="nav_menu"><hr /><div id="nav_links">' . '<div class="nav_button"><a href="index.php">Home</a></div>' . 
		'<div class="nav_button"><a href="signupAJAX.php">Sign Up</a></div>' .
		'<div class="nav_button"><a href="loginAJAX.php">Log In</a></div>';
	if (isset($_SESSION['username'])) // adds logout if logged in
	{
		$navbar = $navbar . '<div class="nav_button"><a href="logout.php">Log Out <b><font color ="red">(' . $_SESSION['username'] . ')</font></b></a></div>';
	}
	$navbar = $navbar . '</div><hr /></div>';
?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="navbutton.js"></script>

<?php
	echo $navbar;
?>
