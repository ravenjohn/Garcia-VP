function logout(){
	$.post('ajax/?logout',{},
		function (data,textStatus,jqXHR){
			console.log(data);
			loadModules();
		}
	);
	return false;
}