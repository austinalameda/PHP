<?php
  require_once('connectvars.php');
if($_REQUEST)
{
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die (mysqli_error());
	$username 	= mysqli_real_escape_string($dbc, trim($_REQUEST['username']));
	$password   = mysqli_real_escape_string($dbc, trim($_REQUEST['password']));
	$query = "SELECT * FROM login_info WHERE username = 'username' AND password = SHA('$password')";
        
    
	
	
	$data = mysqli_query($dbc, $query);
	
if (mysqli_num_rows($data) > 0) {
		echo '1';
	}
	else {
		echo '0';
	}	
}
?>