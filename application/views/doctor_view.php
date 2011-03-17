
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<title>PMV Decision Aid Tool</title>

<link href="/css/styles.css" rel="stylesheet" type="text/css" />

<style>

.ieDiv{

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

  if(!chked)

  return false;

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

    <div id="logo"><img src="/images/logo.jpg" width="285" height="20" alt="Logo" /></div>

  </div>

  <div id="content">

    <table width="100%" border="0" cellspacing="0" cellpadding="0">

      <tr>

        <td valign="top" align="left" class="menuLeftRight">&nbsp;</td>

        <td valign="top" align="left" class="menuBg"><table width="100%" border="0" cellspacing="0" cellpadding="0">

            <tr>

           <td valign="middle" align="center" class="tab">  <a href="/" >Home</a> </td>

              <td valign="middle" align="center" class="tab"> <a href="/doctor/">Add A Patient</a> </td>

              <td valign="middle" align="center" class="tab"><a href="/doctor/view/" class="active">View Patients</a></td>
              
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

          <input type="text" name="search_str" tabindex="1" id="search_str" onkeypress="submit_on_enter(event)" class="inputFld" value="<?php echo $searchString; ?>" />

          <a class="button" href="#" onclick="submit_search()" tabindex="2" onkeypress="submit_on_enter(event)"><span>Search</span></a>

        </p>

        <table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td valign="middle" align="left" class="rowHd">Patient Name</td>

    <td valign="middle" align="left" class="rowHd">Session ID</td>

    <td valign="middle" align="left" class="rowHd">Medical Record Number</td>

    <td valign="middle" align="left" class="rowHd">Website link</td>

  </tr>

   <?php foreach($records as $record)
  {           
    echo
    '<tr>
  
      <td valign="middle" align="left" class="rowFld">'. $record['name'] .'</td>
  
      <td valign="middle" align="left" class="rowFld">'. $record['session_id'] .'</td>
  
      <td valign="middle" align="left" class="rowFld">'. $record['medical_record_no'] .'</td>
  
      <td valign="middle" align="left" class="rowFld">';
      
      if($record['survey_completed'])
      {
         echo '<a href="/doctor/patient/'.$record['session_id'].'">Click to view survey result</a>';
      }
      else
      {
        echo 'Survey not finished yet';    
      }
      echo '</td></tr>';
    } ?>
  
  </table>

<?php if($pages > 1)
{

  echo '<p align="right" class="pagination"><a href="/doctor/view/'.($this_page_number-1).'" class="pagination_anchor"><b>Previous</b></a>';
  
  for($i = 1; $i <= $pages; $i ++)
  {
     if($i == $this_page_number)
     {
       echo '&nbsp;<span class=""><b>'.($i).'</b>';
     }
     else
     {
       echo '</span>&nbsp;<a href="/doctor/view/'.($i).'" class="pagination_anchor" >'.($i).'</a>';
     }
  }
  
  echo '&nbsp;<a href="/doctor/view/'.($this_page_number+1).'" class="pagination_anchor"><b>Next</b></a></p>';
}?>

<form action="http://test.teamkollab.com/pmv/index.php?p=doctor.create_patient_session" method="post" id="submit_session_form">

  <input type="hidden" name="session_id" id="session_id" value=""/>

</form>

<script type="text/javascript">

function submit_search(){

  var search_str = $id("search_str").value;

  var url = "/doctor/view/1/"+search_str;

  window.location = url;

}

function submit_on_enter(e){

   e = (window.event) ? window.event : e;

  if(e.which || e.keyCode){

    if ((e.which == 13) || (e.keyCode == 13) || (e.which == 32) || (e.keyCode == 32))

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

  <div id="footer"></div>

</div>

</body>

</html>