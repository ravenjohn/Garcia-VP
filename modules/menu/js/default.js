$('.main_menu_link').click(
	function (e){
		a = e.currentTarget.hash;
		a = a.substr(1,a.length);
		$('#map').fadeOut('slow').remove();
		if(a=='logout') return false;
		loadModules(a);
		return false;
	}
);

function alertModal(modalHeader,modalBody){
	$('#modalBody').html();
	$('#modalHeader').html();
	$('#modalHeader').html(modalHeader);
	$('#modalBody').html(modalBody);
	$('#alertModal').modal('show');
}