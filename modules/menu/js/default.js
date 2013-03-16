$('.main_menu_link').click(
	function (e){
		a = e.currentTarget.hash;
		a = a.substr(1,a.length);
		$('#map').fadeOut('slow').remove();
		$('#menu_div').css({'position':'static'});
		if(a=='logout') return false;
		loadModules(a);
		return false;
	}
);