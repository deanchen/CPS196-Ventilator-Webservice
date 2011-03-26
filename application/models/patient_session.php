<?php

	class Patient_session extends CI_Model 
	{
		public function validateSession($session_id){
			try{
			  $this->load->database();
				$query = $this->db->query("SELECT * FROM tbl_patient_sessions 
											WHERE session_id = '".$session_id."'");
				
				if($query->num_rows() > 0)
				return true;
				else
				return false;
			}catch(Exception $ex){
				return $ex;
			}
		}
			
		public function getPatientDetails($session_id){
			try{
				$this->load->database();
				$query = $this->db->query("SELECT HP.id AS param_id, HP.param, HPO.name AS value, HPO.points, PS.Name AS patient_name, PS.medical_record_no, PS.age, PS.platelets 
											FROM tbl_patient_health_params PH
											JOIN tbl_health_params HP ON HP.id = PH.health_param_id
											JOIN tbl_health_params_options HPO ON HPO.id = PH.selected_health_param_option_id
											JOIN tbl_patient_sessions PS ON PS.session_id = PH.session_id
											WHERE PH.session_id = '".$session_id."'
											GROUP BY  HP.id
											");
				
				if($query->num_rows() > 0){
          $res = $query->result_array();
					return $res;
				}
				else{
					throw new Exception("No records found!");
				}				
			}catch(Exception $ex){
				return $ex;
			}		
			
		}
    
    public function getMatchingPatients($searchString,$page,$records_per_page=10){
        $this->load->database();
        
        if($searchString == NULL)
        {
            $where = ' ';
        }
        else
        {
            $where = ' WHERE name LIKE \'%'.$searchString.'%\' OR medical_record_no LIKE \'%'.$searchString.'%\' ';
        }
        
        $query = $this->db->query("SELECT session_id,name,medical_record_no,survey_completed FROM tbl_patient_sessions"
        .$where.
        "ORDER BY created_at DESC LIMIT " . $records_per_page . " OFFSET ". $records_per_page*($page-1));
        
        if($query->num_rows() > 0){
          $res = $query->result_array();
          return $res;
        }
        else{
          return array();
        }       
    }
    
    public function getMatchingPatientsCount($searchString)
    {
        $this->load->database();
        
        if($searchString == NULL)
        {
            $where = ' ';
        }
        else
        {
            $where = ' WHERE name LIKE \'%'.$searchString.'%\' OR medical_record_no LIKE \'%'.$searchString.'%\' ';
        }
        
        $res_params_cnt = $this->db->query("SELECT count(*) AS cnt FROM tbl_patient_sessions" . $where);
        $res_params_cnt = $res_params_cnt->row_array();
        $num_records = $res_params_cnt['cnt'];
        
        return $num_records;
    }
		
		public function generateSession($patient_health_params){
			try{
			   $this->load->database();
				$res_params_cnt = $this->db->query("SELECT count(*) AS cnt FROM tbl_health_params");
				$res_params_cnt = $res_params_cnt->row_array();
				
				$validation_str = '';
				
				for($i=1;$i<=$res_params_cnt['cnt'];$i++){
					if(!isset($patient_health_params['health_param_'.$i]))
					throw new Exception("All fields are mandatory!".$i);
					if(!isset($patient_health_params['selected_health_param_option_'.$i]))
					throw new Exception("All fields are mandatory!".$i);					
				}
				while(1){
					$session_id = rand(1000000000, 9999999999);
					$res_session_id = $this->db->query("SELECT * FROM tbl_patient_sessions 
											WHERE session_id = '".$session_id."'");
					if($res_session_id->num_rows() == 0)
					break;
				}
				$res_create_session = $this->db->query("INSERT INTO tbl_patient_sessions (session_id, name, medical_record_no, age, platelets, created_at)  VALUES ('".$session_id."', '".$patient_health_params['patient_name']."', '".$patient_health_params['medical_record_no']."', '".$patient_health_params['age']."', '".$patient_health_params['platelets']."',NOW() )");
				for($i=1; $i<=$res_params_cnt['cnt'];$i++){
					$this->db->query("INSERT INTO tbl_patient_health_params (session_id, health_param_id, selected_health_param_option_id, created_at) VALUES ('".$session_id."', '".$patient_health_params['health_param_'.$i]."', '".$patient_health_params['selected_health_param_option_'.$i]."', NOW())");
				}
				return $session_id;
			}catch(Exception $ex){
				return $ex;
			}
		}
		
		/*public function updateSession($patient_health_params){
		
		}*/
		
		public function getReport($session_id){
			 $this->load->database();
			 $points = array();
			$res_age_platelets = $this->db->query("SELECT age, platelets FROM tbl_patient_sessions WHERE session_id='".$session_id."'");
			
			if($res_age_platelets->num_rows() == 0)
			{
			  return null;
			}
			
			$row_age_platelets = $res_age_platelets->row_array();
			$points['age'] = $row_age_platelets['age'];
			$points['platelets'] = $row_age_platelets['platelets'];
			$res_points = $this->db->query("SELECT HPO.points,HP.id FROM tbl_patient_health_params PHP
							   JOIN tbl_health_params_options HPO ON HPO.id = PHP.selected_health_param_option_id
							   JOIN tbl_health_params HP ON HP.id = HPO.health_param_id
							   WHERE PHP.session_id = '".$session_id."' ");
			
			foreach($res_points->result_array() as $row_points){
				$points[$row_points['id']] = $row_points['points'];
			}
			$dead = exp(-2.5683+(0.0434*$points['age'])+(-0.00293*$points['platelets'])+(1.2497*$points[1])+(0.914*$points[2])+(0.6918*((2-$points[3])-1)))/(1+exp(-2.5683+(0.0434*$points['age'])+(-0.00293*$points['platelets'])+(1.2497*$points[1])+(0.914*$points[2])+(0.6918*((2-$points[3])-1))));
			$response = array("dead" => round(($dead*100),0), "nursing_home" => round(((((1-$dead)*0.15)/0.5)*100),0), "dependent_on_others" => round(((((1-$dead)*0.25)/0.5)*100),0), "independent" => round(((((1-$dead)*0.1)/0.5)*100),0));
			return $response;
		}
		
		public function getHealthParams(){
			try{
				$this->load->database();  
				$res_health_params = $this->db->query("SELECT * FROM tbl_health_params");
				$health_params = array();
				if($res_health_params->num_rows() >0){
					foreach($res_health_params->result_array() as $row_health_params){
						$health_params[$row_health_params['id']]['health_params'] = $row_health_params;
						$res_hlth_prms_opts = $this->db->query("SELECT * FROM tbl_health_params_options WHERE health_param_id = '".$row_health_params['id']."'");
						$health_param_opts = array();
						foreach($res_hlth_prms_opts->result_array() as $row_hlth_prms_opts){
							$health_param_opts[] = $row_hlth_prms_opts;
						}
						$health_params[$row_health_params['id']]['health_param_options'] = $health_param_opts;		
					}
					return $health_params;
				}else{
					throw new Exception("No records found!");
				}
				
			}catch(Exception $ex){
				return $ex;
			}
		}
		
		public function getSessionIDs($search_str,$per_pg,$offset){
			try{
				$this->load->database();    
				$search = "";
				if($search_str != ''){
					$search = " WHERE session_id LIKE '%{$search_str}%' OR medical_record_no LIKE '%{$search_str}%' OR name LIKE '%{$search_str}%'";
				}
				$res_ids = $this->db->query("SELECT SQL_CALC_FOUND_ROWS * FROM tbl_patient_sessions".$search." ORDER BY session_id DESC LIMIT $offset,$per_pg");
				$notemp = $this->db->query('SELECT found_rows() as count');
				$no = $notemp->row_array();
				
				$session_ids = array();
				if($res_ids->num_rows() > 0){
					foreach($res_ids->result_array() as $row_ids){
						$session_ids["data"][] = $row_ids;
					}					
					$session_ids["total_results"] = $no['count'];
					return $session_ids;
				}else{
					throw new Exception("No records found!");
				}
				
			}catch(Exception $ex){
				return $ex;
			}
		}
	}
	
?>