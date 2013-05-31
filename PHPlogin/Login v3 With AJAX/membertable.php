<?php
	require_once 'connectvars.php';
	
	// Connect to the database and get memberlist
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die (mysqli_error()); 
	$query = "SELECT user_id, username, join_date FROM login_info WHERE username IS NOT NULL ORDER BY join_date DESC LIMIT 100";
	$data = mysqli_query($dbc, $query); 

	// Loop through the array of user data, formatting it as HTML
	echo '<legend><strong>Member List</strong></legend><table border="1">';
	while ($row = mysqli_fetch_array($data)) 
	{
		if (isset($_SESSION['user_id'])) // shows date if user logged in
		{
			echo '<tr><td>' . $row['username'] . '</td><td>' . $row['join_date'] . '</td></tr>';
		}
		else 
		{
			echo '<tr><td>' . $row['username'] . '</td></tr>';
		}
	}
	echo '</table>';
	mysqli_close($dbc);
?>