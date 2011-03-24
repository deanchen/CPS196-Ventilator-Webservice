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
	
  function action()
  {
  	$callback = $this->input->get('callback', NULL);
    $data = null;
    $this->load->model('survey');
	
	if($this->input->post('action') == 'survey_completed')
	{
		$data = $this->survey->setSurveyCompleted($this->input->post('session_id'));
	}
	elseif($this->input->post('action') == 'update_survey_answer')
	{
		$data = $this->survey->setSurveyResult($this->input->post('session_id'),$this->input->post('question_id'),$this->input->post('selected_option_id'));
	}
    $this->load->view('rest',array('callback'=>$callback, 'data' => $data));
  }
	
  function patient($sessionID)
  {
  	$callback = $this->input->get('callback', NULL);
    $data = null;
    $this->load->model('patient_session'); 
    $data = $this->patient_session->getPatientDetails($sessionID);
    $this->load->view('rest',array('callback'=>$callback, 'data' => $data));
  }
  
  function report($sessionID)
  {
  	$callback = $this->input->get('callback', NULL);
    $data = null;
    $this->load->model('patient_session'); 
    $data = $this->patient_session->getReport($sessionID);
    $this->load->view('rest',array('callback'=>$callback, 'data' => $data));
  }
  
  function health_params()
  {
  	$callback = $this->input->get('callback', NULL);
    $data = null;
    $this->load->model('patient_session'); 
    $data = $this->patient_session->getHealthParams();
    $this->load->view('rest',array('callback'=>$callback, 'data' => $data));
  }
  
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
    $this->load->view('rest',array('callback'=>$callback, 'data' => $data));
  }
  
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