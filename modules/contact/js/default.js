$('.module').fadeOut();
$('#menu_div').before('<div id="map"></div>');
$('#menu_div').css({'position':'absolute'});
$('#contact_div').fadeIn();
$.ajax({
	url: 'http://freegeoip.net/json/112.207.7.34',
	success: function(data){
		$('#map').css({'height' : $(window).height()+'px', 'width' : $(window).width()+'px'});
		map = new google.maps.Map(document.getElementById('map'), {
			zoom: 15,
			center: new google.maps.LatLng(14.169819,121.241877),
			mapTypeId: google.maps.MapTypeId.ROADMAP
		});
		new google.maps.Marker({
			position: new google.maps.LatLng(14.169819,121.241877),
			map: map,
			icon: 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png',
			title : 'We are located here'
		});
	}
});