
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

    $("#deleteBill").click(function() {
      var queryData = new Object();
      queryData.reservationID = $("#deletebillsID").val();
      console.log(queryData);
      $.ajax({    //create an ajax request to load_page.php
        type: "POST",
        data: queryData,
        url: "deletebills.php",
        dataType: "html",   //expect html to be returned
        success: function(response){
          $("#responsecontainer").html(response);
        }
      });
    });

    $("#showstays").click(function() {
      $.ajax({    //create an ajax request to load_page.php
        type: "GET",
        url: "allstays.php",
        dataType: "html",   //expect html to be returned
        success: function(response){
          $("#responsecontainer").html(response);
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
