$('.module').fadeOut();
$('#contact_div').fadeIn();
$('body').prepend('<div id="map"></div>');
$.ajax({
	url: 'http://freegeoip.net/json/112.207.7.34',
	success: function(data){
		$('#map').css({'height' : $(window).height()+'px', 'width' : $(window).width()+'px'});
		var directionsDisplay;
		var directionsService = new google.maps.DirectionsService();
		var map;

		directionsDisplay = new google.maps.DirectionsRenderer();
		var mapOptions = {
			zoom:7,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			center: new google.maps.LatLng(data['latitude'],data['longitude'])
		}
		map = new google.maps.Map(document.getElementById("map"), mapOptions);
		directionsDisplay.setMap(map);

		var request = {
			origin:new google.maps.LatLng(data['latitude'],data['longitude']),
			destination: new google.maps.LatLng(14.169819,121.241877),
			travelMode: google.maps.TravelMode.DRIVING
		};
		directionsService.route(request, function(result, status) {
			if (status == google.maps.DirectionsStatus.OK) {
				directionsDisplay.setDirections(result);
			}
		});


		setTimeout(function (){
			map.panTo(new google.maps.LatLng(data['latitude'],data['longitude']));
		},3000);
		setTimeout(function (){
			map.panTo(new google.maps.LatLng(14.169819,121.241877));
		},6000);
	}
});