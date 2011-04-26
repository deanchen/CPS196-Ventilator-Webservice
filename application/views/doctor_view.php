<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>PMV Decision Aid Tool</title>
		<?php 
			#$request_url = explode('/', $_SERVER['REQUEST_URI']); 
			#$subdir = $request_url[1];
			$subdir = "api";
		?>
		<link href="/<?php echo $subdir; ?>/css/styles.css" rel="stylesheet" type="text/css" />
		<link rel="apple-touch-icon" href="/<?php echo $subdir; ?>/images/icon.jpg"/>
<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="format-detection" content="telephone=no">
		<style>
			.ieDiv {
				display:none;
			}
		</style>
		<!--[if lte IE 6]>
		<style>
		.ieDiv{
		background-color:#808080;
		color:#000000;
		display:block;
		text-align:center;
		width:100%;
		height:100%;
		padding-top:10px;
		}
		.content_div{
		display:none;
		}
		</style>
		<![endif]-->
		<script type="text/javascript">
		function $id(id){
			return document.getElementById(id);
		}
		
		function radio_group_val(id){
			for(var i=0;i<document.getElementsByName(id).length;i++){
				var chked = 0;
				if(document.getElementsByName(id)[i].checked){
					chked=1;
					break;
				}
			}
			if(!chked) return false;
			else
			return true;
		}
		</script>
	</head>
	
	<body>
		
	<div class="ieDiv">
	<h1><strong>You are using older version of Internet Explorer. <br/>
	<br/>
	Please upgrade your browser <br/>
	<br/>
	or use mozilla, chrome or any other browser</strong></h1>
	</div>
	<div id="container" class="content_div">
	<div id="header">
	<div id="logo"><img src="/<?php echo $subdir; ?>/images/logo.jpg" width="285" height="20" alt="Logo" /></div>
	</div>
	<div id="content">
		
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	<td valign="top" align="left" class="menuLeftRight">&nbsp;</td>
	<td valign="top" align="left" class="menuBg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	<td valign="middle" align="center" class="tab">  <a href="../../" >Home</a> </td>
	<td valign="middle" align="center" class="tab"> <a href="../">Add A Patient</a> </td>
	<td valign="middle" align="center" class="tab"><a href="" class="active">View Patients</a></td>
	</tr>
	</table></td>
	<td valign="top" align="left" class="menuLeftRight">&nbsp;</td>
	</tr>
	</table>
	<div id="menuContent">
	<div id="tabContent"></div>
	<div id="tabContentClose">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr>
	<td class="cbl3">&nbsp;</td>
	<td class="cbm3">&nbsp;</td>
	<td class="cbr3">&nbsp;</td>
	</tr>
	</table>
	</div>
	</div>
	<div id="menuContentClose">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr>
	<td class="cbl2">&nbsp;</td>
	<td class="cbm2">&nbsp;</td>
	<td class="cbr2">&nbsp;</td>
	</tr>
	</table>
	</div>
	</div>
	<div id="contentPanelTop2">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	<td valign="top" align="left" class="ctl">&nbsp;</td>
	<td valign="top" align="left" class="ctm">&nbsp;</td>
	<td valign="top" align="left" class="ctr">&nbsp;</td>
	</tr>
	</table>
	</div>
	<div id="contentPanel3">
	<div id="workArea">       <div class="heading">
	<table width="50%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	<td valign="top" align="left" class="hLeft">&nbsp;</td>
	<td valign="middle" align="left" class="hRight">Patients Added</td>
	</tr>
	</table>
	</div>
	<p class="serchBox" align="right">
	<input type="text" name="search_str" tabindex="1" id="search_str" onkeypress="submit_on_enter(event)" class="inputFld" value="<?php echo $searchString;
	?>" />
	<a class="button" href="#" onclick="submit_search()" tabindex="2" onkeypress="submit_on_enter(event)"><span>Search</span></a>
	</p>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	<td valign="middle" align="left" class="rowHd">Patient Name</td>
	<td valign="middle" align="left" class="rowHd">Medical Record Number</td>
	<td valign="middle" align="left" class="rowHd">Take The Survey</td>
	<td valign="middle" align="left" class="rowHd">Results</td>
	</tr>
	<?php
	$i = '2';
	foreach($records as $record) {
		if($i == '2') {
			$i = '';
		} else {
			$i = '2';
		}
		if(!$record['survey_completed']) {
			$session_id = $record['session_id'];
		} else {
			$session_id = $record['session_id'];
		}
		echo '<tr>
		<td valign="middle" align="left" class="rowFld' . $i . '">' . $record['name'] . '</td>
		<td valign="middle" align="left" class="rowFld' . $i . '">' . $record['medical_record_no'] . '</td>
		<td valign="middle" align="left" class="rowFld' . $i . '"><a href="#" onclick="window.location.href=\'/api/survey/?session_id=' . $record['session_id'] . '\'">Survey</a></td>
		<td valign="middle" align="left" class="rowFld' . $i . '">';
		if($record['survey_completed']) {
			echo '<a href="/' . $subdir . '/doctor/patient/' . $record['session_id'] . '">Click to view survey result</a>';
		} else {
			echo 'Survey not finished yet';
		}
		echo '</td></tr>';
	}
	?>
	</table>
	<?php
	if($pages > 1) {
		if($searchString != NULL) {
			$search_str = '/' . $searchString;
		} else {
			$search_str = '';
		}
		echo '<p align="right" class="pagination"><a href="/' . $subdir . '/doctor/view/' . ($this_page_number - 1) . $search_str . '" class="pagination_anchor"><b>Previous</b></a>';
		for($i = 1; $i <= $pages; $i++) {
			if($i == $this_page_number) {
				echo '&nbsp;<span class=""><b>' . ($i) . '</b>';
			} else {
				echo '</span>&nbsp;<a href="/' . $subdir . '/doctor/view/' . ($i) . $search_str . '" class="pagination_anchor" >' . ($i) . '</a>';
			}
		}
		echo '&nbsp;<a href="/' . $subdir . '/doctor/view/' . ($this_page_number + 1) . $search_str . '" class="pagination_anchor"><b>Next</b></a></p>';
	}?>
	<form action="http://test.teamkollab.com/pmv/index.php?p=doctor.create_patient_session" method="post" id="submit_session_form">
	<input type="hidden" name="session_id" id="session_id" value=""/>
	</form>
	<script type="text/javascript">
		function submit_search(){
			var search_str = $id("search_str").value;
			var url = "/<?php echo $subdir; ?>/doctor/view/1/"+urlencode(search_str);
			window.location = url;
		}
		
		function urlencode(str) {
			return escape(str).replace(/\+/g,'%2B').replace(/%20/g, '-').replace(/\*/g, '%2A').replace(/\//g, '%2F').replace(/@/g, '%40');
		}
		
		function submit_on_enter(e){
			e = (window.event) ? window.event : e;
			if(e.which || e.keyCode){
				if ((e.which == 13) || (e.keyCode == 13))
				submit_search();
			}
		}
		
		$id("search_str").focus();
	</script>
			</div>
			</div>
			<div id="contentPanelBottom3">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td valign="top" align="left" class="cbl">&nbsp;</td>
						<td valign="top" align="left" class="cbm">&nbsp;</td>
						<td valign="top" align="left" class="cbr">&nbsp;</td>
					</tr>
				</table>
			</div>
			<div id="footer">
			</div>
		</div>
	</body>
</html>
