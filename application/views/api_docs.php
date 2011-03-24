<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Documentation for API</title>
	
	<style type="text/css">
	
	body {
	 background-color: #fff;
	 margin: 40px;
	 font-family: Lucida Grande, Verdana, Sans-serif;
	 font-size: 14px;
	 color: #4F5155;
	}
	
	a {
	 color: #003399;
	 background-color: transparent;
	 font-weight: normal;
	}
	
	h1 {
	 color: #444;
	 background-color: transparent;
	 border-bottom: 1px solid #D0D0D0;
	 font-size: 16px;
	 font-weight: bold;
	 margin: 24px 0 2px 0;
	 padding: 5px 0 6px 0;
	}
	
	code {
	 font-family: Monaco, Verdana, Sans-serif;
	 font-size: 12px;
	 background-color: #f9f9f9;
	 border: 1px solid #D0D0D0;
	 color: #002166;
	 display: block;
	 margin: 14px 0 14px 0;
	 padding: 12px 10px 12px 10px;
	}
	
	</style>
</head>
<body>
  <h1>How To Use the API:</h1><br/><br/>
	Get data on a patient based on session id: <code>/rest/patient/SESSION_ID_GOES_HERE</code><br />
	Get the end percentages for a patient's survival based on session id: <code>/rest/report/SESSION_ID_GOES_HERE</code><br />
	Validate if a session is real: <code>/rest/session/validate/SESSION_ID_GOES_HERE</code><br />
	Get health params: <code>/rest/health_params</code><br />
	Get survey question groups: <code>/rest/survey/groups</code><br />
	Get survey questions of a certain group for a patient: <code>/rest/survey/questions/QUESTION_GROUP_ID_GOES_HERE/SESSION_ID_GOES_HERE</code><br />
  Get specific patient's survey responses: <code>/rest/survey/patient/SESSION_ID_GOES_HERE</code><br />
  Get end points for a patient's survey responses: <code>/rest/survey/points/SESSION_ID_GOES_HERE</code><br />
  Check if survey has been completed for a specific patient: <code>/rest/survey/completed/SESSION_ID_GOES_HERE</code><br /><br />
  
  Set a survey question's answer for a patient based on session id: <code>/rest/action/<br /><br />
  Post to this page:<br/>action='update_survey_answer'<br/>session_id=SESSION_ID_GOES_HERE<br/>question_id=QUESTION_ID_GOES_HERE<br/>selected_option_id=SELECTED_OPTION_ID_GOES_HERE
  <br /><br />
  If the question has multiple answers (for checkboxes for example) all answers should be seperated by a comma.
  <br />Ie: selected_option_id=1,4,5
  </code><br />
  
  Set a survey as completed for a patient based on session id: <code>/rest/action/<br /><br />
  Post to this page:<br/>action='survey_completed'<br/>session_id=SESSION_ID_GOES_HERE</code><br />
</body>