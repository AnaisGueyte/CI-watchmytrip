 
<input type="hidden" id="Latitude" value="" />";	
<input type="hidden" id="Longitude" value="" />";	
 <script>

 lat=0;
 lng=0;
var coord;
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