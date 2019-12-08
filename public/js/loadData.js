function loadData(){
  eddited = 0;
  added = 0;
  unmodified = 0;
  $("#loader").attr("disabled", true);
  console.log("Loading data");
  $("#output").html('<br><span class="spinner-grow spinner-grow-md text-primary"></span> <h3 style="display: inline-block;">Loading... (this may take a while)</h3>');
  $.ajax({
		url:"/loadData",
		success: function(data){
			console.log(data);
      $("#output").text(data);
      $("#loader").removeAttr("disabled");
		},
    error: function(xhr, error){
      console.log(xhr);
      $("#output").html("Request failed with " + xhr["status"] + " code.<br>Error: "+ xhr["statusText"]);
      $("#loader").removeAttr("disabled");
    }
	});
  console.log("Data loaded");
}
