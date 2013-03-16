<section id="gallery_div" class="span9 module">
	<ul id='gallery_menu'>
		<?php foreach(glob("static/img/gallery/*") as $file){
			$a = explode("/",$file);
			$a = end($a);?>
			<li><a class="sub_menu_link" id="gallery_<?php echo strtolower($a); ?>_menu" href="#gallery-<?php echo strtolower($a); ?>"><?php echo strtoupper($a); ?></a></li>
		<?php }?>
	</ul>
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