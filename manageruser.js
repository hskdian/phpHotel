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
