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
    <link href="../../assets/css/accueil.css" style="text/css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
</head>

<body>
    <header>
        <!-- Bandeau
            =========================================-->
        <div id="top">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-1" id="panelLogo"> <img src="../../assets/img/planet.png" id="logo"> </div>
                        <div class="col-xs-10" id="panelTitre">
                            <div class="navbar-header hidden-xs"> <a class="navbar-brand" href="#" id="textColorPerso2">Watch My Trip</a> </div>
                            <div class="navbar-header visible-xs"> <a class="navbar-brand" href="#" id="textColorPerso2">WMT</a> </div>
                        </div>
                        <div class="col-xs-1">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                        </div>
                    </div>
                    <div class="row" id="menu">
                        <div class="collapse navbar-collapse">
                            <div class="navbar navbar-navs">
                                <ul class="nav navbar-nav" id="onglets">
                                    <li class=""> <a href="#top" id="textColorPerso">Accueil</a> </li>
                                    <li> <a href="#carousel" id="textColorPerso">Présentation</a> </li>
                                    <li> <a href="#formulaire" id="textColorPerso">Login</a> </li>
                                    <li class=""> <a href="#contact" id="textColorPerso">Contact</a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!-- Carroussel
        =========================================-->
    <div id="carousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
            <li data-target="#carousel" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
            <div class="item active"> <img alt="" src="../../assets/img/1.jpg">
                <h3 class="carousel-caption">Gardez une trace</h3> </div>
            <div class="item"> <img alt="" src="../../assets/img/2.jpg">
                <h3 class="carousel-caption">Où que vous soyez</h3></div>
            <div class="item"> <img alt="" src="../../assets/img/3.jpg">
                <h3 class="carousel-caption">Avec qui que vous soyez</h3></div>
            <div class="item"> <img alt="" src="../../assets/img/4.jpg">
                <h3 class="carousel-caption">Votre histoire</h3></div>
        </div>
        <a class="left carousel-control" href="#carousel" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a>
        <a class="right carousel-control" href="#carousel" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a>
    </div>
    <!-- Formulaire
        ==============================================================-->
    <div class="container-fluid" id="formContainer">
        <div class="row" id="formContainer">
            <div class="col-xs-3"></div>
            <div class="jumbotron row col-xs-6" id="formulaire">
                <form method="post" class="col-xs-12" action="connexion">
                    <legend>Inscription</legend> 
                    <p id="info"></p><br>
                    Login :
                    
                    <input type="text" name="login" required class="form-control">
                    
                    <br>
                    <br> Password :
                    <input type="password" name="password" required class="form-control">
                    <br>
                    <br>
                    <button type="submit" id="subButton" class="btn btn-primary btn-md">Envoyer</button>
                    <br>
                    <br> </form>
                <div class="row">
                    <!-- Bouton Nouveau Membre -->
                    <button type="button" class="btn btn-primary btn-md" id="btnNewMembre" data-toggle="modal" data-target="#myModal"> Nouveau Membre ? </button>
                    <!-- Modal / Affiche notre formulaire d'inscription-->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Inscription</h4> </div>
                                <div class="modal-body">
                                    <form method="post" action="inscription"> Nom :
                                        <input type="text" name="nom" required class="form-control"> <span id='nom_manquant'></span>
                                        <br> Prénom :
                                        <input type="text" name="prenom" required class="form-control"> <span id='prenom_manquant'></span>
                                        <br> Pseudo :
                                        <input type="text" name="pseudo2" required class="form-control"> <span id='pseudo2_manquant'></span>
                                        <br> Password :
                                        <input type="password" name="password2" required class="form-control"> <span id='password2_manquant'></span>
                                        <br> Confirm Password :
                                        <input type="password" name="confirmPassword" required class="form-control"> <span id='confirmPassword_manquant'></span>
                                        <br>
                                        <input type="submit" name="ok" value="Valider" id="valider" class="btn btn-default"> </form>
                                    <!-- script pour valider le formulaire -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-3"></div>
        </div>
    </div>
    <!-- Pied de page
        ===============================================================-->
    <!-- Appels aux scripts javascript et jquery
        =================================================================-->
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- Javascript de Bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script>
        $(function () {
            $('li>a').on('click', function (e) {
                e.preventDefault();
                var hash = this.hash;
                $('html, body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000, function () {
                    window.location.hash = hash;
                });
            });
        });
    </script>