<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Controller for all REST api functionality
 */
class Rest extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	/**
	 * Controller for the REST api documentation
	 */
	function index()
	{
		$this->load->view('api_docs');
	}
	
  /*
   * Controller to return specific patient details
   */
  function patient($sessionID)
  {
  	$callback = $this->input->get('callback', NULL);
    $data = null;
    $this->load->model('patient_session'); 
    $data = $this->patient_session->getPatientDetails($sessionID);
    $this->load->view('rest',array('callback'=>$callback, 'data' => $data));
  }
  
  /*
   * Controller to return  a patient's survival percentages
   */
  function report($sessionID)
  {
  	$callback = $this->input->get('callback', NULL);
    $data = null;
    $this->load->model('patient_session'); 
    $data = $this->patient_session->getReport($sessionID);
    $this->load->view('rest',array('callback'=>$callback, 'data' => $data));
  }
  
  /*
   * Controller to return health params
   */
  function health_params()
  {
  	$callback = $this->input->get('callback', NULL);
    $data = null;
    $this->load->model('patient_session'); 
    $data = $this->patient_session->getHealthParams();
    $this->load->view('rest',array('callback'=>$callback, 'data' => $data));
  }
  
  /*
   * Controller to return or insert survey info, differing info depending on what command was passed in
   */
  function survey($command,$param1 = NULL,$param2 = NULL)
  {
  	$callback = $this->input->get('callback', NULL);
    $this->load->model('survey'); 
    $data = null;
    if($command =='groups')
    {
      $data = $this->survey->getSurveyQuestionGroups();
    }
    elseif($command =='questions')
    {

      $question_group_id = $param1;
	  $session_id = $param2;

      if ($this->input->server('REQUEST_METHOD') == 'POST') {
      	$data = array();
      	foreach ($_POST as $question_id => $selected_options) {
			$data[$question_id] = $selected_options;	
			$this->survey->setSurveyResult($session_id,$question_id,$selected_options);	
		}
	  } else {
      	$data = $this->survey->getSurveyQuestions($question_group_id,$session_id);
	  }
    }
    elseif($command =='patient')
    {
      $data = $this->survey->getPatientSurveyData($param1);
    }
    elseif($command =='points')
    {
      $data = $this->survey->getSurveyReport($param1);
    }
    elseif($command =='completed') {
	    if ($this->input->server('REQUEST_METHOD') == 'POST') {
	    	$this->survey->setSurveyCompleted($param1);
		} else {
	      $data = $this->survey->isSurveyCompleted($param1);
	    }
	}
    $this->load->view('rest',array('callback'=>$callback, 'data' => $data));
  }
  
  /*
   * Controller to return if a session is valid
   */
  function session($command,$param)
  {
  	$callback = $this->input->get('callback', NULL);
     $this->load->model('patient_session'); 
     $data = null;
     if($command == 'validate')
     {
       $data = $this->patient_session->validateSession($param);
     }
     $this->load->view('rest',array('callback' => $callback, 'data' => $data));
  }  
}