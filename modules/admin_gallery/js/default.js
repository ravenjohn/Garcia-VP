/*
 * This is where you will put your functions
 * needed by your module. Make sure your
 * function name is unique. NEVER use single
 * line comment or it won't work.
 * Block comments will be automatically deleted
 */
 function addGallery(f){
	$.post($(f).attr('action'),$(f).serialize(),
		function(data,textStatus,jqXHR){
			if(jqXHR.status==200){
				if(data=="0"){
					alert("Gallery already exists");
				}else{
					alert("Gallery successfully created");
					f.reset();
				}
			}
			else
				alert("Something went wrong :(");
		}
	);
	return false;
 } 	
  function renameGallery(f){
	$.post($(f).attr('action'),$(f).serialize(),
		function(data,textStatus,jqXHR){
			if(jqXHR.status==200){
				if(data=="0"){
					alert("Gallery already exists, cannot rename");
				}else{
					alert("Gallery successfully renamed");
					f.reset();
				}
			}
			else
				alert("Something went wrong :(");
		}
	);
	return false;
 } 	