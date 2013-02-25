/*
 * This is where you will put your functions
 * needed by your module. Make sure your
 * function name is unique. NEVER use single
 * line comment or it won't work. this: //
 * Block comments will be automatically deleted
 */
 
function create_package(f){
	var f = f;
	$.post($(f).attr('action'), $(f).serialize(),
		function (data, textStatus, jqXHR){
			if(jqXHR.status==200){
				data = JSON.parse(data);
				console.log(data);
				alert(data.message);
			}else{
				console.log(jqXHR);
				alert('Something went wrong :(');
			}
		}
	);
	return false;
}