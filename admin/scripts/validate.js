
function validateForm()
{
var n=document.forms["add_emp"]["fname"].value;
if (n==null || n=="")
  {
  alert("Employee First Name must be filled out");
  document.forms["add_emp"]["fname"].focus();
  return false;
  }
  var ln=document.forms["add_emp"]["lname"].value;
if (ln==null || ln=="")
  {
  alert("Employee Last Name must be filled out");
  document.forms["add_emp"]["lname"].focus();
  return false;
  }
var g= document.forms["add_emp"]["gross"].value;
var h= document.forms["add_emp"]["hra"].value;
var numericExpression = /^[0-9]+$/;
 if(g==null || g==""){
    alert("Please insert Gross Pay ");
    document.forms["add_emp"]["gross"].focus();
    return false;
  }
  if(numericExpression.test(g)){
    document.forms["add_emp"]["hra"].focus();
  }
  else{
    alert("Please enter numeric");
    document.forms["add_emp"]["gross"].value= "";
    document.forms["add_emp"]["gross"].focus();
    return false;
  }
 if(h==null || h==""){
    alert("Enter HRA");
    document.forms["add_emp"]["hra"].focus();
    return false;
  }
  if(numericExpression.test(h)){
    return true;
  }
  else{
    alert("Please enter numeric");
    document.forms["add_emp"]["hra"].value= "";
    document.forms["add_emp"]["hra"].focus();
    return false;
  }
  }
 function validateedit()
{
var n=document.forms["update"]["fname"].value;
if (n==null || n=="")
  {
  alert("Employee First Name must be filled out");
  document.forms["update"]["fname"].focus();
  return false;
  }
  var ln=document.forms["update"]["lname"].value;
if (ln==null || ln=="")
  {
  alert("Employee Last Name must be filled out");
  document.forms["update"]["lname"].focus();
  return false;
  }
var g= document.forms["update"]["gross"].value;
var numericExpression = /^[0-9]+$/;
 if(g==null || g==""){
    alert("Please insert Gross Pay ");
    document.forms["update"]["gross"].focus();
    return false;
  }
  if(numericExpression.test(g)){
    document.forms["update"]["hra"].focus();
  }
  else{
    alert("Please enter numeric");
    document.forms["update"]["gross"].value= "";
    document.forms["update"]["gross"].focus();
    return false;
  }
  var h= document.forms["update"]["hra"].value;
  if(h==null || h==""){
    alert("Enter HRA");
    document.forms["update"]["hra"].focus();
    return false;
  }
  if(numericExpression.test(h)){
    return true;
  }
  else{
    alert("Please enter numeric");
    document.forms["update"]["hra"].value= "";
    document.forms["update"]["hra"].focus();
    return false;
  }
  }
  function checkdel(){
      var check= confirm("Are your sure you want to delete");
      if(check== true){
          return true;
      }
      else{
          return false;
      }
  }
