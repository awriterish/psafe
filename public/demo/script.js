function getData(did){
	$.ajax({
		url:"getData.php?did=" + did,
		success:function(data){
			$("#returnContent").html(data);
		}
	});
}