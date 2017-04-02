<?php
// Get a connection for the database
require_once('../../mysqli_connect.php');

// Create a query for the database
$query = "SELECT capacity, MAX(rate) FROM roomtypes GROUP BY capacity HAVING capacity=1";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
if($response){

  echo '<table align="centre"
  cellspacing="5" cellpadding="8">

  <tr><td align="centre"><b>Capacity</b></td>
  <td align="centre"><b>Max rate</b></td></tr>';

  // mysqli_fetch_array will return a row of data from the query
  // until no further data is available
  while($row = mysqli_fetch_array($response)){

    echo '<tr><td align="centre">' .
    $row['capacity'] . '</td><td align="centre">' .
    $row['MAX(rate)'] . '</td>';

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
