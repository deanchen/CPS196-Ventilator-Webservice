
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

              <td valign="middle" align="center" class="tab"> <a href="/doctor/" class="active">Add A Patient</a> </td>

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

    <div id="workArea">       <form action="/doctor/submit/" method="post" name="patient_details_form" id="patient_details_form" onsubmit="validate();">

  <div class="heading">

    <table width="50%" border="0" cellspacing="0" cellpadding="0">

      <tr>

        <td valign="top" align="left" class="hLeft">&nbsp;</td>

        <td valign="middle" align="left" class="hRight">Enter Patient Details</td>

      </tr>

    </table>

  </div>

  <p class="label">Name</p>

  <div class="surveyOptions">

    <input type="text" name="params[patient_name]" id="patient_name" value="" class="inputFld" />

  </div>

  <p class="label">Medical Record Number</p>

  <div class="surveyOptions">

    <input type="text" name="params[medical_record_no]" id="medical_record_no" value="" class="inputFld" />

  </div>

  <p class="label">Age</p>

  <div class="surveyOptions">

    <input type="text" name="params[age]" id="patient_age" value="" class="inputFld" />

  </div>

  <p class="label">Platelets</p>

  <div class="surveyOptions">

    <input type="text" name="params[platelets]" id="platelets" value="" class="inputFld" />

  </div>

    <p class="label">On Vasopressors </p>

    <div class="surveyOptions">

    <input type="hidden" id="params[health_param_1]" name="params[health_param_1]" value="1"/>

        <input type="radio" name="params[selected_health_param_option_1]" id="radio" value="1" class="surveyRadio" />

    <label for="radio">Yes</label>

        <input type="radio" name="params[selected_health_param_option_1]" id="radio" value="2" class="surveyRadio" />

    <label for="radio">No</label>

     </div>

    <p class="label">Receiving hemodialysis</p>

    <div class="surveyOptions">

    <input type="hidden" id="params[health_param_2]" name="params[health_param_2]" value="2"/>

        <input type="radio" name="params[selected_health_param_option_2]" id="radio" value="3" class="surveyRadio" />

    <label for="radio">Yes</label>

        <input type="radio" name="params[selected_health_param_option_2]" id="radio" value="4" class="surveyRadio" />

    <label for="radio">No</label>

     </div>

    <p class="label">Trauma</p>

    <div class="surveyOptions">

    <input type="hidden" id="params[health_param_3]" name="params[health_param_3]" value="3"/>

        <input type="radio" name="params[selected_health_param_option_3]" id="radio" value="5" class="surveyRadio" />

    <label for="radio">Yes</label>

        <input type="radio" name="params[selected_health_param_option_3]" id="radio" value="6" class="surveyRadio" />

    <label for="radio">No</label>

     </div>

    <input type="hidden" value="3" id="questions_count" name="questions_count"/>

  <div class="surveyOptions">

  <p> <a href="#" class="button" onclick="validate()" onkeypress="submit_on_enter(event)" ><span>Submit</span></a></p></div>

</form>

<script type="text/javascript">

function is_int(value){ 
  if((parseFloat(value) == parseInt(value)) && !isNaN(value)){
      return true;
  } else { 
      return false;
  } 
}

function validate(){

  if($id("patient_name").value == ''){

    alert("Please enter patient name.");

    $id("patient_name").focus();

    return false;

  }

  if($id("medical_record_no").value == ''){

    alert("Please enter medical record number.");

    $id("medical_record_no").focus();

    return false;

  }
  
  if(!is_int($id("patient_age").value)){

    alert("Please enter a numeric age.");

    $id("patient_age").focus();

    return false;

  }
  
  if(!is_int($id("platelets").value)){

    alert("Please enter a numeric platelet count.");

    $id("platelets").focus();

    return false;

  }

        if(!radio_group_val("params[selected_health_param_option_1]")){

        alert("Please select a value for On Vasopressors ");

        return false;

      }

        if(!radio_group_val("params[selected_health_param_option_2]")){

        alert("Please select a value for Receiving hemodialysis");

        return false;

      }

        if(!radio_group_val("params[selected_health_param_option_3]")){

        alert("Please select a value for Trauma");

        return false;

      }

    $id("patient_details_form").submit();

}

function submit_on_enter(e){

   e = (window.event) ? window.event : e;

  if(e.which || e.keyCode){

    if ((e.which == 13) || (e.keyCode == 13) || (e.which == 32) || (e.keyCode == 32))

    validate();

  }

}

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
