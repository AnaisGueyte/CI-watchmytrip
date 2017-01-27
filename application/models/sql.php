<?php
class Sql extends CI_Model {


  /*  public function __construct()
        {
            parent::__construct;
               
        }*/
// la méthode creatUser récupère les données du formulaire, les insère en vérifiant si le pseudo est déja utilisé par quelqu'un d'autre, 
        //si oui, elle nous affiche une alerte indiquant cela au utilisateur


// **************************************************************************************** //
// ****************************** Creation d'un utilisateur ******************************* //
// **************************************************************************************** //


public function createUser($data)

    {  
        $this->db->select('pseudo');
        $this->db->from('utilisateur');
        $this->db->where(array('pseudo'=>$data['pseudo']));

        $query = $this->db->get();
        


      if ($query->num_rows()>0){
           echo "<script language='Javascript'>

                  alert('Pseudo existe déja!');
          
           </script>";

       $this->load->view('accueil');
    }
    else{
        
     return  $this->db->insert('utilisateur', $data);  
       
}





 // @author: Khadidja

}


// **************************************************************************************** //
// ****************************** Connection d'un utilisateur ***************************** //
// **************************************************************************************** //

public function ConnectUser($pseudo, $password)
    {   

        // On va chercher l'id utilisateur en fonction de la combinaison pseudo/mot de passe récuperé dans le formulaire de connection.
        
        log_message('info', "pseudo" . $pseudo);
        $this->db->select('id');
        $this->db->from ('utilisateur');
        $this->db->where('pseudo', $pseudo)->where('motdepasse', $password); 
        
        $query = $this->db->get();
        
        return $query->row()->id;

        
        // Le code retourne alors un ID. Dans la méthode du controler, on vérifie si l'ID est supérieur à zero.
        // Le pseudo est unique, aucun doublon de combinaison possible. 
        // @author: Anaïs
    }


 // **************************************************************************************** //
// *************************** Recup tous les marqueurs d'un user ************************* //
// **************************************************************************************** //


public function getMarkers($userId)
    {
        // On selectionne les données longitude et latitude dans la table visite là ou il y a un lien avec l'user id
     
        $this->db->select('*');
        $this->db->from ('visite');
        $this->db->where('id_utilisateur', $userId);
      //  $this->db->group_by('id'); 

        // Selection les données longitude et latitude d'une visite en fonction d'un utilisateur et range les par id (du la visite), ainsi sur une ligne, on a les coordonées de chaque visite. Plus facile pour la reception

        // On envoie ces données dans un tableau.
        $query = $this->db->get();

        return $query->result();


        // @author: Anaïs
    }

// **************************************************************************************** //
// ************************* Recup les données d'un seul marqueur ************************* //
// **************************************************************************************** //

public function getMarkerData($userId)
    {
        // On selectionne toutes les données de la table visite (Titre, date, commentaire) en fonction de l'ID utilisateur
     
        $this->db->select('*');
        $this->db->from ('visite');
        $this->db->where('id_utilisateur', $userId);

        // On envoie ces données dans un tableau.
        $query = $this->db->get();

        // On recupère l'id de la visite pour chercher la photo associée à la visite
        $identfiant->row()->id;


        // On va chercher dans la table photos l'image associée à la visite
        $this->db->select('image');
        $this->db->from ('photos');
        $this->db->where('id_visite', $identfiant);


        // On ajoute l'image dans le tableau. 
        $query = $this->db->get();

        return $query;


        // @author: Anaïs
    }


// **************************************************************************************** //
// ***************************** Insert données d'un marqueur ***************************** //
// **************************************************************************************** //

public function addTrip($data)
        {
        $this->db->set('id_utilisateur',$data['id_utilisateur']);    
        $this->db->set('longitude',$data['longi']);
        $this->db->set('latitude',$data['lati']);
        $this->db->set('titre',$data['titre']);
        $this->db->set('date',$data['date']);
        $this->db->set('commentaire',$data['commentaire']);
        $this->db->set('id_photos', $data['id_photos']);

        $this->db->insert('visite');  
    

        }   





// **************************************************************************************** //
// *************************** Recup données users a la connexion ************************* //
// **************************************************************************************** //

public function getUsers()
    {

        // ON selectionne tous le pseudos de la table utilisateur et on les range par ID utilisateur
        $this->db->select('pseudo');
        $this->db->from ('utilisateur');
        $this->db->group_by('id'); 


        // On ajoute l'image dans le tableau. 
        $query = $this->db->get();

        return $query;
    }


// **************************************************************************************** //
// *************************** Recup données users a la connexion ************************* //
// **************************************************************************************** //

public function getNumberVisits($userId)
    {

        // ON selectionne tous le pseudos de la table utilisateur et on les range par ID utilisateur
        $this->db->select('id, COUNT(id) as numberVisits');
        $this->db->from ('visite');
//        $this->db->where('id_utilisateur', $userId);
        $this->db->group_by('id_utilisateur'); 

        // On ajoute l'image dans le tableau. 
        $query = $this->db->get();


        return $query;
    }








}
?>