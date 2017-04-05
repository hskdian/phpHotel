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
