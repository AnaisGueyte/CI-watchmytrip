
document.getElementById('map').onclick = function recupInfo()
{

	//Test fonction affichage au click de notre fenetre modale :
	$(document).ready(function() {
		$("#map").click(function() {
		$('#newSpot').modal('show');
		});
	});
}

document.getElementById('btnOK').onclick = function recupInfo()
{
	console.log("Fonction ajax");	

	var latitude=document.getElementById("Latitude").value;
	var longitude=document.getElementById("Longitude").value;
	var nom=document.getElementById("nom").value;
	var date=document.getElementById("date").value;
	var avis=document.getElementById("avis").value;
//	var ID_user=document.getElementById("userID").value;
	
	console.log("Latitude : "+latitude);
	console.log("Longitude : "+longitude);
	console.log("nom : "+nom);
	console.log("date : "+nom);
	console.log("avis : "+avis);
//	console.log("ID utilisateur : "+ID_user);
	
	//log.message('info',"fonction ajax");
	var xhr;
	xhr = new XMLHttpRequest();


	xhr.open("POST","ajouterVisite",true);
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	xhr.send("lat="+latitude+"&long="+longitude+"&nom="+nom+"&date="+date+"&avis="+avis); 
}

