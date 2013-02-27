/*
 * This is where you will put your functions
 * needed by your module. Make sure your
 * function name is unique. NEVER use single
 * line comment or it won't work. this: //
 * Block comments will be automatically deleted
 */

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