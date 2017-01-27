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