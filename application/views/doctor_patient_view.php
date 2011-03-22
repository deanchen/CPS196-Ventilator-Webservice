
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

<div class="ieDiv"><h1><strong>You are using older version of Internet Explorer. <br/><br/>Please upgrade your browser <br/><br/>or use mozilla, chrome or any other browser</strong></h1></div>

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

           <td valign="middle" align="center" class="tab">  <a href="/" >Home</a> </td>

              <td valign="middle" align="center" class="tab"> <a href="/doctor/">Add A Patient</a> </td>

              <td valign="middle" align="center" class="tab"><a href="/doctor/view/">View Patients</a></td>
              
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

    <div id="workArea"> 	      <table cellpadding="0" cellspacing="0" border="0" width="100%">

<tr><td valign="top" height="10px">

<div class="alert">

  <p>This figure shows what direction the patient's family may be leaning in their decision about treatment goals for their loved one.</p>

  <p>On the far left side of the line below is comfort care. The far right represents doing everything possible for survival.</p>

  <p>The BLUE TRIANGLE on the line shows where they might be leaning based on their answers to the survey questions.</p>

</div>

</td></tr>

<tr><td valign="middle" style="text-align:center;" id="temp_div">

<div  id="slider-div">

  <div id="slider"> </div>

  <img src="http://test.teamkollab.com/pmv/themes/default/images/arrow.png" id="slider_arrow"  />

  <div id="sliderArrow"></div>

</div>

<div id="sliderSteps">

  <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">

    <tr>

      <td valign="top" align="left" colspan="3"></td>

    </tr>

    <tr>

      <td valign="top" align="left" width="25%">Comfort</td>

      <td valign="top" align="center">Survival but no <br/>

        prolonged life support</td>

      <td valign="top" align="right" width="25%">Survival at All Cost</td>

    </tr>

  </table>

</div>

</td></tr>

<tr><td>

<div align="right" style="float:right; margin-right:25px">

  <p> <a href="javascript:void(0);" class="button" target="_blank" onclick="window.open('/doctor/printt/<?php echo $sessionID; ?>','','scrollbars=1');return false;"><span>Print All Results</span></a></p>

</div>

</td></tr></table>

<script type="text/javascript">

var points = parseInt("<?php echo $points; ?>");

var incr =0;

if(points >= 8 && points <= 9)

incr+=191.25;

else if(points >=3 && points<=5)

incr+=573.75;

else if(points <= 2)

incr+=765;

else if(points >= 6 && points <= 7)

incr+=382.5;

$id("slider_arrow").style.left = incr+"px";



document.getElementById("temp_div").style.height = (document.height-350)+"px";

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