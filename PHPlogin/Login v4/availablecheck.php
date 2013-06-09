<?php
// ---------------------------------------- Checks if username already taken ----------------------------------------
	require_once 'connectvars.php';
	if ($_POST)
	{
		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die (mysqli_error());
		$username 	= $_POST['username'];
		$query = "SELECT * FROM login_info WHERE username = '".strtolower($username)."'";
		$data = mysqli_query($dbc, $query);
	
		if (mysqli_num_rows($data) > 0) 
		{
			echo '0';
		}
		else 
		{
			echo '1';
		}	
		mysqli_close($dbc);
	}
?>