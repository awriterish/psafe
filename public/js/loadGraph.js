function loadDomain(domainID){
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
