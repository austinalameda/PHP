<?php
// ---------------------------------------- Verifies username/password combo are valid ----------------------------------------
	require_once('connectvars.php');
	if($_REQUEST)
	{
		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die (mysqli_error());
		$username 	= mysqli_real_escape_string($dbc, trim($_REQUEST['username']));
		$password   = mysqli_real_escape_string($dbc, trim($_REQUEST['password']));
		$query = "SELECT user_id, username FROM login_info WHERE username = '$username' AND password = SHA('$password')";
		$data = mysqli_query($dbc, $query);
	
		// If username/password combo match, logs user in
		if (mysqli_num_rows($data) > 0) 
		{
			$row = mysqli_fetch_array($data);
			$_SESSION['user_id'] = $row['user_id'];
			$_SESSION['username'] = $row['username'];
			setcookie('user_id', $row['user_id'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
			setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));  // expires in 30 days
			echo '1';
		}
		else 
		{
			echo '0';
		}	
		mysqli_close($dbc);
	}
?>