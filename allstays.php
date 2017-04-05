<?php
// Get a connection for the database
require_once('../../mysqli_connect.php');

// Create a query for the database
$query = "SELECT *  FROM stays";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
if($response){

  echo '
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">All Users</h3>
    </div>
    <div class="table-responsive">
  <table class = "table table-hover">

  <tr>
  <td><b>Move in Date</b></td>
  <td><b>Move out Date</b></td>
  </tr>';

  // mysqli_fetch_array will return a row of data from the query
  // until no further data is available
  while($row = mysqli_fetch_array($response)){

    echo '<tr>
    <td align="left">' .
    $row['inDate'] . '</td>
    <td align="centre">' .
    $row['outDate'] . '</td><td align="centre">';

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
