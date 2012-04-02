function findemp(op){
if (op=="")
  {
  document.getElementById("user").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("user").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","user.php?user="+op,true);
xmlhttp.send();
}
 function empdetail(name){
if (name=="")
  {
  document.getElementById("detail").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("detail").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","edit_emp_detail.php?id="+name,true);
xmlhttp.send();

}
function slip(op){
if (op=="")
  {
  document.getElementById("slip").innerHTML="Atleast Select an Option!!!!";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("slip").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","slipop.php?op="+op,true);
xmlhttp.send();
}