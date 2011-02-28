
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<title>PMV Decision Aid Tool</title>

<link href="http://test.teamkollab.com/pmv/themes/default/css/styles.css" rel="stylesheet" type="text/css" />

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

var THEME_PATH = 'http://test.teamkollab.com/pmv/themes/default/';

var ROOT_PATH = 'http://test.teamkollab.com/pmv/';

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

    <div id="logo"><img src="http://test.teamkollab.com/pmv/themes/default/images/logo.jpg" width="285" height="20" alt="Logo" /></div>

  </div>

  <div id="content">

    <table width="100%" border="0" cellspacing="0" cellpadding="0">

      <tr>

        <td valign="top" align="left" class="menuLeftRight">&nbsp;</td>

        <td valign="top" align="left" class="menuBg"><table width="100%" border="0" cellspacing="0" cellpadding="0">

            <tr>

              <td valign="middle" align="center" class="tab1">  <a href="http://test.teamkollab.com/pmv/index.php?p=doctor.home">Home</a> </td>

              <td valign="middle" align="center" class="tab"> <a href="http://test.teamkollab.com/pmv/index.php?p=doctor.session_ids" class="active">Session ID</a> </td>

              <td valign="middle" align="center" class="tab3">&nbsp;</td>

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

      <td valign="middle" align="left" class="hRight">Success - New session ID generated</td>

    </tr>

  </table>

</div>

<div class="indexContent">

<p><strong>Session ID:</strong> <b><?php echo $id; ?></b></p>

<p><strong>Website link for the Family Member:</strong> <a href="#" tabindex="1" id="user_link" onkeypress="submit_on_enter(event,1)" onclick="submit_session_id(1166530942);">http://test.teamkollab.com/pmv/index.php?p=user.welcome</a></p>

<p><a href="#" class="button" onclick="window.print();" onkeypress="submit_on_enter(event,2)" tabindex="2" ><span>Print this page</span></a> </p>

</div>

<form action="http://test.teamkollab.com/pmv/index.php?p=doctor.create_patient_session" method="post" id="submit_session_form">

  <input type="hidden" name="session_id" id="session_id" value=""/>

</form>

<script type="text/javascript">

function submit_session_id(id){

  $id("session_id").value = id;

  $id("submit_session_form").submit();

}

function submit_on_enter(e,index){

   e = (window.event) ? window.event : e;

  if(e.which || e.keyCode){

    if ((e.which == 13) || (e.keyCode == 13) || (e.which == 32) || (e.keyCode == 32)){

      if(index == 1)

      window.location = "http://test.teamkollab.com/pmv/index.php?p=user.welcome";

      else

      window.print();   

    }

  }

}

$id("user_link").focus();

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
