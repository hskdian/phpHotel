<html>
<head>
<title>User Points</title>
</head>
<body>
<?php

if(isset($_POST['submit'])){

    $data_missing = array();

    if(empty($_POST['username'])){

        // Adds name to array
        $data_missing[] = 'username';

    } else {

        // Trim white space from the name and store the name
        $f_name = trim($_POST['username']);

    }

    if(empty($data_missing)){

        require_once('../../mysqli_connect.php');

	$query = "SELECT points FROM users WHERE username = ?";

        $stmt = mysqli_prepare($dbc, $query);

        mysqli_stmt_bind_param($stmt, "s", $username);

        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){

            echo 'Points Found';

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);

        } else {

            echo 'Error Occurred<br />';
            echo mysqli_error();

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);

        }

    } else {

        echo 'You need to enter the following data<br />';

        foreach($data_missing as $missing){

            echo "$missing<br />";

        }

    }

}

?>

<form action="http://localhost/pointsofuser.php" method="post">

<b>Get Points of User</b>

<p>username:
<input type="text" name=“username” size="30" value="" />
</p>

<p>
<input type="submit" name="submit" value="Send" />
</p>

</form>
</body>
</html>
