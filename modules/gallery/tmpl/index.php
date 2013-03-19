<section id="gallery_div" class="module">
	<div id="gallery_menus">
	<?php if(isset($_SESSION['role']) && $_SESSION['role']=='admin'){?>
		<a class="btn btn-info" href="#gallery-wedding" onclick="return showAddGalleryModal();"><i class='icon-plus'></i> Add Gallery</a>
	<?php }
	foreach(glob("static/img/gallery/*") as $file){
		$a = explode("/",$file);
		$a = end($a);?>
		<a class="btn sub_menu_link" id="gallery_<?php echo strtolower($a); ?>_menu" href="#gallery-<?php echo strtolower($a); ?>"><?php echo ucfirst($a); ?></a>
	<?php }?>
	</div>
	<br />
	<br />
	<?php foreach(glob("static/img/gallery/*") as $file){
		$a = explode("/",$file);
		$a = end($a);?>
		<div id="<?php echo strtolower($a); ?>_gallery" class="gallery"></div>
	<?php }?>
	<div id="gal_bg"></div>
	<div id="gal_overlay"><div id="gal_inner_overlay"></div></div>
</section>
<?php if(isset($_SESSION['role']) && $_SESSION['role']=='admin'){?>
<div id="addGalleryDiv" class="none">
	<form class="form" action="<?php echo RConfig::ajax_url?>add_gallery" onsubmit="return addGallery(this);" method="POST" id="addGalleryForm">
		<div class="input-prepend">
			<span class="add-on"><i class="icon-th"></i></span>
			<input type="text" name="galleryName" required="required" placeholder="Gallery Name"/>
		</div>
		<br />
		<button type="submit" class="btn btn-primary btn-large" data-loading-text="Creating..." data-default-text="CREATE!" id="addGalleryButton">CREATE!</button>
	</form>
</div>
<?php }?>