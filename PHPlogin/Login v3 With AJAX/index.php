<?php
// ---------------------------------------- Website home page ----------------------------------------
	// Start the session
	require_once 'startsession.php';
  
	// Insert the page header
	$page_title = 'Home';
	require_once 'header.php';
	require_once 'connectvars.php';
  
	// Show the navigation menu
	require_once 'navmenu.php';

	require_once 'membertable.php';
	
	// Insert the page footer
	require_once 'footer.php';
?>
