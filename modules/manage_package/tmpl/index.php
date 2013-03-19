<?php $packages = API::execute("karla/read_packages",array());?>
<div id="manage_package_div" class="row module">
	<div class="span3">
		<h3>Create Package</h3>
		<form method="POST" action="<?php echo RConfig::ajax_url?>create_package" onsubmit="return create_package(this);" class="form">
			<div class="input-prepend">
				<span class="add-on"><i class="icon-briefcase"></i></span>
				<input type="text" name="name" max="64" placeholder="Package Name"/>
			</div>
			<div class="input-prepend">
				<span class="add-on">P</span>
				<input type="text" name="cost" max="16" placeholder="Cost"/>
			</div>
			<input type="submit" value="Create Package" class="btn btn-primary btn-large"/>
		</form>
	</div>
	<div class="span6">
		<form action="<?php echo RConfig::ajax_url?>delete_package" class="form" name="delete_package_form" method="POST">
			<table class="table table-striped" class="view_packages_table" id="view_packages_table">
				<tr>
					<th>Package Name</th>
					<th>Cost</th>
					<th>Action</th>
				</tr>
				<?php if(empty($packages['items'])){ ?>
				<tr class="remove">
					<th colspan="3">No packages to display . . .  :( </th>
				</tr>
				<?php }else{?>
					<input type="hidden" name="id"/>
					<?php foreach($packages['data'] as $p){?>
					<tr>
						<td><?php echo $p['name']; ?></td>
						<td><?php echo $p['cost']; ?></td>
						<td><button type="button" class="btn" onclick="delete_package_form.id.value=<?php echo $p['id']?>; delete_package(this);"><i class="icon-trash"></i> </button></td>
					</tr>
					<?php }?>
				<?php	}?>
			</table>
		</form>
	</div>
</div>