<?php
// ---------------------------------------- Updates member table ----------------------------------------
	require_once('connectvars.php');
	if($_REQUEST)
	{
		// Connect to the database 
		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die (mysqli_error()); 

		// Retrieve the user data from MySQL
		$query = "SELECT user_id, username, join_date FROM login_info WHERE username IS NOT NULL ORDER BY join_date DESC LIMIT 100";
		$data = mysqli_query($dbc, $query);
	
		$table = ""	;
		while ($row = mysqli_fetch_array($data))
		{
			// Appends new user to top of table in a red font
			if($table == "")
			{
				$table = $table . '<tr><td><font color="red">' . $row['username'] . '</td></tr></font>';
			}
			else
			{
				$table = $table . '<tr><td>' . $row['username'] . '</td></tr>';
			}
		}
	
		if (mysqli_num_rows($data) > 0)
		{
			echo '<legend><strong>Member List</strong></legend><table border="1">' . $table . '</table>';
		}
		else 
		{
			echo '1';
		}	
	}
?>