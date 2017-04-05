$("#allreservations").click(function() {
  $.ajax({    //create an ajax request to load_page.php
    type: "GET",
    url: "allreservations.php",
    dataType: "html",   //expect html to be returned
    success: function(response){
      $("#responsecontainer").html(response);
      //alert(response);
    }
  });
});

$("#joinReservation").click(function() {
  var queryData = new Object();
  if (document.getElementById("includeBill").checked)
  queryData.bill = "confirmationNo";
  if (document.getElementById("includeRoom").checked)
  queryData.room = "roomNo"
  if (document.getElementById("includeCustomer").checked)
  queryData.customer = "creditCardNo";
  console.log(queryData);
  $.ajax({    //create an ajax request to load_page.php
    type: "POST",
    data: queryData,
    url: "joinReservation.php",
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
