<?php
// Get a connection for the database
require_once('../../mysqli_connect.php');

//see if username exists

    // Do whatever you want with the $uid
// Create a query for the database
if (isset($_POST["username2"]))
{
  $username2 = $_POST["username2"];
  echo $username2;
  echo " is your username";
}
else
{
  $user = null;
  echo "no username supplied";
}
// var_dump($_POST);
// $username2 =$_SERVER['QUERY_STRING'];

    // $username2 = $_POST['username2'];
    $query = "SELECT * FROM users WHERE username = '$username2'";
// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
if($response){

  echo '<table>

  <tr><td><b>Username</b></td>
  <td ><b>Points</b></td></tr>';

  // mysqli_fetch_array will return a row of data from the query
  // until no further data is available
  while($row = mysqli_fetch_array($response)){

    echo '<tr><td align="left">' .
    $row['username'] . '</td><td align="centre">' .
    $row['points'] . '</td>';

    echo '</tr>';
  }

  echo '</table>';

} else {

  echo "Couldn't issue database query<br />";

  echo mysqli_error($dbc);

}

// Close connection to the database
mysqli_close($dbc);

?>
