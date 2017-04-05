<?php
// Get a connection for the database
require_once('../../mysqli_connect.php');

// Create a query for the database
$query = "SELECT ";

$aggregator = $_POST["aggregator"];

$tobeAggregated = $_POST["tobeAggregated"];

$tobeAverage = $_POST["toAverage"];

// var_dump($_POST);

$query .= $aggregator . "(" . $tobeAggregated . ")" . " FROM bills WHERE $tobeAggregated IN (SELECT AVG ($tobeAggregated) AS $tobeAggregated FROM reservations INNER JOIN bills ON reservations.confirmationNo = bills.confirmationNo INNER JOIN rooms ON reservations.roomNo = rooms.roomNo INNER JOIN customers ON reservations.creditCardNo = customers.creditCardNo GROUP BY reservations.$tobeAverage) ";

// "SELECT MIN(amountDue) FROM bills WHERE amountDue IN (SELECT AVG(amountDue) AS amountDue FROM reservations INNER JOIN bills ON reservations.confirmationNo = bills.confirmationNo INNER JOIN rooms ON reservations.roomNo = rooms.roomNo INNER JOIN customers ON reservations.creditCardNo = customers.creditCardNo GROUP BY reservations.creditCardNo)";

// "SELECT MAX(amountDue) FROM bills WHERE amountDue IN (SELECT AVG(amountDue) AS amountDue FROM reservations INNER JOIN bills ON reservations.confirmationNo = bills.confirmationNo INNER JOIN rooms ON reservations.roomNo = rooms.roomNo INNER JOIN customers ON reservations.creditCardNo = customers.creditCardNo GROUP BY reservations.creditCardNo)";

// "SELECT MIN(amountDue) FROM bills WHERE amountDue IN (SELECT AVG(amountDue) AS amountDue FROM reservations INNER JOIN bills ON reservations.confirmationNo = bills.confirmationNo INNER JOIN rooms ON reservations.roomNo = rooms.roomNo INNER JOIN customers ON reservations.creditCardNo = customers.creditCardNo GROUP BY reservations.roomNo)";

// "SELECT MAX(amountDue) FROM bills WHERE amountDue IN (SELECT AVG(amountDue) AS amountDue FROM reservations INNER JOIN bills ON reservations.confirmationNo = bills.confirmationNo INNER JOIN rooms ON reservations.roomNo = rooms.roomNo INNER JOIN customers ON reservations.creditCardNo = customers.creditCardNo GROUP BY reservations.roomNo)";

//echo $query;
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
  <tr><td align="centre"><b>Result</b></td></tr>';

  // mysqli_fetch_array will return a row of data from the query
  // until no further data is available
  while($row = mysqli_fetch_array($response)){

    echo '<tr><td align="centre">' .
    $row[$aggregator . "(" . $tobeAggregated . ")"] . '</td><td align="centre">';

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
