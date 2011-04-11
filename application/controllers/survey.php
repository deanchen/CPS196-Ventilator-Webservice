<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('log_in.php');

class Survey extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		logOut();
		header('Location: /client/index.php?session_id='.$_GET["session_id"]);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */