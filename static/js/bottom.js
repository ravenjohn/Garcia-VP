function fadeOutMods(mods, i, a){
	if(i == mods.length){
		$.post("?get="+a,{},
			function (data){
				$('#app_div').append(data);
				fadeInMods($(".mod"),0);
			}
		);
		return;
	}
	$(mods[i]).fadeOut("fast", function(){
		$(mods[i]).remove();
		fadeOutMods(mods, i+1, a);
	});
}
function fadeInMods(mods, i){
	if(i == mods.length) return;
	$(mods[i]).fadeIn("fast", function(){
		fadeInMods(mods, i+1);
	});
}
function loadModules(a){
	b = window.location.hash;
	if(a==undefined)
		a = b.substr(1,b.length);
	else
		window.location.hash = a;
	fadeOutMods($('.module'),0,a);
}
if(window.location.hash==""){
	window.location.hash = 'home';
}
loadModules();