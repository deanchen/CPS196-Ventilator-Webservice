<?php 
define('PASSWORD','ventilatorApp');

function checkLogIn($page)
{
	$message = '';
	session_start();
			
	if(!isset($_SESSION["logged_in"]))
	{
		if($page->input->post('password') != NULL)
		{
			if($page->input->post('password') == PASSWORD)
			{
				$_SESSION["logged_in"] = true;
				return true;
			}
			else
			{
				$message = 'Incorrect password';
				$data = array('message' => $message);
				$page->load->view('log_in',$data);	
				return false;	
			}
		}
		else
		{	
			$data = array('message' => $message);
			$page->load->view('log_in',$data);	
			return false;
		}
	}	
	else
	{
		return true;		
	}
}
?>