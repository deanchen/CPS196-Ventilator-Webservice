<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * This is the controller for all of the functionality the admin has
 */
class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}
	
	/*
	 * Controller for the main admin page where he/she can choose what to administrate
	 */
	function index()
	{
		$this->load->model('passwords'); 
		if($this->passwords->checkLogin($this,'Admin'))
		{			
			$this->load->view('admin');
		}
	}
	
	/*
	 * Controller for the pages where the admin can change the admin or doctor password
	 */
	function passwords($user_type)
	{
		$user_type = ucwords($user_type);
		$data = array("user_type" => $user_type, "message" => "");
		$this->load->model('passwords'); 
		if($this->passwords->checkLogin($this,'Admin'))
		{
			if($this->input->post('changepword') != NULL)
			{
				$msg = $this->passwords->changePassword($this->input->post('old_password'),$this->input->post('new_password'),$this->input->post('new_password2'),$user_type);
				$data["message"] = $msg;
			}	
			$this->load->view('admin_passwords',$data);
		}
	}
	
	/*
	 * Controller for the page where the admin can change the survey
	 */
	function survey()
	{
		$str = $_SERVER["REQUEST_URI"];	
		if($str[strlen($str)-1] != '/')
		{
			header('Location: ' . $str . '/');
		}
		
		$this->load->model('passwords'); 
		if($this->passwords->checkLogin($this,'Admin'))
		{			
			$this->load->model('survey');  	
			$survey_obj = $this->survey;
			$msg = null;
			
			if(isset($_POST['submit']) && $_POST['submit'] == 'Submit Changes')
			{
				$survey_obj->updateSurvey($_POST);
				$msg = "Changes Saved!";
			}
			
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
					$groups[$group['id']]['questions'] = $survey_obj->getSurveyQuestions($group['id']);
					
					foreach($groups[$group['id']]['questions'] as $key=>$question)
					{
						foreach($question['options'] as $option)
						{	
							$groups[$group['id']]['questions'][$key]['id'] = $option['question_id'];
							$groups[$group['id']]['questions'][$key]['is_multi_answered'] = $option['is_multi_answered'];
							break;
						}
					}
					
					$groups[$group['id']]['id'] = $group['id'];
					$groups[$group['id']]['title'] = $group['title'];
				}
			}
			
	  		$data = array('groups' => $groups, 'msg' => $msg);
	          
	    	$this->load->view('admin_survey',$data);
	    }
	}
}