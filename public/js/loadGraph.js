function loadDomain(domainID){
  $("#graph").html('<br><span class="spinner-grow spinner-grow-md text-primary"></span> <h3 style="display: inline-block;">Loading...</h3>');
  $.ajax({
    url:"/graph/" + domainID,
    success:function(data){
      $("#graph").html(data);
    },
    error:function(xhr, status){
      $("#graph").html("<kbd>"+xhr+"</kbd><h4>"+status+"</h4>");
    }
  });
};
