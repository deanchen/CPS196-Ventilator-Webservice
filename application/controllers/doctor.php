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
  
  function view($page=1,$searchString=NULL)
  {
    $PAGE_SIZE = 10;
    
    if($page < 1)
      {
        $page = 1;
      }
    
    $this->load->model('PatientSession');  
    
     $count = ceil($this->PatientSession->getMatchingPatientsCount($searchString)/$PAGE_SIZE);
    
     if($page > $count)
      {
        $page = $count;
      }
    
    $results = $this->PatientSession->getMatchingPatients($searchString,$page,$PAGE_SIZE); 
    
    $data = array(
          'records' => $results,
          'pages' => $count,
          'this_page_number' => $page);
          
    $this->load->view('doctor_view',$data);
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