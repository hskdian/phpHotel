<?php
// Get a connection for the database
require_once('../../mysqli_connect.php');

// Create a query for the database
$upgradeReservation = $_POST["upgradeReservation"];

$upgradeRoom = $_POST["upgradeRoom"];

if($upgradeRoom <=10){
  $query = "UPDATE reservations SET roomNo = $upgradeRoom WHERE confirmationNo =$upgradeReservation";

  echo $query;

  // Get a response from the database by sending the connection
  // and the query
  $response = @mysqli_query($dbc, $query);

  // If the query executed properly proceed
  if($response){
  $query = "SELECT * FROM reservations WHERE confirmationNo =$upgradeReservation";
  $response = @mysqli_query($dbc, $query);
  echo '
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">All Users</h3>
    </div>
    <div class="table-responsive">
  <table class = "table table-hover">

  <tr>
  <td><b>Confirmation Number</b></td>
  <td><b>Move in Date</b></td>
  <td><b>Move out Date</b></td>
  <td><b>Room Availability</b></td>
  <td><b>Room Number</b></td>
  <td><b>Credit Card Number</b></td>
  </tr>';

    // mysqli_fetch_array will return a row of data from the query
    // until no further data is available
    while($row = mysqli_fetch_array($response)){

      echo '<tr>
      <td align="left">' .
      $row['confirmationNo'] . '</td>
      <td align="centre">' .
      $row['inDate'] . '</td><td align="centre">' .
      $row['outDate'] . '</td><td align="centre">' .
      $row['availability'] . '</td><td align="centre">' .
      $row['roomNo'] . '</td><td align="centre">' .
      $row['creditCardNo'] . '</td>';

      echo '</tr>';
    }

    echo '</table>';

  } else {

    echo "Couldn't issue database query<br />";

    echo mysqli_error($dbc);

  }

  // Close connection to the database
  mysqli_close($dbc);
}
else{
  echo '<div class="panel panel-default">
  <div class="panel-heading clearfix">
    <h3 class="panel-title pull-left">ERROR</h3>
      <a class="btn btn-default pull-right" href="#">
  </div>
  <div class="panel-body">';
  echo "No such room exists.";
}


?>
