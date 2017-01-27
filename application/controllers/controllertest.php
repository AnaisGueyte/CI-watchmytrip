<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class controllertest extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}

	// @author: Benjamin
	public function test()
	{
		//on fait appel a la librérie test de codeIgniter
		$this->load->library('unit_test');

		$test = 1 + 1;
		$expected_result = 2;
		$test_name = 'Adds one plus one';

		//lance le test des différentes methodes
		$this->unit->run($test, $expected_result, $test_name);

		//envoie du code sur notre vue
		$this->load->view('vuetest');
	}
}