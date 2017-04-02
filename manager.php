<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>BookingPals</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="styles.css">
  <script src="https://use.fontawesome.com/fbc1a80091.js"></script>
</head>
<body>
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="home.php" class="navbar-brand">BookingPals</a>

      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

        <ul class="nav navbar-nav">
          <li class = "active"><a href="manager.php">Manager View</a></li>
          <li><a href="manageruser.php">Manage Users</a></li>
          <li><a href="#">Manage Reservations</a></li>

        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#">Signup <i class="fa fa-user-plus" aria-hidden="true"></i></a></li>
          <li><a href="#">Login <i class="fa fa-user" aria-hidden="true"></i></a></li>
          <li><a href="#">Manager <i class="fa fa-user-secret" aria-hidden="true"></i></a></li>
        </div>
      </div>
    </ul>
  </nav>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">

        <label for="username">Find User using Username:</label>
        <div class="form-inline">
          <input type="string" class="form-control" id="username" placeholder="e.g. a">
            <button type = "submit" class="btn btn-primary" id = "finduser" align = "center">Find Users</button>
        </div>


        <button type = "submit" class="btn btn-primary" id = "btnQuerySubmit" align = "center">Show Users</button>
        <button type = "submit" class="btn btn-primary" id = "btnQueryJoin"> Join</button>
        <button type = "submit" class="btn btn-primary" id = "btnQueryDivision">Division</button>
        <button type = "submit" class="btn btn-primary" id = "btnQueryAgg">Aggregate of all bills</button>
        <button type = "submit" class="btn btn-primary" id = "btnQueryAvg">Average of all bills</button>

        <button type = "submit" class="btn btn-primary" id = "btnQuerySum">Sum of all bills</button>

        <button type = "submit" class="btn btn-primary" id = "btnQueryMax">Max bill</button>

        <button type = "submit" class="btn btn-primary" id = "btnQueryMin">Min bill</button>

          <button type = "submit" class="btn btn-primary" id = "btnAverage1">Average price for capacity 1</button>

        	<button type = "submit" class="btn btn-primary" id = "btnAverage2">Average price for capacity 2</button>

        	<button type = "submit" class="btn btn-primary" id = "btnAverage3">Average price for capacity 3</button>

        	<button type = "submit" class="btn btn-primary" id = "btnMax1">Max price for capacity 1</button>

        	<button type = "submit" class="btn btn-primary" id = "btnMax2">Max price for capacity 2</button>

        <button type = "submit" class="btn btn-primary" id = "btnMax3">Max price for capacity 3</button>

        <button type = "submit" class="btn btn-primary" id = "btnMin1">Min price for capacity 1</button>

        <button type = "submit" class="btn btn-primary" id = "btnMin2">Min price for capacity 2</button>

        <button type = "submit" class="btn btn-primary" id = "btnMin3">Min price for capacity 3</button>

        <button type = "submit" class="btn btn-primary" id = "btnQueryUpdate1">Bronze User Update 1 point</button>
        <button type = "submit" class="btn btn-primary" id = "btnQueryUpdate2">Bronze User Update 2 point</button>
        <button type = "submit" class="btn btn-primary" id = "btnQueryUpdate3">Bronze User Update 3 point</button>
        <div style="background:transparent !important" class="jumbotron">
          <div id="responsecontainer" align="center" color = "grey">
          </div>
        </div>
      </div>
    </div>
    <script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript"src = "manager.js"></script>
  </body>
  </html>
