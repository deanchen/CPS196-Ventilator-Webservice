<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rest extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->load->view('api_docs');
	}
	
  function patient($sessionID)
  {
    $data = null;
    $this->load->model('patient_session'); 
    $data = $this->patient_session->getPatientDetails($sessionID);
    $this->load->view('rest',array('data' => $data));
  }
  
  function report($sessionID)
  {
    $data = null;
    $this->load->model('patient_session'); 
    $data = $this->patient_session->getReport($sessionID);
    $this->load->view('rest',array('data' => $data));
  }
  
  function health_params()
  {
    $data = null;
    $this->load->model('patient_session'); 
    $data = $this->patient_session->getHealthParams();
    $this->load->view('rest',array('data' => $data));
  }
  
  function survey($command,$param1 = NULL,$param2 = NULL)
  {
    $this->load->model('survey'); 
    $data = null;
    if($command =='groups')
    {
      $data = $this->survey->getSurveyQuestionGroups();
    }
    elseif($command =='questions')
    {
      $data = $this->survey->getSurveyQuestions($param1,$param2);
    }
    elseif($command =='patient')
    {
      $data = $this->survey->getPatientSurveyData($param1);
    }
    elseif($command =='points')
    {
      $data = $this->survey->getSurveyReport($param1);
    }
    elseif($command =='completed')
    {
      $data = $this->survey->isSurveyCompleted($param1);
    }
    $this->load->view('rest',array('data' => $data));
  }
  
  function session($command,$param)
  {
     $this->load->model('patient_session'); 
     $data = null;
     if($command == 'validate')
     {
       $data = $this->patient_session->validateSession($param);
     }
     $this->load->view('rest',array('data' => $data));
  }  
}