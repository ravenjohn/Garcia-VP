
<?php
	$packages = API::execute("karla/read_packages",array());
?>
<div id="delete_package_div">
	<table class="table table-bordered" id="view_packages_table">
		<?php
		if(empty($packages['items'])){ ?>
			<tr class="remove">
				<th colspan="3">No packages to display . . .  :( </th>
			</tr>
		<?php
		}else{
			foreach($packages['data'] as $p){?>
			<tr>
				<td><?php echo $p['name']; ?></td>
				<td><?php echo $p['cost']; ?></td>
				<td><a href="<?php echo RConfig::ajax_url?>delete_package&id=<?php echo $p['name']; ?>" onclick="return delete_package(this);" > X </a></td>
                </tr>
		<?php }
		}?>
	</table>
</div>