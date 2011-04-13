<?php
	class Passwords extends CI_Model 
	{		
		function checkLogIn($page,$user_level)
		{
			session_start();
			$message = '';	
			
			if(!isset($_SESSION[$user_level]))
			{
				if($page->input->post('password') != NULL)
				{
					if($user_level == 'Admin')
		    		{
		    			$data = $this->checkAdminPassword($page->input->post('password'));
					}
					else if($user_level == 'Doctor')
					{
						$data = $this->checkDoctorPassword($page->input->post('password'));
					}
					
					if($data === true)
					{
						$_SESSION[$user_level] = true;
						return true;
					}
					else
					{
						$message = $data;
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
			session_start();
			unset($_SESSION['Admin']);
			unset($_SESSION['Doctor']);
		}	
				
		function changeAdminPassword($old_password,$new_password)
		{
			return $this->changePassword($old_password,$new_password,'Admin');
		}
		
		function changeDoctorPassword($old_password,$new_password)
		{
			return $this->changePassword($old_password,$new_password,'Doctor');
		}
		
		function encrypt($password)
		{
			return sha1($password);
		}
		
		function checkAdminPassword($password)
		{
			return $this->checkPassword($password,'Admin');
		}
		
		function checkDoctorPassword($password)
		{
			return $this->checkPassword($password,'Doctor');
		}
		
		function checkPassword($password,$user_level)
		{
			$this->load->database();
			$query = $this->db->query("SELECT * FROM tbl_passwords WHERE user_level = '".$user_level."'
				&& password = '" . $this->encrypt($password) . "'");
				
				if($query->num_rows() > 0)
				{
					return true;
				}
				else
				{
					return "Password Incorrect";		
				}
		}
		
		function changePassword($old_password,$new_password,$new_password_confirm,$user_level)
		{
			
			if($this->checkPassword($old_password,$user_level) === true)
			{
				if(strlen($new_password) < 4)
				{
					return "New password must be atleast 4 characters long";
				}	
				elseif($new_password != $new_password_confirm)
				{
					return "The new passwords do not match";
				}	
				else
				{
					$query = $this->db->query("UPDATE tbl_passwords SET password = '" . $this->encrypt($new_password) . "'
					WHERE user_level = '".$user_level."'
					&& password = '" . $this->encrypt($old_password) . "'");	
					return "Password changed!";
				}
			}
			else
			{
				return "Old Password incorrect";		
			}
		}
	}
	
?>