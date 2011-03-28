<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once('log_in.php');

class Doctor extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		if(checkLogin($this))
		{
			$this->load->view('doctor');
		}
	}
	
  function patient($sessionID)
  {
	 if(checkLogin($this))
	 { 
	  	$this->load->model('survey');  	
		
		$points = $this->survey->getSurveyReport($sessionID);
			
	  	$data = array(
	          'points' => $points,
			  'sessionID' => $sessionID);
	          
	    $this->load->view('doctor_patient_view',$data);
	 }
  }
  
  function patient_answers($sessionID)
  {
	 if(checkLogin($this))
	 { 		
	  	$this->load->model('survey');  	
		$survey_obj = $this->survey;
		
		$result = $survey_obj->getSurveyQuestionGroups();
		if(gettype($result) == 'object' && get_class($result) == 'Exception')
		{
			$msg = $result->getMessage();
		}
		else
		{
			$groups = array();
			foreach($result as $group)
			{
				$groups[$group['id']]['questions'] = $survey_obj->getSurveyQuestions($group['id'],$sessionID);
				$groups[$group['id']]['title'] = $group['title'];
			}
		}
		
		$result = $survey_obj->getSurveyReport($sessionID);
		if(gettype($result) == 'object' && get_class($result) == 'Exception')
		{
			$msg = $result->getMessage();
		}
		else
		{
			$total_points = $result;
			$top_incr =0;
			if($total_points >= 8 && $total_points <= 9)
			$top_incr+=191.25;
			else if($total_points >=3 && $total_points<=5)
			$top_incr+=573.75;
			else if($total_points <= 2)
			$top_incr+=765;
			else if($total_points >= 6 && $total_points <= 7)
			$top_incr+=382.5;
			$top_incr_px = $top_incr."px";
		}
			
	  	$data = array(
	          'groups' => $groups,
			  'top_incr_px' => $top_incr_px);
	          
	    $this->load->view('doctor_print_patient_results',$data);
	  }
  }
  
  function view($page=1,$searchString=NULL)
  {
	if(checkLogin($this))	
	{ 
	  $PAGE_SIZE = 10;
	    
	    $this->load->model('patient_session');  
		
		$searchString = str_replace('-', ' ', $searchString);
	    
	     $count = ceil($this->patient_session->getMatchingPatientsCount($searchString)/$PAGE_SIZE);
	    
	     if($page > $count)
	      {
	        $page = $count;
	      }
		  
		  if($page < 1)
	      {
	        $page = 1;
	      }
	    
	    $results = $this->patient_session->getMatchingPatients($searchString,$page,$PAGE_SIZE); 
	    
	    $data = array(
	          'records' => $results,
	          'pages' => $count,
	          'this_page_number' => $page,
			  'searchString' => $searchString);
	          
	    $this->load->view('doctor_view',$data);
     }
  }
  
  function submit()
  {
	 if(checkLogin($this))
	 {
	    $this->load->model('patient_session'); 
	    $id = $this->patient_session->generateSession($_POST['params']);
	   
	   $data = array(
	          'id' => $id);
	          
	   $this->load->view('doctorsubmit',$data);
	 }
  }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */