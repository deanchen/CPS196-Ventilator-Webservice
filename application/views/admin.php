 <html>
	<head>
		<script type="text/javascript" src="../js/jquery-1.5.1.min.js"></script>
	</head>
<body>
<h2>Edit Survey</h2>

<?php if($msg != null) { echo "<strong style='color:green;'>".$msg."</strong><br /><br />"; }?>

After you make a change, remember to press Enter or the "Submit" button at the bottom to save your changes!
<br /><br />The survey is divided up into question groups. A question group represents a page of questions.
<br /><br />Each question has text, and one of more answers. Selecting the "Multiple Answers" field of the question will allow multiple answers to be selected.
<br /><br />An answer has both text and a point value. This point value represent how much this answer shows the person who took the survey's inclination towards removing life support.
<br />Higher point value means more inclination towards removing life support (comfort) vs keeping life support (survival).
<br />Ex: After all questions have been answered, an overall sum of greater than or equal to 8 points means the person has a high inclination towards removing life support (comfort).
<br />Ex: After all questions have been answered, an overall sum of less than or equal to 2 points means the person has a low inclination towards removing life support (survival).
<br />Generally, an answer should give 0, 1, 2, or 3 points. 0 adds no inclination towards removing life support, while 3 adds a considerable amount of inclination towards removing life support.
<script type="text/javascript">
	var num_groups = <?php echo (count($groups)+1); ?>;
	
	<?php 
	$maxgroup = -1;
	foreach($groups as $group)
	{
		if($group['id'] > $maxgroup)
		{
			$maxgroup = $group['id'];
		} 
	} ?>
	var next_group = <?php echo ($maxgroup+1); ?>;

	<?php
	$maxoption = -1;
	$maxquestion = -1;
	foreach($groups as $key1=>$group)
	{
		foreach($group['questions'] as $key2=>$question)
		{
			
			if($question['id'] > $maxquestion)
			{
				$maxquestion = $question['id'];
			}	
				
			foreach($question['options'] as $option)
			{
				if($option['option_id'] > $maxoption)
				{
					$maxoption = $option['option_id'];
				}
			}	 
		}
	}?>
	
	var next_option = <?php echo ($maxoption+1); ?>;
	var next_question = <?php echo ($maxquestion+1); ?>;

</script>

<form id="survey_form" method="post" action="">
<?php
$i = 1;
foreach($groups as $group)
{
	echo '<br /><br /><strong>Question Group ' . $i . '</strong>&nbsp;<img onclick="deleteIt(\'group-'.$group['id'].'\');" src="../images/delete.gif" width="15" height="15" />Delete<br /><br />Question Group Header:
	<br /><input type="text" size="200" value="'.$group['title'].'" name="group-'.$group['id'].'-name"/><ul style="background-color:#AAAAAA;">';
	
	$j = 1;
	foreach($group['questions'] as $question)
	{
		echo '<li style="background-color:#CCC;">Question ' . $j . '&nbsp;<img onclick="deleteIt(\'question-'.$group['id'].'-'.$question['id'].'\');" src="../images/delete.gif" width="15" height="15" />Delete<br  />Text:';
		echo '<input type="text" size="200" value="'.$question['question'].'" name="question-'.$group['id'].'-'.$question['id'].'-text"/>';
		echo '<br /><input type="checkbox" value="1" name="question-'.$group['id'].'-'.$question['id'].'-multi" ';
		if($question['is_multi_answered'] == 1) { echo 'checked'; }
		echo '/>Allow multiple answers?<ul>';
		
		$k = 1;
		foreach($question['options'] as $option)
		{
			echo '<br /><br /><li style="background-color:#EEE;">Question ' . $j . ' - Answer ' . $k . '&nbsp;<img onclick="deleteIt(\'option-'.$group['id'].'-'.$question['id'].'-'.$option['option_id'].'\');" src="../images/delete.gif" width="15" height="15" />Delete<br />';
			echo 'Text: <input type="text" size="200" name="option-'.$group['id'].'-'.$question['id'].'-'.$option['option_id'].'-text" value="' . $option['option_value'] . '" />';
			echo '<br />Points: <input type="text" name="option-'.$group['id'].'-'.$question['id'].'-'.$option['option_id'].'-points" value="' . $option['points'] . '" /> </li>';
			$k ++;	
		}
		echo '<br /><a href="" onclick="addOption(this); return false;" id="add_option" viewoption="'.($k).'" viewquestion="'.$j.'" group="'.$group['id'].'" question="'.$question['id'].'"> Click Here to Add Another Answer to this Question</a>';
		echo '</ul></li><br /><br />';
		$j ++;
	}
	echo '<br /><a href="" onclick="addQuestion(this); return false;" id="add_question" viewquestion="'.$j.'" group="'.$group['id'].'"> Click Here to Add Another Question to this Group</a>';
	echo '</ul>';
	$i ++;
}
?>
<br /><br />
<a href="" id="add_group" onclick="addGroup(this); return false;"> Click Here to Add Another Question Group</a>
<br /><br /><input type="submit" value="Submit Changes" id="submit_button" name="submit" />
<input type="hidden" name="toDelete">
</form>

<script type = "text/javascript">
            //create a new field then append it before the add field button
            function addGroup(field)
            {
                  var new_field =
                  "<br /><br /><strong>Question Group " + num_groups + "</strong>&nbsp;<img onclick='deleteIt(\"group-"+next_group+"\");' src='../images/delete.gif' width='15' height='15' />Delete<br /><br />Question Group Header:"+
				  "<br /><input type='text' size='200' value='' name='group-"+next_group+"-name'/><ul style='background-color:#AAAAAA;'>"+
				  '<br /><a href="" onclick="addQuestion(this); return false;" id="add_question" viewquestion="1" group="'+next_group+'">Click to Add Another Question to this Group</a></ul>';
                  $(field).before(new_field);
                  num_groups ++;
                  next_group ++;
            }
      
            //create a new field then append it before the add field button
            function addOption(field)
            {
                var group = $(field).attr('group');
                var question = $(field).attr('question');
                var viewquestion = $(field).attr('viewquestion');
                var viewoption = $(field).attr('viewoption');
                
                var new_field =
                '<br /><li style="background-color:#EEE;">Question ' + viewquestion + ' - Answer ' + viewoption + '&nbsp;<img onclick="deleteIt(\'option-'+group+'-'+question+'-'+next_option+'\');" src="../images/delete.gif" width="15" height="15" />Delete<br />'
				+ 'Text: <input type="text" size="200" name="option-'+group+'-'+question+'-'+next_option+'-text" value="" />'
				+ '<br />Points: <input type="text" name="option-'+group+'-'+question+'-'+next_option+'-points" value="0" /> </li><br />';
                $(field).before(new_field);
                $(field).attr('viewoption',(parseInt(viewoption)+1));
                next_option ++;
            }
            
            //create a new field then append it before the add field button
            function addQuestion(field)
            {
                var group = $(field).attr('group');
                var viewquestion = $(field).attr('viewquestion');
                
                var new_field = '<br /><li style="background-color:#CCC;">Question ' + viewquestion + '&nbsp;<img onclick="deleteIt(\'question-'+group+'-'+next_question+'\');" src="../images/delete.gif" width="15" height="15" />Delete<br />Text:'
				+ '<input type="text" size="200" value="" name="question-'+group+'-'+next_question+'-text"/>'
				+ '<br /><input type="checkbox" value="1" name="question-'+group+'-'+next_question+'-multi" '
				+ '/>Allow multiple answers?<ul>'
				+ '<br /><a href="" onclick="addOption(this); return false;" id="add_option" viewoption="1" viewquestion="'+viewquestion+'" group="'+group+'" question="'+next_question+'"> Click Here to Add Another Answer to this Question</a>'
				+ '</ul></li><br /><br />';
                $(field).before(new_field);
                $(field).attr('viewquestion',(parseInt(viewquestion)+1));
                next_question ++;
            }
            
            function deleteIt(command)
            {
            	var answer = confirm("Do you really want to delete this?");
 				if (answer == true)
 				{
   					$('input[name="toDelete"]').attr('value',command);
            		$('#submit_button').click();
 				}
            }
</script>
</body></html>