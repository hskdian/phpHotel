<?php
	// Set up sessionn path and start the session.
	// session_save_path("/home/y/y5m8/public_html");
	session_save_path("/home/l/l1z8/public_html/cpsc304/"); // should probable use your own...
	session_start();
	require "functions.php";
	global $db_conn;
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>RegSys</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/style.css" rel="stylesheet" type="css/css" media="all" />
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
	<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Exo+2:400,700,100' rel='stylesheet' type='text/css'>
</head>
<body>
<!--content-->
<h1>RegSys 1.0</h1>
<h2>Recreation Centre Registration System</h2>
<p><?php
	echo "Hello, ";
	$getName = "SELECT name
				FROM employee
				WHERE employee.empID = '" . $_SESSION["empID"] . "'
				AND employee.password = '" . $_SESSION["password"] . "'";


	$result = executePlainSQL($getName);
	$row = oci_fetch_array($result, OCI_BOTH);
	if ( $row["NAME"] ){
		echo $row["NAME"];
		$loginName = "Logout";
		$loginAction = "window.location.href='logout.php'";
	}
	else {
		echo "Guest!";
		$loginName = "Login";
		$loginAction = "window.location.href='login.php'";
	}
?></p>
<ul class="content">
      <li class="menu">
          <ul>
        <li class="button"><a href="activities.php">Activities<span class="icon pro"> </span></a></li>
          </ul>
      </li>
      <li class="menu">
          <ul>
        <li class="button"><a href="classes.php">Classes<span class="icon"> </span></a></li>
          </ul>
      </li>
      <li class="menu">
          <ul>
        <li class="button"><a href="rental.php">Rentals<span class="icon"> </span> </a></li>
          </ul>
      </li>
<?php
	if ($row["NAME"]) {
	// echo "<input type=\"button\" value=\"Stats\" onclick=\"window.location.href='stats.php'\"/>";
	echo "<li class=\"menu\">
        	<ul>
       			<li class=\"button\"><a href=\"stats.php\">Stats<span class=\"icon msg\"> </span> </a></li>
        	</ul>
  		  </li>";
	echo "<li class=\"menu info\">
        	<ul>
       			<li class=\"button\"><a href=\"logout.php\">Logout<span class=\"icon signout\"> </span> </a></li>
        	</ul>
  		  </li>";
	echo " </ul>
	<ul class=\"content\">
	    <li class=\"menu info\">
	          <ul>
	        <li class=\"button\"><a href=\"reset.php\">Reset<span class=\"icon msg\"> </span> </a></li>
	          </ul>
	    </li>
	</ul>";
	}
	else {
    echo "<li class=\"menu info\">
          <ul>
        <li class=\"button\"><a href=\"login.php\">Login<span class=\"icon signout\"> </span> </a></li>
          </ul>
      </li>
      </ul>";
	}
?>
<!--/content-->
<!--copyright w3layouts.com-->
<div class="authors">
  <p>Created by</p>
  <ul>
    <li>Adam Wong</li>
    <li>Vincent Leung</li>
    <li>Johnson Nguyen</li>
    <li>Vincent Sheu</li>
  </ul>
</div>
  </body>
</html>
