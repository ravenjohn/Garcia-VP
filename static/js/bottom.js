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
function escapeHTML(a) {
  return a
      .replace(/&/g, "&amp;")
      .replace(/</g, "&lt;")
      .replace(/>/g, "&gt;")
      .replace(/"/g, "&quot;")
      .replace(/'/g, "&#039;");
}
function loadMenu(){
	$.post("?get=menu",{},
		function (data){
			$('#app_div').before(data);
		}
	);
}
z = window.location.hash;
y = z.substring(1,8);
if(z=="" || !(
	z=="#debut" ||
	z=="#packages" ||
	z=="#feedbacks" ||
	z=="#contact"
)){
	window.location.hash = 'home';
}
if(y=="gallery")
	window.location.hash = 'gallery';
loadMenu();
loadModules();