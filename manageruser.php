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
          <li class = "active"><a href="manageruser.php">Manage Users</a></li>
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

        <div class="panel panel-default">
          <div class="panel-heading clearfix">
            <h3 class="panel-title pull-left">Find User</h3>
            <div class="btn-group pull-right">
              <button class="btn btn-primary" id = "allcustomers"><i class="fa fa-list"></i>All Customers</button>
              <button class="btn btn-info" id = "allusers"><i class="fa fa-list-alt"></i>All Users</button>
              <button class="btn btn-danger"><i class="fa fa-times"></i>Cancel</button>
              <button class="btn btn-success" id = "findcustomer"><i class="fa fa-check"></i>Find User</button>
            </div>
          </div>
          <div class="modal-body">
            <form class="form-horizontal">

              <div class="form-group">
                <label class="col-xs-3 control-label">Show in Table</label>
                <div class="col-xs-9">
                  <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" value = "creditCardNo" id = "projectCreditCard">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Show Credit Card</span>
                  </label>

                  <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" value = "guestID" id = "projectGuestID">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Show GuestID</span>
                  </label>

                  <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" value = "username" id = "projectUsername">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Show Username</span>
                  </label>

                  <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" value = "name" id = "projectName">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Show Name</span>
                  </label>
                </div>
              </div>

              <div class="form-group">
                <label class="col-xs-3 control-label">Credit Card Numner</label>
                <div class="col-xs-9">
                  <input type="text" class="form-control" placeholder="1111" id = "filterCreditCard">
                </div>
              </div>

              <div class="form-group">
                <label class="col-xs-3 control-label">GuestID</label>
                <div class="col-xs-9">
                  <input type="text" class="form-control" placeholder="1" id = "filterGuestID">
                  <!-- <select class="form-control">
                    <option>Designer</option>
                    <option selected>Developer</option>
                    <option>Salesman</option>
                  </select> -->
                </div>
              </div>

              <div class="form-group">
                <label class="col-xs-3 control-label">Username</label>
                <div class="col-xs-9">
                  <input type="text" class="form-control" placeholder="a" id ="filterUsername">
                </div>
              </div>

              <div class="form-group">
                <label class="col-xs-3 control-label">Name</label>
                <div class="col-xs-9">
                  <input type="text" class="form-control" placeholder="Jim" id = "filterName">
                </div>
              </div>

              <!-- <div class="form-group">
                <label class="col-xs-3 control-label">Show Points (Only avaiable for showing all Users)</label>
                <div class="col-xs-9">
                  <input type="text" class="form-control" placeholder="3">
                </div>
              </div> -->

            </form>
          </div>
        </div>

        <div style="background:transparent !important" class="jumbotron">
          <div id="responsecontainer" align="center" color = "grey">
          </div>
        </div>
      </div>
    </div>
    <script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootcards/1.0.0/js/bootcards.min.js"></script>
    <script type="text/javascript">
    $("#allcustomers").click(function() {

      $.ajax({    //create an ajax request to load_page.php
        type: "GET",
        url: "allcustomers.php",
        dataType: "html",   //expect html to be returned
        success: function(response){
          $("#responsecontainer").html(response);
          //alert(response);
        }

      });
    });

    $("#allusers").click(function() {

      $.ajax({    //create an ajax request to load_page.php
        type: "GET",
        url: "allusers.php",
        dataType: "html",   //expect html to be returned
        success: function(response){
          $("#responsecontainer").html(response);
          //alert(response);
        }

      });
    });

    $("#findcustomer").click(function() {
      var queryData = new Object();
      if (document.getElementById("projectCreditCard").checked)
        queryData.projectCreditCard = "creditCardNo";
      if (document.getElementById("projectGuestID").checked)
        queryData.projectGuestID = "guestID";
      if (document.getElementById("projectUsername").checked)
        queryData.projectUsername = "username"
      if (document.getElementById("projectName").checked)
        queryData.projectName = "name";
      if ($("#filterCreditCard").val() != "")
          queryData.filterCreditCard = $("#filterCreditCard").val();
      if ($("#filterGuestID").val() != "")
          queryData.filterGuestID = $("#filterGuestID").val();
      if ($("#filterUsername").val() != "")
          queryData.filterUsername = $("#filterUsername").val();
      if ($("#filterName").val() != "")
          queryData.filterName = $("#filterName").val() ;
        console.log(queryData);

        $.ajax({    //create an ajax request to load_page.php
          type: "POST",
          data: queryData,
          url: "fincustomer.php",
          dataType: "html",   //expect html to be returned
          success: function(response){
            $("#responsecontainer").html(response);
          }
        });
    });
    </script>
  </body>
  </html>
