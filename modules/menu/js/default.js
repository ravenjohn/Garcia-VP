$('.menu_link').click(function (e){
	a = e.currentTarget.hash;
	loadModules(a.substr(1,a.length));
	return false;
});