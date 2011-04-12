<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Survey extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->load->model('passwords'); 
		$this->passwords->logOut();
		header('Location: /client/index.php?session_id='.$_GET["session_id"]);
	}
}