<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rest extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->model('survey_model');
	}

	function index()
	{
		$this->load->view('api_docs');
	}
	
	function survey_get()
	{
		$data = array("test_string");
		$this->response($data);
	}
}