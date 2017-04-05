<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>BookingPals</title>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootcards/1.0.0/css/bootcards-desktop.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="styles.css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
  <script src="https://use.fontawesome.com/fbc1a80091.js"></script>
  <script src="http://canvasjs.com/assets/script/canvasjs.min.js"></script>
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
          <li><a href="manageruser.php">Manage Users</a></li>
          <li><a href="managerreservation.php">Manage Reservations</a></li>
          <li><a href="manageredits.php">Manage Changes</a></li>
          <li class = "active"><a href="managerVisualize.php">Visualization</a></li>
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

        <div class="panel panel-default">
          <div class="panel-heading clearfix">
            <h3 class="panel-title pull-left">Visualize</h3>
            <div class="btn-group pull-right">
              <button class="btn btn-primary" id = "chart1"><i class="fa fa-list"></i>Average Amount Due by Customers</button>
              <button class="btn btn-info" id = "allusers"><i class="fa fa-list-alt"></i>All Users</button>
              <button class="btn btn-danger"><i class="fa fa-times"></i>Cancel</button>
              <button class="btn btn-success" id = "findcustomer"><i class="fa fa-search" aria-hidden="true"></i>Find User</button>
            </div>
          </div>
        </div>
    </div>
  </div>
  <div id="responsecontainer" align="center" color = "grey"></div>
</div>
</div>
<script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootcards/1.0.0/js/bootcards.min.js"></script>
<script type="text/javascript">
$("#chart1").click(function() {
  $.ajax({    //create an ajax request to load_page.php
    type: "GET",
    url: "getData.php",
    dataType: "json",   //expect html to be returned
    success: function(response){
      console.log(response);
      for (var i in response){
        response[i]['y'] = Number(response[i]['y']);
      }
      console.log(response);
      var chart = new CanvasJS.Chart("responsecontainer", {
    		title:{
    			text: "Average Customer bills due"
    		},
    		data: [
    		{
    			// Change type to "doughnut", "line", "splineArea", etc.
    			type: "column",
    			dataPoints: response
    		}
    		]
    	});
    	chart.render();
    }
  });
});

$("#upgrade").click(function() {
    var queryData = new Object();
    queryData.upgradeReservation = $("#upgradeReservation").val();
    queryData.upgradeRoom = $("#upgradeRoom").val();
    console.log(queryData);
    $.ajax({    //create an ajax request to load_page.php
      type: "POST",
      data: queryData,
      url: "upgrade.php",
      dataType: "html",   //expect html to be returned
      success: function(response){
        $("#responsecontainer").html(response);
      }
    });
});
</script>
</body>
</html>
