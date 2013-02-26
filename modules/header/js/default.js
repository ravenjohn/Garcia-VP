$(".menu").click(function(e){
	$(".menu").removeClass("activeMenu");	
	$(e.toElement).addClass("activeMenu");
});
$("#loginPopUp").click(function(e){
	$("#login_div").show();
});