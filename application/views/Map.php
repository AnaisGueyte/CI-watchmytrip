<?php
require('menu.php')
?>

    <div id="map">
        
    </div>	

<input type="hidden" id="Latitude" value="" />";	
<input type="hidden" id="Longitude" value="" />";	


<script type="text/javascript" src="/WatchMyTrip/assets/js/leaflet.js"></script>
<script  type="text/javascript" >

	var map = L.map('map').setView([48.8582, 2.3387], 3);
	var tuileUrl = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
	var attrib='Map data © <a href="http://openstreetmap.org">OpenStreetMap</a> contributors';

	var osm = new L.TileLayer(tuileUrl, {minZoom: 3, maxZoom: 18, attribution: attrib});

	map.addLayer(osm);

	var marker = L.marker([48.8582, 2.3387]).addTo(map).bindPopup("<b>Popup n°1</b>");	
	lat=0;
	lng=0;
	var coord;

	//Recupération de la longitude et la latitude à chaque clic
	map.on('click', function(e) 
	{
		//
     	lat = e.latlng.lat;
     	lng = e.latlng.lng;

     	coord=[lat,lng];
     	//Fonctions pour afficher un nouveau marker au clic
     	var marker = L.marker([lat, lng]).addTo(map).bindPopup("<b>Popup n°1</b>");

		document.getElementById("Latitude").value = lat; 		
		document.getElementById("Longitude").value = lng; 
	});
</script>



<script type="text/javascript" src="../../assets/js/test.js"></script> 
