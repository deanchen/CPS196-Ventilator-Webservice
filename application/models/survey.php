<?php

	class Survey extends CI_Model
	{
		public function getSurveyQuestionGroups(){
			try{
			  $this->load->database();
				$res_survey_ques = $this->db->query("SELECT id, title FROM tbl_survey_question_groups");
				if($res_survey_ques->num_rows() > 0){
					$groups = array();
					foreach($res_survey_ques->result_array() as $row_survey_ques){
						$groups[] = $row_survey_ques;
					}
					return $groups;
				}else{
					throw new Exception("Survey question groups not found!");
				}
			}catch(Exception $ex){
				return $ex;
			}
		}
			
		public function getSurveyQuestions($question_group_id,$session_id){
			try{
				 $this->load->database();
				 $res_survey_ques = $this->db->query("SELECT SQG.id AS groupd_id, SQG.title, SQ.id AS question_id, SQ.question, SQ.is_multi_answered, SO.id AS option_id, SO.name AS option_value, SO.points, SO.break_required, PSD.selected_option_id
										FROM tbl_survey_options SO
										JOIN tbl_survey_questions SQ ON SO.question_id = SQ.id
										JOIN tbl_survey_question_groups SQG ON SQG.id=SQ.questions_group_id
										LEFT JOIN tbl_patient_survey_data PSD ON PSD.selected_option_id=SO.id AND PSD.session_id =  '".$session_id."' 
										WHERE SQG.id='".$question_group_id."'
										GROUP BY SO.id
										ORDER BY SO.id");
				if($res_survey_ques->num_rows() > 0){
					$questions = array();
					foreach($res_survey_ques->result_array() as $row_survey_ques){
						$questions[$row_survey_ques['question_id']]['options'][] = $row_survey_ques;
						$questions[$row_survey_ques['question_id']]['question'] = $row_survey_ques['question'];
					}
					return $questions;
				}else{
					throw new Exception("Survey questions not found!");
				}
			}catch(Exception $ex){
				return $ex;
			}
		}
			
		public function getPatientSurveyData($session_id){
			try{
				   $this->load->database();
				   $res_survey_data1 = $this->db->query("SELECT * FROM tbl_patient_survey_data PSD
													JOIN tbl_survey_options SO ON PSD.selected_option_id = SO.id
													JOIN tbl_survey_questions SQ ON SO.question_id = SQ.id
													JOIN tbl_survey_question_groups SQG ON SQG.id = SQ.questions_group_id
													WHERE PSD.session_id = '".$session_id."' AND SQ.is_multi_answered=0 
													GROUP BY SQ.id
													ORDER BY SQ.id");
				$surveyData = array();
				foreach($res_survey_data1->result_array() as $row_survey_data1){
					$surveyData["not_multi_answered"][] = $row_survey_data1;
				}
				
				$res_survey_data2 = $this->db->query("SELECT SQ.id FROM tbl_survey_questions SQ
													JOIN tbl_patient_survey_data PSD ON PSD.question_id = SQ.id
													WHERE PSD.session_id = '".$session_id."'  AND SQ.is_multi_answered=1
													GROUP BY SQ.id
													ORDER BY SQ.id");
				foreach($res_survey_data2->result_array() as $row_survey_data2){
					$res_survey_data3 = $this->db->query("SELECT * FROM tbl_patient_survey_data PSD
													JOIN tbl_survey_options SO ON PSD.selected_option_id = SO.id
													JOIN tbl_survey_questions SQ ON SO.question_id = SQ.id
													JOIN tbl_survey_question_groups SQG ON SQG.id = SQ.questions_group_id
													WHERE PSD.question_id = ".$row_survey_data2['id']."	
													ORDER BY SQ.id");
					foreach($res_survey_data3->result_array() as $row_survey_data3){
						$surveyData["is_multi_answered"][] = $row_survey_data3;
					}
				}
				if(count($surveyData) >0){
					return $surveyData;
				}else{
					throw new Exception("No records found!");
				}	
			}catch(Exception $ex){
				return $ex;
			}		
		}
			
		/*public function updatePatientSurveyData(patient_survey_data){
			
		}*/
			
		public function getSurveyReport($session_id){
		  $this->load->database();
			$res_points = $this->db->query("SELECT SO.points FROM tbl_patient_survey_data PSD
							   JOIN tbl_survey_options SO ON SO.id = PSD.selected_option_id
							   JOIN tbl_survey_questions SQ ON SQ.id = SO.question_id
							   WHERE PSD.session_id = '".$session_id."' ");
			$total_points = 0;
			foreach($res_points->result_array() as $row_points){
				$total_points += $row_points['points'];
			}
			return $total_points;
		}
		
		public function isSurveyCompleted($session_id){
		  $this->load->database();
			$res_survey = $this->db->query("SELECT survey_completed FROM tbl_patient_sessions 
							   WHERE session_id = '".$session_id."' ");
			$row_survey = $res_survey->row_array();
				if($row_survey['survey_completed'])
				return true;
				else
				return false;
		}
		
		public function setSurveyResult($session_id,$question_id,$selected_option_id){
		  $this->load->database();
		  $res = $this->db->query("DELETE FROM tbl_patient_survey_data WHERE session_id='".$session_id."' AND question_id='".$question_id."'");
			
		  foreach(explode(',',$selected_option_id) as $selected_option)
		  $this->db->query("INSERT INTO tbl_patient_survey_data (session_id, question_id, selected_option_id, updated_at) VALUES ('".$session_id."', '".$question_id."', '".$selected_option."', NOW())");
		  return true;
		}
		
		public function setSurveyCompleted($session_id)
		{
		  $this->load->database();		
		  $this->db->query("UPDATE tbl_patient_sessions SET survey_completed=1 WHERE session_id = '".$session_id."' ");
		  return true;
		}
	}
	
?>