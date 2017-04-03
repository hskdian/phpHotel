<?php
// Get a connection for the database
require_once('../../mysqli_connect.php');

//query construction
$addComma = 0;
$query = "SELECT ";
// var_dump($_POST);

if (isset($_POST["projectCreditCard"]))
{
  $projectCreditCard = $_POST["projectCreditCard"];
  $query .= $projectCreditCard;
  $addComma =1;
}

if (isset($_POST["projectGuestID"]))
{
  $projectGuestID = $_POST["projectGuestID"];
    if($addComma == 0){
      $query .= $projectGuestID;
      $addComma =1;
    }
    else{
    $query .= " , $projectGuestID";
    }
}

if (isset($_POST["projectUsername"]))
{
  $projectUsername = $_POST["projectUsername"];
    if($addComma == 0){
      $query .= $projectUsername;
      $addComma =1;
    }
    else {
      $query .= " ,$projectUsername";
    }
}

if (isset($_POST["projectName"]))
{
  $projectName = $_POST["projectName"];
  if($addComma == 0){
    $query .= $projectName;
    $addComma =1;
  }
  $query .= " ,$projectName";
}

$query .= " FROM customers";

$addAND = 0;

if (isset($_POST["filterCreditCard"]))
{
  $filterCreditCard = $_POST["filterCreditCard"];
  $query .= " WHERE creditCardNo = '$filterCreditCard'";
  $addAND =1;
}

if (isset($_POST["filterGuestID"]))
{
  $filterGuestID = $_POST["filterGuestID"];
    if($addAND == 0){
      $query .= " WHERE guestID = '$filterGuestID'";
      $addAND =1;
    }
    else{
    $query .= " AND guestID = '$filterGuestID'";
    }
}

if (isset($_POST["filterUsername"]))
{
  $filterUsername = $_POST["filterUsername"];
    if($addAND == 0){
      $query .= " WHERE username = '$filterUsername'";
      $addAND =1;
    }
    else {
      $query .= " AND username = '$filterUsername'";
    }
}

if (isset($_POST["filterName"]))
{
  $filterName = $_POST["filterName"];
  if($addAND == 0){
    $query .= " WHERE name = '$filterName'";
    $addAND =1;
  }
  $query .= " AND name = '$filterName'";
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
  <tr>';
  if (isset($_POST["projectCreditCard"]))
  {
    $table .= "<td><b>Credit Card Number</b></td>";
  }

  if (isset($_POST["projectGuestID"]))
  {
    $table .= "<td><b>GuestID</b></td>";
  }

  if (isset($_POST["projectUsername"]))
  {
    $table .= "<td><b>Username</b></td>";
  }

  if (isset($_POST["projectName"]))
  {
    $table .= "<td><b>Name</b></td>";
  }

  $table .= '</tr>';

echo $table;
  // mysqli_fetch_array will return a row of data from the query
  // until no further data is available
  while($row = mysqli_fetch_array($response)){

    echo '<tr>';

    if (isset($_POST["projectCreditCard"]))
    {
      $newcell = "<td>" . $row['creditCardNo'] . "</td>";
      echo $newcell;
    }

    if (isset($_POST["projectGuestID"]))
    {
      $newcell = "<td>" . $row['guestID'] . "</td>";
      echo $newcell;
    }

    if (isset($_POST["projectUsername"]))
    {
      $newcell = "<td>" . $row['username'] . "</td>";
      echo $newcell;
    }

    if (isset($_POST["projectName"]))
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
