function loadData(){
  $("#loader").attr("disabled", true);
  console.log("Loading data");
  $.ajax({
		url:"/Course Data/exampleData.json",
		dataType:"json",
		success: function(data){
			console.log(data);
      var classes = data["value"];
      for(var i = 0; i<classes.length; i++){
        var URL = "/Course Data/loadClass.php?Class_ID=" + classes[i]["CourseId"] + "&Name=" + classes[i]["Title"] + "&Teachers=" + JSON.stringify(classes[i]["Instructors"]) + "&Domains=" + JSON.stringify(classes[i]["CollegiateCodes"]) + "&CourseCode=" + classes[i]["CourseCode"];
        $.ajax({
          url:URL,
          success: function(data){
            console.log(data);
          }
        });
        $("#completed").text(i+1);
      }
      $("#total").text(classes.length);
		}
	});
  console.log("Data loaded");
  $("#loader").removeAttr("disabled");
}
