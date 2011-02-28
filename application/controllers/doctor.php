<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Doctor extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->load->view('doctor');
	}
  
  function submit()
  {
    $this->load->model('PatientSession'); 
    $id = $this->PatientSession->generateSession($_POST['params']);
   
   $data = array(
          'id' => $id);
          
   $this->load->view('doctorsubmit',$data);
  }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */