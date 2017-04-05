<?php
// Get a connection for the database
require_once('../../mysqli_connect.php');

$reservationID = $_POST["reservationID"];
// Create a query for the database
$query = "DELETE FROM bills WHERE confirmationNo =  '$reservationID'";

echo $query;
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
if($response){

  $query = "SELECT * FROM bills";

  $response = @mysqli_query($dbc, $query);
  echo '
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">All Bills</h3>
    </div>
    <div class="table-responsive">
  <table class = "table table-hover">

  <tr>
  <td><b>Confirmation Number</b></td>
  <td><b>Amount Due</b></td>
  <td><b>Points Earned</b></td>
  </tr>';

  // mysqli_fetch_array will return a row of data from the query
  // until no further data is available
  while($row = mysqli_fetch_array($response)){

    echo '<tr>
    <td align="left">' .
    $row['confirmationNo'] . '</td>
    <td align="centre">' .
    $row['amountDue'] . '</td><td align="centre">' .
    $row['pointsEarned'] . '</td>';

    echo '</tr>';
  }

  echo '</table>';

} else {

  echo "Couldn't issue database query<br />";

  echo '  <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">All Users</h3>
      </div>';

  echo mysqli_error($dbc);

}


$query = "SELECT * From reservations";
// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// Close connection to the database
mysqli_close($dbc);

?>
