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
