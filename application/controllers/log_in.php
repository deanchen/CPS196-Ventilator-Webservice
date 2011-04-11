<?php 
define('PASSWORD','ventilatorApp');
session_start();

function checkLogIn($page)
{
	$message = '';	
			
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

function logOut()
{
	unset($_SESSION["logged_in"]);
}
?>