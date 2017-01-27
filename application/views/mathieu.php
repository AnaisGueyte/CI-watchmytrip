<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Accueil</title>
        <meta name="description" content="Login de mon site">

        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        
        <link href="../../assets/css/bootstrap.css" rel="stylesheet">
        <link href="../../assets/css/bootstrap-switch.css" rel="stylesheet">
        <script src="../../assets/js/jquery-3.1.1.js"></script>
        <script src="../../assets/js/bootstrap-switch.js"></script>
        <link rel="stylesheet" type="text/css" href="../../assets/css/leaflet.css">
        <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
        <link href="../../assets/css/accueil.css" style="text/css" rel="stylesheet">
        <link href="../../assets/css/mathieu.css" style="text/css" rel="stylesheet">
    </head>

	<body>
        <header>
            <!-- Bandeau
            =========================================-->
            <div id="top">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-1" id="panelLogo">
                            <img src="../../assets/img/planet.png" id="logo">
                        </div>
                        <div class="col-xs-11" id="panelTitre">
                            <div class="navbar-header hidden-xs">
                                <a class="navbar-brand" href="#" id="textColorPerso2">Watch My Trip</a>
                            </div>
                            <div class="navbar-header visible-xs">
                                <a class="navbar-brand" href="#" id="textColorPerso2">WMT</a>
                            </div>
                        </div>
                    </div>
                </div>                
           </nav>
           </div>
        </header>


        <!-- Panneau central
        ================================================-->
        <section id="section">
            <div class="row">
                <div class="col-xs-2" id="panelLateral">
                    <nav class="navbar navbar-inverse sidebar" role="navigation">
                        <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-head">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="azerty">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="azerty">
                                <ul class="nav navbar-nav">
                                    <li class="active" id="red"><a href="#" id="red"><span class="badge badge-info pull-right">25</span>Anaïs<span style="font-size:16px;" class="pull-left hidden-xs showopacity glyphicon glyphicon-user" id="red"></span></a></li>
                                    <li ><a href="#" id="red"><span class="badge badge-info pull-right">25</span>Audric<span style="font-size:16px;" class="pull-left hidden-xs showopacity glyphicon glyphicon-user" id="red"></span></a></li>
                                    <li ><a href="#" id="red"><span class="badge badge-info pull-right">25</span>Benjamin<span style="font-size:16px;" class="pull-left hidden-xs showopacity glyphicon glyphicon-user" id="red"></span></a></li>
                                    <li ><a href="#" id="red"><span class="badge badge-info pull-right">25</span>Cyril<span style="font-size:16px;" class="pull-left hidden-xs showopacity glyphicon glyphicon-user" id="red"></span></a></li>
                                    <li ><a href="#" id="red"><span class="badge badge-info pull-right">25</span>Khadija<span style="font-size:16px;" class="pull-left hidden-xs showopacity glyphicon glyphicon-user" id="red"></span></a></li>
                                    <li ><a href="#" id="red"><span class="badge badge-info pull-right">25</span>Mathieu<span style="font-size:16px;" class="pull-left hidden-xs showopacity glyphicon glyphicon-user" id="red"></span></a></li>
                                </ul>
                            </div>

                            <!-- Ajout de notre bouton du bas servant à ajouter un lieu -->
                            <div>
                                <form action="" method="" data-toggle="modal" data-target="#newSpot">
                                    <button type="button" name="btnAjoutSpot" class="btn btn-info btn-lg" id="boutonAJout">Ajouter un Spot</button>
                                </form>

                                <div class="modal fade" id="newSpot" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Votre Spot</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form  method="post" action="">
                                            Nom : <input type="text" name="nom"  class="form-control"><br><br>
                                            Date : <input type="date" name="date" class="form-control"><br><br>
                                            Photo : <input type="file" name="photo" class="form-control"><br><br>
                                            Avis : <input type="textarea" name="avis" class="form-control"><br><br>
                                            <input type="submit" name="ok" value="Valider" class="btn btn-info">
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>


                <!-- Partie Audric
                =====================================-->
                <div class="col-xs-10">
                        <div id="map">
                            
                        </div>	

                        <input type="hidden" id="Latitude" value="" />	
                        <input type="hidden" id="Longitude" value="" />

                        <script type="text/javascript" src="../../assets/js/leaflet.js"></script>
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
                </div>
        </section>



        <!-- Pied de page
        ===============================================================-->

        <!-- Appels aux scripts javascript et jquery
        =================================================================-->
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <!-- Javascript de Bootstrap -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script src="../../assets/js/map.js"></script>
        <script>
            $(function () {
                $('li>a').on('click', function(e) {
                    e.preventDefault();
                    var hash = this.hash;
                    $('html, body').animate({
                    scrollTop: $(this.hash).offset().top
                    }, 1000, function(){
                    window.location.hash = hash;
                    });
                });
            });
        </script>