<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Traitement extends CI_Controller
{
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

  	public function cyril()
  	{ 
	    $ajoutSpot="false";
	    $this->load->view('header');
	    $this->load->view('Cyril',$ajoutSpot);
	    $this->load->view('footer');

  	}

  	public function accueil()
  	{ 
	    $this->load->view('accueil');
	    $this->load->view('footer');
    // Lancement d'une session
    	$this->session->set_userdata(‘logged’, true) ;
  	}

  	public function mathieu() {
    	$this->load->view('mathieu');
  	}

  	public function mathieu2() {
    	$this->load->view('mathieu2');
  	}


// **************************************************************************************** //
// ***************************** Methode de connexion au site **************************** //
// ************************************************************************************** //


  	public function connexion()
  	{

	     // Lancement du helper et librarie form validation
	     $this->load->helper('security');
	     $this->load->library('form_validation');

	     // recuperation des champs du formulaire

	     $login = $this->input->post('login');
	     $password = $this->input->post('password');

	     // Etablissement des rules pour le formulaire

	     $this->form_validation->set_rules('login', '"login"', 'required|encode_php_tags|xss_clean');
	     $this->form_validation->set_rules('password', '"mot de passe"', 'required|encode_php_tags|xss_clean');

	     // Lancement du formulaire

      	if($this->form_validation->run())
        {            
        	$this->load->model('sql'); 
            $result =  $this->sql->ConnectUser($login, $password); 

            // Le code retourne alors un ID. Dans la méthode du controler, on vérifie si l'ID est supérieur à zero.
            // Le pseudo est unique, aucun doublon de combinaison possible. 
            
            if (isset($result) && ($result > 0))
            {
            	$this->load->library('../controllers/traitement');
                $this->traitement->start(); 
            }
        }   
      else 
        {

            $this->load->view(''); // RETOUR A LA PAGE DE CONNEXION
            // echo "une erreur s'est produite"; ECRIRE UNE METHODE AJAX QUI AFFICHE UN MESSAGE D ERREUR DANS LE FORMULAIRE
           	log_message('info', "ERREUR RETOUR A LA PAGE FORMULAIRE");
        }
            
          
        // @author: Anaïs

  	}

// **************************************************************************************** //
// ***************************** Methode d'inscription au site **************************** //
// **************************************************************************************** //

	public function inscription(){

	   //$this->load->library('form_validation');

	        // recupération des données
	      $confirm=array();
	      $data = array();        
	      $data['nom'] = $this->input->post('nom');
	      $data['prenom'] = $this->input->post('prenom');
	      $data['pseudo'] = $this->input->post('pseudo');
	      $data['motdepasse'] = $this->input->post('password');
	      $confirm['confirmation']=$this->input->post('confirmPassword');

	      /*$this->form_validation->set_rules('nom', '"nom"', 'trim|required|min_length[3]|max_length[52]|alpha_dash|encode_php_tags|xss_clean');
	      $this->form_validation->set_rules('prenom','"prenom"', 'trim|required|min_length[5]|max_length[52]|alpha_dash|encode_php_tags|xss_clean');
	      $this->form_validation->set_rules('pseudo', '"pseudo"', 'trim|required|min_length[3]|max_length[25]|alpha_dash|encode_php_tags|xss_clean');
	      $this->form_validation->set_rules('password','"password"', 'trim|required|min_length[8]|max_length[25]|alpha_dash|encode_php_tags|xss_clean');

	    if($this->form_validation->run())
	       {*/
	    //  Le formulaire est valide
	      $this->load->model('sql'); 
	      $result =  $this->sql->createUser($data); 
	      if (isset($result) && ($result > 0))
	      {            
		      $this->load->library('../controllers/traitement');
		      $this->traitement->start(); 
	      }  
	             
	      else{
	           "<script language='Javascript'>
	           alert('L'inscription a échoué, merci de rééssayer);
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


	      // J'AI BESOIN DE RECUPERER ICI L'ID de l'utilisateur. ON le recupere a la connexion.
	    
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


	      // Retourne un tableau de users: pseudos + nombre de visite par pseudos.

	      // @author: Anaïs
	}

// **************************************************************************************** //
// *********************************** Ajout un markeur *********************************** //
// **************************************************************************************** //

	public function ajouterVisite()
	{
	      $data = array(); 
	   //   $data['titre'] = $this->input->post('titre');
	   //   $data['date'] = $this->input->post('date');
	   //   $data['photo'] = $this->input->post('photo');
	  //    $data['avis'] = $this->input->post('avis');
	      $data['longi'] =$this->input->post("long");
	      $data['lati'] = $this->input->post("lat");

	      $this->load->model('sql'); 
	      $result =  $this->sql->addTrip($data);  
	        
	        if (isset($result) && ($result > 0))
	        {
	           //  $this->load->library('../controllers/traitement');
	           //  $this->traitement->start(); 
	        }   
	      else {
	            // $this->load->view('accueil'); //  reste sur la page d'inscription a voir avec le groupe! 
	        }

	    log_message('info',"Latitude recu :".$lati);
	    log_message('info',"longitude recu :".$longi);
	   
	}




  //LES TESTS UNITAIRES

  // @author: Benjamin
	public function connexiontest()
	{
		//on fait appel a la librérie test de codeIgniter
		$this->load->library('unit_test');

		$login = $this->input->post('login');
		$password = $this->input->post('password');
		//$expected_result =
		$test_name = 'Récuperation pseudo et mot de passe';

		//lance le test des différentes methodes
		$this->unit->run($login, 'is_bool', $test_name);
		$this->unit->run($password, 'is_bool', $test_name);

		//envoie du code sur notre vue
		//$this->load->view('vuewmttest');
		echo $this->unit->report();
	}

	public function inccriptiontest()
	{

		$this->load->library('unit_test');

		$data = array();        
		$data['nom'] = $this->input->post('nom');
		$data['prenom'] = $this->input->post('prenom');
		$data['pseudo'] = $this->input->post('pseudo');
		$data['password'] = $this->input->post('password');
		$data['confirm'] = $this->input->post('confirmPassword');

		$test_name = 'Récuperation des données et mise en forme dans un tableau';

		$this->unit->run($data, 'is_array', $test_name);
		$this->load->view('vuewmttest');
	}
/*
  public function getMarkertest()
  {

    $this->load->library('unit_test');

      $this->load->model('sql'); 
      $result =  $this->sql->getMarkerData($userId);

      $test_name = 'Récuperation des données et mise en forme dans un tableau';

      $this->unit->run($result, 'is_array', $test_name);
      $this->load->view('vuewmttest');
  }*/
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */