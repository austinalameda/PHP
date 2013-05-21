<?php
  session_start();

  // If the session vars aren't set, try to set them with a cookie
  if (!isset($_SESSION['user_id'])) {
    if (isset($_COOKIE['user_id']) && isset($_COOKIE['username'])) {
      $_SESSION['user_id'] = $_COOKIE['user_id'];
      $_SESSION['username'] = $_COOKIE['username'];
    }
  }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Austin's Database - Index</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
  <h3>Austin's Database - Index</h3>

  <?php
  require_once('connectvars.php');

  // Generate the navigation menu
  if (isset($_SESSION['username'])) {
    echo '&#10084; HOME!<br />';
	echo '&#10084; <i>You are logged in as <b><font color ="red">' . $_SESSION['username'] . '</font></b>.<br /></i>';
    echo '&#10084; <a href="logout.php">Log Out</a>';
  }
  else {
    echo '&#10084; <a href="login.php">Log In</a><br />';
    echo '&#10084; <a href="signup.php">Sign Up</a>';
  }

  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

  // Retrieve the user data from MySQL
  $query = "SELECT username, join_date FROM login_info WHERE username IS NOT NULL ORDER BY join_date DESC LIMIT 100";
  $data = mysqli_query($dbc, $query);

  // Loop through the array of user data, formatting it as HTML
  echo '<fieldset>';
  echo '<legend>Member List</legend>';
  echo '<table border="1">';

  while ($row = mysqli_fetch_array($data)) {    
      echo '<tr><td>' . $row['username'] . '</td><td>' . $row['join_date'] . '</td></tr><br />';
  }
  echo '</table>';
  echo '</fieldset>';

  mysqli_close($dbc);
?>

</body> 
</html>
