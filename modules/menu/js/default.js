$('.main_menu_link').click(
	function (e){
		a = e.currentTarget.hash;
		a = a.substr(1,a.length);
		$('#map').fadeOut('slow');
		if(a=='logout') return false;
		loadModules(a);
		return false;
	}
);
function rebindLogout(){
	$('#logoutButton').click(function (e){
		$.post('ajax/?logout',{},
			function (data,textStatus,jqXHR){
				loadModules('home');
				$(e.currentTarget).parent().remove();
			}
		);
		return false;
	});
}
rebindLogout();