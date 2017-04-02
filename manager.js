$("#finduser").click(function() {
  var inputusername = $('#username').val();
  $.ajax({    //create an ajax request to load_page.php
    type: "POST",
    data: 'username2='+inputusername,
    // data: {username:inputusername},
    url: "finder.php",
    dataType: "html",   //expect html to be returned
    success: function(response){
      $("#responsecontainer").html(response);
      //alert(response);
    }

  });
});

$("#btnQuerySubmit").click(function() {

  $.ajax({    //create an ajax request to load_page.php
    type: "GET",
    url: "user.php",
    dataType: "html",   //expect html to be returned
    success: function(response){
      $("#responsecontainer").html(response);
      //alert(response);
    }

  });
});

$("#btnQueryJoin").click(function() {

  $.ajax({    //create an ajax request to load_page.php
    type: "GET",
    url: "userjoin.php",
    dataType: "html",   //expect html to be returned
    success: function(response){
      $("#responsecontainer").html(response);
      //alert(response);
    }

  });
});

$("#btnQueryDivision").click(function() {

  $.ajax({    //create an ajax request to load_page.php
    type: "GET",
    url: "userdivision.php",
    dataType: "html",   //expect html to be returned
    success: function(response){
      $("#responsecontainer").html(response);
      //alert(response);
    }

  });
});

$("#btnQueryAgg").click(function() {

  $.ajax({    //create an ajax request to load_page.php
    type: "GET",
    url: "aggregationcount.php",
    dataType: "html",   //expect html to be returned
    success: function(response){
      $("#responsecontainer").html(response);
      //alert(response);
    }

  });
});

$("#btnQueryAvg").click(function() {

  $.ajax({    //create an ajax request to load_page.php
    type: "GET",
    url: "aggregationavg.php",
    dataType: "html",   //expect html to be returned
    success: function(response){
      $("#responsecontainer").html(response);
      //alert(response);
    }

  });
});

$("#btnQuerySum").click(function() {

  $.ajax({    //create an ajax request to load_page.php
    type: "GET",
    url: "aggregationsum.php",
    dataType: "html",   //expect html to be returned
    success: function(response){
      $("#responsecontainer").html(response);
      //alert(response);
    }

  });
});

$("#btnQueryMax").click(function() {

  $.ajax({    //create an ajax request to load_page.php
    type: "GET",
    url: "aggregationmax.php",
    dataType: "html",   //expect html to be returned
    success: function(response){
      $("#responsecontainer").html(response);
      //alert(response);
    }

  });
});

$("#btnQueryMin").click(function() {

  $.ajax({    //create an ajax request to load_page.php
    type: "GET",
    url: "aggregationmin.php",
    dataType: "html",   //expect html to be returned
    success: function(response){
      $("#responsecontainer").html(response);
      //alert(response);
    }

  });
});


$("#btnAverage1").click(function() {

  $.ajax({    //create an ajax request to load_page.php
    type: "GET",
    url: "averageone.php",
    dataType: "html",   //expect html to be returned
    success: function(response){
      $("#responsecontainer").html(response);
      //alert(response);
    }

  });
});

$("#btnAverage2").click(function() {

  $.ajax({    //create an ajax request to load_page.php
    type: "GET",
    url: "averagetwo.php",
    dataType: "html",   //expect html to be returned
    success: function(response){
      $("#responsecontainer").html(response);
      //alert(response);
    }

  });
});

$("#btnAverage3").click(function() {

  $.ajax({    //create an ajax request to load_page.php
    type: "GET",
    url: "averagethree.php",
    dataType: "html",   //expect html to be returned
    success: function(response){
      $("#responsecontainer").html(response);
      //alert(response);
    }

  });
});

$("#btnMax1").click(function() {

  $.ajax({    //create an ajax request to load_page.php
    type: "GET",
    url: "maxone.php",
    dataType: "html",   //expect html to be returned
    success: function(response){
      $("#responsecontainer").html(response);
      //alert(response);
    }

  });
});

$("#btnMax2").click(function() {

  $.ajax({    //create an ajax request to load_page.php
    type: "GET",
    url: "maxtwo.php",
    dataType: "html",   //expect html to be returned
    success: function(response){
      $("#responsecontainer").html(response);
      //alert(response);
    }

  });
});

$("#btnMax3").click(function() {

  $.ajax({    //create an ajax request to load_page.php
    type: "GET",
    url: "maxthree.php",
    dataType: "html",   //expect html to be returned
    success: function(response){
      $("#responsecontainer").html(response);
      //alert(response);
    }

  });
});

$("#btnMin1").click(function() {

  $.ajax({    //create an ajax request to load_page.php
    type: "GET",
    url: "minone.php",
    dataType: "html",   //expect html to be returned
    success: function(response){
      $("#responsecontainer").html(response);
      //alert(response);
    }

  });
});

$("#btnMin2").click(function() {

  $.ajax({    //create an ajax request to load_page.php
    type: "GET",
    url: "mintwo.php",
    dataType: "html",   //expect html to be returned
    success: function(response){
      $("#responsecontainer").html(response);
      //alert(response);
    }

  });
});

$("#btnMin3").click(function() {

  $.ajax({    //create an ajax request to load_page.php
    type: "GET",
    url: "minthree.php",
    dataType: "html",   //expect html to be returned
    success: function(response){
      $("#responsecontainer").html(response);
      //alert(response);
    }

  });
});
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
});
