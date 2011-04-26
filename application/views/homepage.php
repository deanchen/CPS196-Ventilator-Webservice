
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<title>PMV Decision Aid Tool</title>

<link href="css/styles.css" rel="stylesheet" type="text/css" />
<link rel="apple-touch-icon" href="images/icon.jpg"/>

<meta name="apple-mobile-web-app-capable" content="yes">
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

    <div id="logo"><img src="images/logo.jpg" width="285" height="20" alt="Logo" /></div>

  </div>

  <div id="content">

    <table width="100%" border="0" cellspacing="0" cellpadding="0">

      <tr>

        <td valign="top" align="left" class="menuLeftRight">&nbsp;</td>

        <td valign="top" align="left" class="menuBg"><table width="100%" border="0" cellspacing="0" cellpadding="0">

            <tr>

              <td valign="middle" align="center" class="tab">  <a href="" class="active">Home</a> </td>

              <td valign="middle" align="center" class="tab"> <a href="doctor/">Add A Patient</a> </td>

              <td valign="middle" align="center" class="tab"><a href="doctor/view/">View Patients</a></td>


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

            <td valign="middle" align="left" class="hRight">Welcome Doctor</td>

          </tr>

        </table>

      </div>

<div class="indexContent">

<div class="home_content">

<p>This web-based decision aid is being evaluated to see what effect it has on decision making for the surrogates of patients on mechanical ventilators in the intensive care unit for longer than average.</p>



<p>This is a research tool only.</p>



<p>We ask that you please enter 5 clinical variables measured on patient mechanical ventilator day 14:  age, platelet count, any use of vasopressors at any dose, current need for dialysis, and whether or not the primary or secondary ICU admission diagnosis is related to trauma. </p>



<p>These variables will be used to calculate the patient's prolonged mechanical ventilation prognostic score.  </p>



<p>Later, the results of the decision aid will be summarized and printed for you to review.</p>



<p>Thank you for your participation in this project.</p>



<p><a href="doctor/" id="generate_sess_id" onkeypress="submit_on_enter(event)" class="button"><span>Add A Patient</span></a></p></div>

</div>

<script type="text/javascript">

function submit_on_enter(e){

  e = (window.event) ? window.event : e;

  if(e.which || e.keyCode){

    if ((e.which == 13) || (e.keyCode == 13) || (e.which == 32) || (e.keyCode == 32))

    window.location = "/doctor/";

  }

}

$id("generate_sess_id").focus();

</script>       </div>

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
