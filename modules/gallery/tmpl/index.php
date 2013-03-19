<section id="gallery_div" class="module">
	<div id="gallery_menus">
	<?php foreach(glob("static/img/gallery/*") as $file){
		$a = explode("/",$file);
		$a = end($a);?>
		<a class="btn sub_menu_link" id="gallery_<?php echo strtolower($a); ?>_menu" href="#gallery-<?php echo strtolower($a); ?>"><?php echo ucfirst($a); ?></a>
	<?php } ;?>
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