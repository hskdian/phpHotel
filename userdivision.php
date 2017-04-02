<?php
// Get a connection for the database
require_once('../../mysqli_connect.php');

// Create a query for the database
$query = "SELECT name FROM customers WHERE NOT EXISTS ( SELECT * FROM rooms WHERE NOT EXISTS (SELECT * FROM reservations
          WHERE reservations.roomNo=rooms.roomNo AND reservations.creditCardNo=customers.creditCardNo))";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
if($response){

  echo '<table align="left"
  cellspacing="5" cellpadding="8">

  <tr><td align="left"><b>Name</b></td></tr>';

  // mysqli_fetch_array will return a row of data from the query
  // until no further data is available
  while($row = mysqli_fetch_array($response)){

    echo '<tr><td align="left">' .
    $row['name'] . '</td><td align="centre">' .
    '</td>';

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
