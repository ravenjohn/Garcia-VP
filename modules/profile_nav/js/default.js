function logout(){
	$.post("ajax/?logout",{},
		function (data){
			loadModules('home');
			$(e.currentTarget).parent().remove();
		}
	);
	return false;
}