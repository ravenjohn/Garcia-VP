function create_package(f){
	$.post($(f).attr('action'),$(f).serialize(),
		function(data,textStatus,jqXHR){
			if(jqXHR.status==200){
				data = JSON.parse(data);
				$('.view_packages_table .remove').remove();
				$('.view_packages_table').append("	\
				<tr>	\
				<td>"+f.category.value+"</td>	\
				<td>"+f.name.value+"</td>	\
				<td>"+f.cost.value+"</td>	\
				<td><button type='submit' class='btn btn-danger' onclick=\"delete_package_form.id.value="+data.data[0].id+";\"><i class='icon-trash'></i></button></td>	\
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
	f = delete_package_form;
	$.post($(f).attr('action'),$(f).serialize(),
		function(data,textStatus,jqXHR){
			if(jqXHR.status==200){
				data = JSON.parse(data);
				if(data.data[0].statusCode == '1')
					$(e).parent().parent().fadeOut("slow");
				alert(data.message);
			}
			else
				alert("Something went wrong :(");
		}
	);
	return false;
}