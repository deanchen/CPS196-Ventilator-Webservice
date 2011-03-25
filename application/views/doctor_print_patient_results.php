<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<title>PMV Decision Aid Tool</title>

<link href="/css/styles.css" rel="stylesheet" type="text/css" />

</head>
<body>
<p><a href="#" class="button" onclick="window.print();" onkeypress="submit_on_enter(event,2)" tabindex="2" ><span>Print this page</span></a>
</p><br />
<?php
  $print_content = "<html>";	
  $i=1;
  $questions_cnt=0;
  
  foreach($groups as $group)
  {
	  $print_content .= '<br /><div id="tabs-'.$i.'-2">';
	  $print_content .= '<p><strong>'.$i.'. '.$group['title'].'</strong></p>';
	  $print_content .= '<div class="indexContent">';
	  $ques_id=0;
		  foreach($group['questions'] as $question)
		  {
			  $print_content .= '<p>'.$question['question'].'</p>';
			  $questions_cnt=$questions_cnt+1;
			  $print_content .= '<div class="surveyOptions">';
			  $checkbox_flag=0;
			  $radio_flag=0;
					foreach($question['options'] as $option)
					{
						if($ques_id == 0)
						$ques_id=$question['options'][0]['question_id'];
						if($option['is_multi_answered'])
						{
							if($checkbox_flag == 0)
							{
								$print_content .= '<input type="hidden" id="survey_ques_check_opts_'.$option['question_id'].'" name="survey_ques_check_opts_'.$option['question_id'].'" value="'.$option['option_id'].','.count($question['options']).','.$question['question'].'"/>';
								$checkbox_flag=1;
							}
							$print_content .= '<input type="checkbox"';
							if($option['option_id'] == $option['selected_option_id'])
							$print_content .= 'checked="checked"';
							$print_content .= 'name="survey_ques_check_'.$option['option_id'].'" id="survey_ques_'.$option['option_id'].'" value="'.$option['question_id'].','.$option['option_id'].'" class="surveyRadio" />';
						}
						else
						{
							if($radio_flag == 0)
							{
								$print_content .= '<input type="hidden" id="survey_ques_radio_opts_'.$option['question_id'].'" name="survey_ques_radio_opts_'.$option['question_id'].'" value="'.$question['question'].'"/>';
								$radio_flag=$i;
							}
							$print_content .= '<input type="radio"';
							if($option['option_id'] == $option['selected_option_id'])
							$print_content .= ' checked="checked"';
							$print_content .= 'name="survey_ques_radio_'.$option['question_id'].'" id="survey_ques_'.$option['option_id'].'" value="'.$option['question_id'].','.$option['option_id'].'" class="surveyRadio" />';
						}
						$print_content .= '<label for="radio">'.$option['option_value'].'</label><br />';
						if($option['break_required'])
						$print_content .= '<br/>';
		  			} 
		  	$print_content .= '</div>';
		  } 
		  $print_content .= '</div>';
		$i=$i+1;
  }
  
  $print_content .= '<style> .alert{ 	background-color:#e0dede; 	padding:10px; 	font-size:16px; 	margin:5px; 	margin-bottom:40px; } #slider-div{ 	margin:0 auto; 	width:810px; 	padding-top:5px; 	position:relative; } #slider{ 	margin:0 auto; 	background-color:#68c054; 	height:28px; 	width:810px; 	 } #slider_arrow{ 	position:absolute; 	top:-6px; 	left:0px; } #sliderArrow{ 	margin-bottom:10px; } #sliderSteps{ 	margin:0 auto; 	height:28px; 	width:810px; 	color:#00ace4; 	font-size:16px; 	font-weight:bold; 	padding:5px; 	margin-bottom:90px; } </style> <div> <br/> <p>This figure shows what direction the patient\'s family may be leaning in their decision about treatment goals for their loved one.<br />On the far left side of the line below is comfort care. The far right represents doing everything possible for survival.<br/>The BLUE TRIANGLE on the line shows where they might be leaning based on their answers to the survey questions.</p><br/>
   </div> <div  id="slider-div">   <div id="slider"> </div>    <img src="/images/arrow.png" style="left:'.$top_incr_px.';" id="slider_arrow"  />   <div id="sliderArrow"></div> </div> <div id="sliderSteps">   <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">     <tr>       <td valign="top" align="left" colspan="3"></td>     </tr>     <tr>       <td valign="top" align="left" width="25%">Comfort</td>        <td valign="top" align="center">Survival but no <br/>         prolonged life support</td>       <td valign="top" align="right" width="25%">Survival at All Cost</td>     </tr>   </table> </div>';
  
echo $print_content;  
?>
</body>
</html>
