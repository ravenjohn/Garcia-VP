function fadeOutMods(mods, a){
	$.post("?get="+a,{},
		function (data){
			$(mods).remove();
			$('#app_div').append(data);
		}
	);
}
function loadModules(a){
	b = window.location.hash;
	if(a==undefined)
		a = b.substr(1,b.length);
	else
		window.location.hash = a;
	$('.active_menu').removeClass('active_menu');
	$('#'+a+'_menu').addClass('active_menu');
	fadeOutMods($('.module'),a);
}
if(window.location.hash=="" || !(
	window.location.hash=="#home" ||
	window.location.hash=="#debut" ||
	window.location.hash=="#packages" ||
	window.location.hash=="#feedbacks" ||
	window.location.hash=="#contact"
)){
	window.location.hash = 'gallery';
}
function loadMenu(){
	$.post("?get=menu",{},
		function (data){
			$('#app_div').before(data);
		}
	);
}
loadMenu();
loadModules();