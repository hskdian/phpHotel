<?php

require_once('../../mysqli_connect.php');

//fetch table rows from mysql db
$sql = "SELECT customers.name AS label, AVG(amountDue) as Y FROM bills INNER JOIN reservations ON reservations.confirmationNo = bills.confirmationNo INNER JOIN rooms ON reservations.roomNo = rooms.roomNo INNER JOIN customers ON reservations.creditCardNo = customers.creditCardNo GROUP BY customers.name;";

$result = mysqli_query($dbc, $sql) or die("Error in Selecting " . mysqli_error($connection));

//create an array
$emparray = array();
while($row =mysqli_fetch_assoc($result))
{
    $emparray[] = $row;
}
echo json_encode($emparray);

//close the db connection
mysqli_close($dbc);
?>
