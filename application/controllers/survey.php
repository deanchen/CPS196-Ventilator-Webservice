<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Controller to redirect to iPad survey
 */
class Survey extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}
	
	/*
	 * Controller to redirect to an iPad survey
	 */
	function index()
	{
		$this->load->model('passwords'); 
		$this->passwords->logOut();
		header('Location: /client/index.php?session_id='.$_GET["session_id"]);
	}
}