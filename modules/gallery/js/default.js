function fixGallery(id){
	var $container = $(id);
	$container.imagesLoaded( function(){
		$container.masonry({
			itemSelector : '.gallery_image',
			columnWidth : 290
		});
	});
}
function slowInvi(a,i){
	$(a[i]).animate({opacity : 1}, 150, function(e){
		slowInvi(a,i+1);
	});
}
function loadGallery(a){
	a = a.split("-").pop();
	b = '#'+a+'_gallery';
	$('#gal_bg').fadeOut("slow", function(){
		$('#gal_bg').css({'background-image' : 'url(static/img/gallery/'+a+'/bg.jpg)'});
		$('#gal_bg').fadeIn("slow");
	});
	$('.active_gallery_menu').removeClass('active_gallery_menu');
	$('#gallery_'+a+'_menu').addClass('active_gallery_menu');
	$('.gallery_image').css({opacity : 0});
	$('.active_gallery').hide();
	$(b).addClass('active_gallery');
	$(b).show();
	fixGallery(b);	
	slowInvi($('.'+a+'_image'),0);	
}

$('.sub_menu_link').click(
	function (e){
		a = e.currentTarget.hash;
		window.location.hash = a;
		loadGallery(a);
		return false;
	}
);


arguments = window.imgs;
for(var i = 0; arguments!=undefined && i<arguments.length; i++){
	b = arguments[i].split('/')[3];
	rand = Math.floor((Math.random()*3)+1);;
	if(b != undefined && b.indexOf('.') < 0){
		if(arguments[i].split('/')[4] == 'bg.jpg' || arguments[i].split('/')[4] == 'bg.png') continue;	
		a = "<div class='"+b+"_image gallery_image rotate-"+rand+"'><a class='image_link'><img src='"+arguments[i]+"' alt='gallery picture'/></a></div>";
		$("#"+b+"_gallery").prepend(a);
	}else{
		$("<img />").attr("src", arguments[i]);
	}
}

if(window.location.hash == '#gallery')
	window.location.hash = 'gallery-wedding';
loadGallery(window.location.hash);

$('.image_link').click(function (){
	$(this).css({'z-index':'0'});
	a = "<img src='"+$(this.innerHTML)[0].src+"'/>";
	$('#gal_inner_overlay').html(a);
	b = ($(window).height() - $(a)[0].naturalHeight)/2;
	c = $(a)[0].naturalWidth;
	$('#gal_overlay').css({'padding-top': b+'px' });
	$('#gal_inner_overlay').css({'width': c+'px' });
	$('#gal_overlay, #gal_inner_overlay').fadeIn();
});

$('#gal_overlay, #gal_inner_overlay').click(function(){
	$(this).fadeOut();
});