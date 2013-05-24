<?php
  // Start the session
  require_once('startsession.php');
  
  // Insert the page header
  $page_title = 'Home';
  require_once('header.php');
  require_once('connectvars.php');
  
  // Show the navigation menu
  require_once('navmenu.php');

  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die (mysqli_error()); 

  // Retrieve the user data from MySQL
  $query = "SELECT user_id, username, join_date FROM login_info WHERE username IS NOT NULL ORDER BY join_date DESC LIMIT 100";
  $data = mysqli_query($dbc, $query);

  // Loop through the array of user data, formatting it as HTML
  echo '<fieldset><legend>Member List</legend><table border="1">';
  while ($row = mysqli_fetch_array($data)) {
    if (isset($_SESSION['user_id'])) {
      echo '<tr><td>' . $row['username'] . '</td><td>' . $row['join_date'] . '</td></tr>';
    }
    else {
      echo '<tr><td>' . $row['username'] . '</td></tr>';
    }
  }
  echo '</table>';
  echo '</fieldset>';

  mysqli_close($dbc);
?>

<?php
  // Insert the page footer
  require_once('footer.php');
?>
