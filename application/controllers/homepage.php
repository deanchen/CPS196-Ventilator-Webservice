<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Homepage extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->load->view('homepage');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */