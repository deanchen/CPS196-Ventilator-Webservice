<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
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
	          
	    	$this->load->view('admin',$data);
	    }
	}
}