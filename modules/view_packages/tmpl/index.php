<?php if(!isset($packages)) $packages = API::execute("raven/get_packages",array());?>
<div id="view_packages_div" class="module">
	<h3>Packages</h3>
	<table class="table table-striped table-hover" id="view_packages_table">
		<?php if(empty($packages['items'])){ ?>
		<tr class="remove">
			<th colspan="3">No packages to display . . .  :( </th>
		</tr>
		<?php }else{?>
			<?php foreach($packages['data'] as $p){?>
			<tr>
				<td><?php echo $p['name']; ?></td>
				<td><?php echo $p['cost']; ?></td>
				<td>
					<button title="Select" type="button" class="btn btn-success" onclick="$('#packageName_temp').val('<?php echo $p['name']?>');$('#packageName_temp2').val('<?php echo $p['id']?>');"><i class="icon-reply"></i> SELECT</button>
				</td>
			</tr>
			<?php }?>
		<?php	}?>
	</table>
</div>