function delete_package(a){
	$.post($(a).attr('href'), {name : $(a).id},
		function (data, textStatus, jqXHR){
			if(jqXHR.status==200){
				$(a).parent().parent().fadeOut('slow');
			}else{
				console.log(jqXHR);
				alert('Something went wrong :(');
			}
		}
	);
	return false;
}