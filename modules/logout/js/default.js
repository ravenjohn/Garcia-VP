function logout(f){
	$.post($(f).attr('action'),{},
		function(data,textStatus,jqXHR){
			fadeMods($('.admin_module, .user_module'),0,$('.module, .logout_module'));
		}
	);
	return false;
}