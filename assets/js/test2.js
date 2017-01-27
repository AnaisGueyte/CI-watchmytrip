document.getElementById('btnAjoutSpot').onclick = function ActiveSpot()
{
console.log("Active spot ok");

 
}


document.getElementById('map').onclick = function recupInfo()
{
	console.log("Fonction ajax");
	$(document).ready(function()
	{ 
		$("#modal-structure").modal("show");
	});
	
	var latitude=document.getElementById("Latitude").value;
	var longitude=document.getElementById("Longitude").value;
	
	console.log("Latitude : "+latitude);
	console.log("Longitude : "+longitude);
	
	//log.message('info',"fonction ajax");
	var xhr;
	xhr = new XMLHttpRequest();

	xhr.open("POST","ajouterVisite",true);
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	xhr.send("lat="+latitude+"&long="+longitude); 


	xhr.send();
}