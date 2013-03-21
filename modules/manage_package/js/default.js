function create_package(f){
	$.post($(f).attr('action'),$(f).serialize(),
		function(data,textStatus,jqXHR){
			if(jqXHR.status==200){
				console.log(data);
				data = JSON.parse(data);
				$('#view_packages_table .remove').remove();
				$('#view_packages_table tbody').append("
				<tr>
				<td>"+escapeHTML(f.name.value)+"</td>
				<td>"+escapeHTML(f.cost.value)+"</td>
				<td><button type=\"button\" class=\"btn\" onclick=\"delete_package_form.id.value="+data.data[0].id+"; delete_package(this);\"><i class=\"icon-trash\"></i></button></td>
				</tr>");
				f.reset();
			}
			else
				alert("Something went wrong :(");
		}
	);
	return false;
}
function delete_package(e){
	if(confirm("Are you sure you want to delete this package?")){
		f = delete_package_form;
		$.post($(f).attr('action'),$(f).serialize(),
			function(data,textStatus,jqXHR){
				if(jqXHR.status==200){
					console.log(data);
					$(e).parent().parent().fadeOut("slow");
				}
				else
					alert("Something went wrong :(");
			}
		);
	}
	return false;
}