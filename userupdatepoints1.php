<?php
// Get a connection for the database
require_once('../../mysqli_connect.php');

// Create a query for the database
$query = "UPDATE users SET points = points + 1 WHERE points < 50";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed

// Close connection to the database
mysqli_close($dbc);

?>
