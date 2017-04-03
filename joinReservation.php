<?php
// Get a connection for the database
require_once('../../mysqli_connect.php');

//query construction
$query = "SELECT * From reservations";
// var_dump($_POST);

if (isset($_POST["bill"]))
{
  $query .= " INNER JOIN bills ON reservations.confirmationNo = bills.confirmationNo";
}

if (isset($_POST["room"]))
{
  $query .= " INNER JOIN rooms ON reservations.roomNo = rooms.roomNo";
}

if (isset($_POST["customer"]))
{
  $query .= " INNER JOIN customers ON reservations.creditCardNo = customers.creditCardNo";
}

$query .= ";";

echo $query;

$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
if($response){

  $table = '
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">All Customers</h3>
    </div>
    <div class="table-responsive">
  <table class = "table table-hover">
  <tr>
  <td><b>Confirmation Number</b></td>
  <td><b>Move in Date</b></td>
  <td><b>Move out Date</b></td>
  <td><b>Room Availability</b></td>
  <td><b>Room Number</b></td>
  <td><b>Credit Card Number</b></td>';

  if (isset($_POST["bill"]))
  {
    $table .= "<td><b>Points Earned</b></td> <td><b>Amount Due</b></td>";
  }

  if (isset($_POST["room"]))
  {
    $table .= "<td><b>Room type</b></td>";
  }

  if (isset($_POST["customer"]))
  {
    $table .= "<td><b>Customer Name</b></td>";
  }

  $table .= '</tr>';

echo $table;
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

    if (isset($_POST["bill"]))
    {
      $newcell = "<td>" . $row['pointsEarned'] . "</td>" . "<td>" . $row['amountDue'] . "</td>";
      echo $newcell;
    }

    if (isset($_POST["room"]))
    {
      $newcell = "<td>" . $row['roomType'] . "</td>";
      echo $newcell;
    }

    if (isset($_POST["customer"]))
    {
      $newcell = "<td>" . $row['name'] . "</td>";
      echo $newcell;
    }

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
