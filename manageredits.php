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
          <li><a href="manager.php">Manager View</a></li>
          <li><a href="manageruser.php">Manage Users</a></li>
          <li><a href="managerreservation.php">Manage Reservations</a></li>
          <li class = "active"><a href="manageredits.php">Manage Changes</a></li>

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
            <h3 class="panel-title pull-left">Find User</h3>
            <div class="btn-group pull-right">
              <!-- <button class="btn btn-primary" id = "allreservations"><i class="fa fa-list"></i>All Reservations</button> -->
              <button class="btn btn-info" id = "deleteReservations"><i class="fa fa-compress" aria-hidden="true"></i>Delete Reservations</button>
              <button class="btn btn-primary" id = "deleteBill"><i class="fa fa-check"></i>Delete Bills</button>
              <button class="btn btn-danger" id = "aggregate"><i class="fa fa-times"></i>Upgrade Room</button>
              <button class="btn btn-success" id = "aggregateNested"><i class="fa fa-check"></i>Update Confirmation Number</button>
            </div>
          </div>

          <div class="modal-body">

            <form class="form-horizontal">
              <div class="form-group form-inline">
                <label class="col-xs-3 control-label">Delete Reservations </label>
                <div class="col-xs-9">
                  <input type="number" class="form-control" placeholder="1" id = "deleteReservationID">
                </div>
              </div>
            </form>

            <form class="form-horizontal">
              <div class="form-group">
                <label class="col-xs-3 control-label">Customers who</label>
                <div class="col-xs-9">
                  <select class="form-control" id = "divideBy">
                    <option selected>Booked All the rooms</option>
                  </select>
                </div>
              </div>
            </form>

            <form class="form-horizontal">
              <div class="form-group form-inline">
                <label class="col-xs-3 control-label">Update UserID </label>
                <div class="col-xs-9">
                  <span>From</span>
                  <input type="number" class="form-control" placeholder="1111" id = "olduserID">
                  <span>TO</span>
                  <input type="number" class="form-control" placeholder="2222" id = "newuserID">
                </div>
              </div>
            </form>

            <form class="form-horizontal">
              <div class="form-group form-inline">
                <label class="col-xs-3 control-label">Update GuestID </label>
                <div class="col-xs-9">
                  <span>From</span>
                  <input type="number" class="form-control" placeholder="1111" id = "oldguestID">
                  <span>TO</span>
                  <input type="number" class="form-control" placeholder="2222" id = "newguestID">
                </div>
              </div>
            </form>

          </div>
        </div>
        <div id="responsecontainer" align="center" color = "grey"></div>
      </div>
    </div>
    <script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootcards/1.0.0/js/bootcards.min.js"></script>
    <script type="text/javascript">

    $("#deleteReservations").click(function() {
      var queryData = new Object();
      queryData.reservationID = $("#deleteReservationID").val();
      console.log(queryData);
      $.ajax({    //create an ajax request to load_page.php
        type: "POST",
        data: queryData,
        url: "deleteReservation.php",
        dataType: "html",   //expect html to be returned
        success: function(response){
          $("#responsecontainer").html(response);
        }
      });
    });

    $("#division").click(function() {
      var queryData = new Object();
      queryData.divide = $("#divideBy").val();
      console.log(queryData);
      $.ajax({    //create an ajax request to load_page.php
        type: "POST",
        data: queryData,
        url: "division.php",
        dataType: "html",   //expect html to be returned
        success: function(response){
          $("#responsecontainer").html(response);
        }
      });
    });

    $("#aggregate").click(function() {
      var queryData = new Object();
      queryData.aggregator = $("#singleAggregator").val();
      queryData.singletobeAggregated = $("#singletobeAggregated").val();
      console.log(queryData);
      $.ajax({    //create an ajax request to load_page.php
        type: "POST",
        data: queryData,
        url: "aggregate.php",
        dataType: "html",   //expect html to be returned
        success: function(response){
          $("#responsecontainer").html(response);
        }
      });
    });

    $("#aggregateNested").click(function() {
      var queryData = new Object();
      queryData.aggregator = $("#nestedAggregator").val();
      queryData.tobeAggregated = $("#nestedtobeAggregated").val();
      queryData.toAverage = $("#nestedAveraged").val();
      console.log(queryData);
      $.ajax({    //create an ajax request to load_page.php
        type: "POST",
        data: queryData,
        url: "nestedaggregate.php",
        dataType: "html",   //expect html to be returned
        success: function(response){
          $("#responsecontainer").html(response);
        }
      });
    });
    </script>
  </body>
  </html>
