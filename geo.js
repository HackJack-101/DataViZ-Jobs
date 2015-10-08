window.map = null;
window.infoWindow = null;
window.geocoder = null;
window.geomarkers = null;

window.addEventListener('load', function () {
	var centerpos = new google.maps.LatLng(48.856578, 2.351828);
	var optionsGmaps = {
		center: centerpos,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		zoom: 12
	};
	window.map = new google.maps.Map(document.getElementById("map"), optionsGmaps);
	window.geocoder = new google.maps.Geocoder();
	window.geomarkers = new Array();

	var jobs = document.getElementsByClassName('job');
	for (var i = 0; i < 2; i++)
	{
		var title = jobs[i].getElementsByClassName('title')[0].innerHTML;
		var address = jobs[i].getElementsByClassName('location')[0].innerHTML;
		var description = jobs[i].getElementsByClassName('description')[0].innerHTML;
		codeAddress(address, title, description);
	}
});

function addMarker(latlng, titleContent, htmlContent) {
	var marker = new google.maps.Marker({
		position: latlng,
		map: window.map,
		title: titleContent,
		animation: google.maps.Animation.DROP
	});
	marker.setClickable(true);
	marker.setMap(window.map);
	google.maps.event.addListener(marker, 'click', function () {
		if (window.infoWindow)
			window.infoWindow.close();
		window.infoWindow = new google.maps.InfoWindow({
			content: htmlContent
		});
		window.map.panTo(marker.position);
		if (window.map.getZoom() < 13)
			window.map.setZoom(13);
	});
	window.geomarkers.push(marker);
}

function codeAddress(address, title, content) {
	window.geocoder.geocode({
		'address': address
	}, function (results, status) {
		if (status === google.maps.GeocoderStatus.OK) {
			addMarker(new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng()), title, content);
		} else
			console.log("La géolocalisation de votre adresse n'a pu etre effectue pour la raison suivante: " + status)
	});
}