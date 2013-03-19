<?php
	 defined('AUTH') or die;
	/*
	 *	don't forget to wrap your module with <div id="module_name_div"></div>
	 *	and delete this comment :)
	 */
?>

<div id="admin_gallery_div" class="module well">
	<table id='gallery_table'>
	<tr>
		<form method='POST' action="<?php echo RConfig::ajax_url?>addGallery" <!--onsubmit="return addGallery(this);" class='form'-->
		<td>New Gallery</td>
		<td><input name='addGallery' type='text' pattern='[A-Z]?[a-z]*' required='required'/></td>
		<td><button type='submit'>Add</button></td>
		</form>
	</tr>
	<?php foreach(glob("static/img/gallery/*") as $file){
		$a = explode("/",$file);
		$a = end($a);?>
		<tr>
			<td><?php echo ucfirst($a);?></td>
			<form method='POST' action="<?php echo RConfig::ajax_url?>renameGallery&&renameGallery=<?php echo $a?>" class='form'> <!--onsubmit="return renameGallery(this);"-->
			<td><input name='renameGallery' type='text' pattern='[A-Z]?[a-z]*' required='required'/></td>
			<td><button type='submit'>Rename</button></td>
			</form>
			<td><a href="<?php echo RConfig::ajax_url;?>deleteGallery&&deleteGallery=<?php echo $a;?>">Delete Gallery</a></td>
		</tr>
	<?php } ;?>
	</table>
</div>