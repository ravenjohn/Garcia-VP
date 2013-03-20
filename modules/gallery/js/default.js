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
	$('.sub_menu_link.btn-primary').removeClass('btn-primary');
	$('#gallery_'+a+'_menu').addClass('btn-primary');
	$('.gallery_image').css({opacity : 0});
	$('.active_gallery').hide();
	$(b).addClass('active_gallery');
	$(b).show();
	fixGallery(b);	
	slowInvi($('.'+a+'_image'),0);	
}
function showAddGalleryModal(){
	alertModal("Add Gallery",$('#addGalleryDiv').html());
	return false;
}

function addGallery(f){
	$('#addGalleryButton').button('loading');
	$.post($(f).attr('action'),$(f).serialize(),
		function(data,textStatus,jqXHR){
			if(jqXHR.status==200){
				console.log(data);
				$('#gallery_menus').append('<a class="btn sub_menu_link" id="gallery_'+f.galleryName.value.toLowerCase()+'_menu" href="#gallery-'+f.galleryName.value.toLowerCase()+'">'+f.galleryName.value.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();})+'</a>');
				$('#addGalleryButton').button('default');
			}
			else
				alert("Something went wrong :(");
		}
	);
	return false;
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
		a = "<div class='"+b+"_image gallery_image rotate-"+rand+"'><a class='image_link'><img src='"+arguments[i]+"' alt='gallery picture' class='img-polaroid'/></a></div>";
		$("#"+b+"_gallery").prepend(a);
	}
}
if(window.location.hash == '#gallery')
	window.location.hash = 'gallery-wedding';
loadGallery(window.location.hash);
$('.image_link').click(function (){
	$(this).css({'z-index':'0'});
	a = "<img src='"+$(this.innerHTML)[0].src+"' class='img-polaroid'/>";
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