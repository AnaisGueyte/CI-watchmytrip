<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Traitement extends CI_Controller {
function __construct() {
parent::__construct();
$this->load->library('form_validation');
}
	
	public function start()
	{	
		$this->load->view('header');
		$this->load->view('Map');
		$this->load->view('footer');
	}

  public function watchMe(){
    $this->load->view('watchMe');
  }
 

  public function mathieu()
  {
	  $this->load->view('mathieu');
  }
  public function mathieu2()
  {
	  $this->load->view('mathieu2');
  }
  
	public function accueil()
	{	
		$this->load->view('accueil');


	}



// **************************************************************************************** //
// ***************************** Methode de connexion au site **************************** //
// ************************************************************************************** //


	public function connexion()
	{

      // Lancement du helper et librarie form validation
     // $this->load->helper('security');
     // $this->load->library('form_validation');

      // recuperation des champs du formulaire

		  $login = $this->input->post('login');
      $password = $this->input->post('password');

      // Etablissement des rules pour le formulaire

     // $this->form_validation->set_rules('login', '"login"', 'required|encode_php_tags|xss_clean');
      //$this->form_validation->set_rules('password', '"mot de passe"', 'required|encode_php_tags|xss_clean');

      // Lancement du formulaire

     // if($this->form_validation->run())
        
            $result = array();
            $this->load->model('sql'); 
      	    $ID =  $this->sql->ConnectUser($login, $password); 

            // Le code retourne alors un ID. Dans la méthode du controler, on vérifie si l'ID est supérieur à zero.
            // Le pseudo est unique, aucun doublon de combinaison possible. 
            
            if (isset($ID) && ($ID > 0))
      	    {
                // @ author: Cyril ==> besoin de ces 2 variables dans le $SESSION pour la suite du programme
                $this->session->set_userdata('logged', "TRUE");
                $this->session->set_userdata('id_utilisateur', $ID);
         

                log_message('info',"======> Fonction CONNEXION");

                log_message('info',"retour requete :". $ID);
                log_message('info',"ID de la variable SESSION:". $this->session->userdata('id_utilisateur'));

                $userId = $this->session->userdata('id_utilisateur');
                $this->load->model('sql');

                $result['spot'] =  $this->sql->getMarkers($userId);

                foreach ($result['spot'] as $row)
                {
                    log_message('info',"latitude :".$row->latitude);
                    log_message('info',"longitude :".$row->longitude);
                       
                }
             //   log_message('info',"latitude :".var_dump($result['marker']->latitude));
           //    log_message('info',"longitude :". $result["longitude"]);
                // une fois les markers récupéres, les envoyés à la view pour affichage

                $this->load->view('watchMe', $result);
          	}
           else 
           {
           
              $this->load->view('accueil'); // RETOUR A LA PAGE DE CONNEXION
           
          	 // echo "une erreur s'est produite"; ECRIRE UNE METHODE AJAX QUI AFFICHE UN MESSAGE D ERREUR DANS LE FORMULAIRE
              log_message('info', "ERREUR RETOUR A LA PAGE FORMULAIRE");
            }
    		// @author: Anaïs
	}

// **************************************************************************************** //
// ***************************** Methode d'inscription au site **************************** //
// **************************************************************************************** //

public function inscription(){
    
  
      $confirm=array();
      $data = array();        
      $data['nom'] = $this->input->post('nom');
      $data['prenom'] = $this->input->post('prenom');
      $data['pseudo'] = $this->input->post('pseudo2');
      $data['motdepasse'] = $this->input->post('password2');
      $confirm['confirmation']=$this->input->post('confirmPassword');

    //  Le formulaire est valide
      $this->load->model('sql'); 
      $result =  $this->sql->createUser($data); 

        if (isset($result) && ($result != 0))
             {
              
             $this->load->view('watchMe');
             }  
             
      else{

           echo "<script language='Javascript'>
           alert('Inscription échouée, merci de rééssayer');
            </script>";
            $this->load->view('accueil');
        }
        
       
     
}
// @auteur khadidja

// **************************************************************************************** //
// ************************* Methode recup coordonées des marqueurs *********************** //
// **************************************************************************************** //


public function getMarker()
  {


    

    // @author: Cyril ==> mise à jour de la fonction
     $userId = $this->session->userdata('id_utilisateur');
    
      $this->load->model('sql'); 
      $result =  $this->sql->getMarkers($userId);

      // Retourne un tableau de 2 données: longitutde DOUBLE, latitude DOUBLE

      // @author: Anaïs


  }


// **************************************************************************************** //
// **************************** Methode recup des utilisateurs  *************************** //
// **************************************************************************************** //


public function displayUsers()
  {

  // La première méthode retourne tous les utilisateurs rangés par ID (donc ordre d'entrée dans la bdd)
  // La deuxieme méthode calcul le nombre de visites par utilisateur, rangés par ID utilisateur. Donc a priori, il y a une logique dans la suite des données.
  // A TESTER !!

      $data = array();
      $this->load->model('sql'); 
      $data['pseudo'] =  $this->sql->getUsers();
      $data['numberVisits'] =  getNumberVisits();
	  return $data;


      // Retourne un tableau de users: pseudos + nombre de visite par pseudos.

      // @author: Anaïs
    }

// **************************************************************************************** //
// *********************************** Ajout un markeur *********************************** //
// **************************************************************************************** //
/**
@ author : Cyril
*/
public function ajouterVisite()
{
      $data = array(); 
     
      $data['id_utilisateur'] = $this->session->userdata('id_utilisateur');
      $data['longi'] = $this->input->post('long');
      $data['lati'] = $this->input->post('lat');
      $data['titre'] = $this->input->post('nom');
      $data['date'] = $this->input->post('date');
      $data['commentaire'] = $this->input->post('avis');
      $data['id_photos'] = 1;

      log_message('info',"ID de l'utilisateur :".$data['id_utilisateur']);
      log_message('info',"Latitude recu :".$data['lati']);
      log_message('info',"longitude recu :".$data['longi']);
      log_message('info',"Titre recu :".$data['titre']);
      log_message('info',"date recu :".$data['date']);
      log_message('info',"avis recu :".$data['commentaire']);
    
      if($this->session->userdata("logged")==true)
      {
        $this->load->model('sql'); 
        $result =  $this->sql->addTrip($data);  
        
        if (isset($result) && ($result > 0))
        {
        //  $this->load->view('watchMe');
           //  $this->load->library('../controllers/traitement');
           //  $this->traitement->start(); 
        }   

      }
      else
      {
        $this->load->view('accueil'); 
      }

  
}

// **************************************************************************************** //
// *********************************** Ajout d'un spot  *********************************** //
// **************************************************************************************** //
/*
public function ajouterSpot() {
   log_message('info',"================ fonction AjouterSpot");
   $this->load->view('accueil');
}*/

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */