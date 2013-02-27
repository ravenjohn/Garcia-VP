function validateLogin(f){
	for(var i=0; i<f.elements.length; i++){
		var e = f.elements[i];
		if(e.type!='submit' && e.value==""){
			e.focus();
			alert("Please input username and password before logging in");
			return false;
		}
	}
	$.post( $(f).attr('action'), $(f).serialize(),
		function(data, textStatus, jqXHR) {
			if(jqXHR.status==200){
				console.log(data);
				if(data=="0")
					alert("Incorrect username or password");
				else
					fadeMods($('.logout_module'),0,$('.user_module'));
			}
			else
				alert("Something went wrong :(");
		}
	);
	return false;
}
function sign_up(f){
	$.post( $(f).attr('action'), $(f).serialize(),
		function(data, textStatus, jqXHR) {
			if(jqXHR.status==200){
				console.log(data);
				console.log("successfully signed up!");
			}else{
				alert("Something went wrong :(");
			}
		}
	);
	return false;
}
$('.tooltipped').tooltip();
$('.text-tooltip').tooltip();
$('.text-tooltip').focus(function(){
	$(this).tooltip('show');
});
