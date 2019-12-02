var edited = 0;
var added = 0;
var unmodified = 0;

function sendData(classes, i){
  var URL = "/Course Data/loadClass.php?Class_ID=" + classes[i]["CourseId"] + "&Name=" + classes[i]["Title"] + "&Teachers=" + JSON.stringify(classes[i]["Instructors"][0]) + "&Domains=" + JSON.stringify(classes[i]["CollegiateCodes"]) + "&CourseCode=" + classes[i]["CourseCode"];
  $.ajax({
    url:URL,
    success: function(data){
      console.log(data);
      data = data.split(",");
      for(var j = 0; j<data.length; j++){
        if(data[j]==0){
          added++;
        } else if(data[j]==1){
          edited++;
        } else if(data[j]==2){
          unmodified++;
        }
      }
      if(i<classes.length-1){
        sendData(classes,i+1);
      }
    }
  });
  console.log(i);
  $("#added").text(added);
  $("#modify").text(edited);
  $("#unedit").text(unmodified);
  $("#completed").text(i+1);
};

function loadData(){
  eddited = 0;
  added = 0;
  unmodified = 0;
  $("#loader").attr("disabled", true);
  console.log("Loading data");
  $.ajax({
		url:"/Course Data/exampleData.json",
		dataType:"json",
		success: function(data){
			console.log(data);
      var classes = data["value"];
      $("#total").text(classes.length);
      sendData(classes, 0);
		}
	});
  console.log("Data loaded");
  $("#loader").removeAttr("disabled");
}
