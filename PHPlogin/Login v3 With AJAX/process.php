<?php
// ---------------------------------------- Adds new user to database ----------------------------------------
	require_once('connectvars.php');
	if (isset($_POST['username'], $_POST['password1'], $_POST['password2'])) 
	{
		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die (mysqli_error());
		$username = mysqli_real_escape_string($dbc, trim($_POST['username']));
		$password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
		$password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));
		
		if (!empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2)) 
		{
			$query = "INSERT INTO login_info (username, password, join_date) VALUES ('$username', SHA('$password1'), NOW())";
			mysqli_query($dbc, $query);
			mysqli_close($dbc);
			exit();
		}
		mysqli_close($dbc);
	}
?>