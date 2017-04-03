<?php
// Get a connection for the database
require_once('../../mysqli_connect.php');

// Create a query for the database
$query = "SELECT *  FROM customers";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
if($response){

  echo '
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">All Customers</h3>
    </div>
    <div class="table-responsive">
  <table class = "table table-hover">

  <tr>
  <td><b>Credit Card Number</b></td>
  <td><b>GuestID</b></td>
  <td><b>Username</b></td>
  <td><b>Name</b></td>
  </tr>';

  // mysqli_fetch_array will return a row of data from the query
  // until no further data is available
  while($row = mysqli_fetch_array($response)){

    echo '<tr>
    <td align="left">' .
    $row['creditCardNo'] . '</td>
    <td align="centre">' .
    $row['guestID'] . '</td><td align="centre">' .
    $row['username'] . '</td><td align="centre">' .
    $row['name'] . '</td>';

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
