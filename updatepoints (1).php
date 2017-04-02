<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>BookingPals</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="app.css">
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
          <li class = "active"><a href="manager.php">Manager View</a></li>
          <li><a href="#">Cancelling (Under Construction)</a></li>
          <li><a href="#">Extending (Under Construction)</a></li>

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

        <div class="jumbotron">
          <label for="username">Username:</label>
            <input type="string" class="form-control" id="username" placeholder="e.g. a">
        </div>

        <button type = "submit" class="btn btn-primary" id = "btnQuerySubmit">Submit</button>
        <button type = "submit" class="btn btn-primary" id = "btnQueryUpdate1">Update1</button>
        <button type = "submit" class="btn btn-primary" id = "btnQueryUpdate2">Update2</button>
        <button type = "submit" class="btn btn-primary" id = "btnQueryUpdate3">Update3</button>
        <button type = "submit" class="btn btn-primary" id = "btnQueryResUse">ReservationUsersUpdate</button>


        <div class="content">
<div id="responsecontainer" align="center">
        </div>
      </div>
    </div>
  </div>
  <script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function() {

  $("#btnQueryUpdate1").click(function() {

    $.ajax({    //create an ajax request to load_page.php
      type: "GET",
      url: "userupdatepoints1.php",
      dataType: "html",   //expect html to be returned
      success: function(response){
          $("#responsecontainer").html(response);
          //alert(response);
      }
  });
   $("#btnQueryUpdate2").click(function() {

      $.ajax({    //create an ajax request to load_page.php
        type: "GET",
        url: "userupdatepoints2.php",
        dataType: "html",   //expect html to be returned
        success: function(response){
            $("#responsecontainer").html(response);
            //alert(response);
        }
    });
   $("#btnQueryUpdate3").click(function() {

        $.ajax({    //create an ajax request to load_page.php
          type: "GET",
          url: "userupdatepoints3.php",
          dataType: "html",   //expect html to be returned
          success: function(response){
              $("#responsecontainer").html(response);
              //alert(response);
          }
      });
         $("#btnQueryResUse").click(function() {

              $.ajax({    //create an ajax request to load_page.php
                type: "GET",
                url: "updatepointstable.php",
                dataType: "html",   //expect html to be returned
                success: function(response){
                    $("#responsecontainer").html(response);
                    //alert(response);
                }
            });
});
});
  </script>
</body>
</html>
