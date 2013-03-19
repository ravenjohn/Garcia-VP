$('#contact_div').fadeIn("fast");
$('#menu_div').before('<div id="map"></div>');
$.ajax({
	url: 'http://freegeoip.net/json/112.207.7.34',
	success: function(data){
		map = new google.maps.Map(document.getElementById('map'), {
			zoom: 15,
			center: new google.maps.LatLng(14.169819,121.241877),
			mapTypeId: google.maps.MapTypeId.ROADMAP
		});
		new google.maps.Marker({
			position: new google.maps.LatLng(14.169819,121.241877),
			map: map,
			icon: 'http://maps.google.com/mapfiles/ms/icons/green-dot.png',
			title : 'We are located here'
		});
		$('#map').css({'height' : (screen.height-92)+'px', 'width' : screen.width+'px'});
	}
});