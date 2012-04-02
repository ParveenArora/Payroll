<?php
session_start();
if($_SESSION['user']!='admin') {
    header('location:../checklogin/error.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Sidhu Fabrication Company</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="../css/style.css" rel="stylesheet" type="text/css" />
        <link href="tablecloth/tablecloth.css" rel="stylesheet" type="text/css" media="screen" />
        <script type="text/javascript" src="tablecloth/tablecloth.js"></script>
        <script type="text/javascript" src="scripts/validate.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/coin-slider.css" />
        <link rel="stylesheet" type="text/css" href="../css/superfish.css" media="screen" />
        <script type="text/javascript" src="../js/menu.js"></script>
        <script type="text/javascript" src="../js/footer.js"></script>
        <script type="text/javascript" src="../js/sidebar.js"></script>
        <script type="text/javascript">
            function verify(){
                var id= document.forms["slip"]["empid"];
                var name= document.forms["slip"]["empname"];
                var m= document.forms["slip"]["month"];
                var y= document.forms["slip"]["year"];
                if(id.value!='' && name.value!=''){
                    alert('You can not enter both fields together');
                    id.value='';
                    name.value='';
                    id.focus()
                    return false;
                }
                if((m.value!='' && y.value!='')&&(document.slip.current.checked==true)){
                    alert('You can not select both time field');
                    m.value='';
                    y.value='';
                    document.slip.current.checked=false;
                    m.focus()
                    return false;
                }
                if((m.value=='' && y.value=='')&&(document.slip.current.checked==false)){
                    alert('You have to select one of time field');
                    m.focus()
                    return false;
                }
                else if((id.value!='')&&(m.value=='' && y.value=='')&&(document.slip.current.checked==false)){
                    alert('Please Select One of option for time');
                    m.focus();
                    return false;
                }
                else if((name.value!='')&&(m.value=='' && y.value=='')&&(document.slip.current.checked==false)){
                    alert('Please Select One of option for time');
                    m.focus();
                    return false;
                }
                else if((id.value!='')&&(m.value!='' && y.value=='')&&(document.slip.current.checked==false)){
                    alert('Please Select Year');
                    y.focus();
                    return false;
                }
                else if((name.value!='')&&(m.value!='' && y.value=='')&&(document.slip.current.checked==false)){
                    alert('Please Select Year');
                    y.focus();
                    return false;
                }
                else if((id.value!='')&&(m.value=='' && y.value!='')&&(document.slip.current.checked==false)){
                    alert('Please Select Month');
                    m.focus();
                    return false;
                }
                else if((name.value!='')&&(m.value=='' && y.value!='')&&(document.slip.current.checked==false)){
                    alert('Please Select Month');
                    m.focus();
                    return false;
                }
                else if((id.value!='')&&(m.value!='' && y.value=='')&&(document.slip.current.checked==true)){
                    alert('Please Select only one option');
                    m.value='';
                    y.value='';
                    document.slip.current.checked=false;
                    m.focus();
                    return false;
                }
                else if((id.value!='')&&(m.value=='' && y.value!='')&&(document.slip.current.checked==true)){
                    alert('Please Select only one option');
                    m.value='';
                    y.value='';
                    document.slip.current.checked=false;
                    m.focus();
                    return false;
                }
                else if((name.value!='')&&(m.value=='' && y.value!='')&&(document.slip.current.checked==true)){
                    alert('Please Select only one option');
                    m.value='';
                    y.value='';
                    document.slip.current.checked=false;
                    m.focus();
                    return false;
                }
                else if((name.value!='')&&(m.value!='' && y.value=='')&&(document.slip.current.checked==true)){
                    alert('Please Select only one option');
                    m.value='';
                    y.value='';
                    document.slip.current.checked=false;
                    m.focus();
                    return false;
                }
            }
        </script>
        <script type="text/javascript" src="../js/cufon-yui.js"></script>
        <script type="text/javascript" src="../js/cufon-quicksand.js"></script>
        <script type="text/javascript" src="../js/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="scripts/ajax.js"></script>
        <script type="text/javascript" src="../js/script.js"></script>
        <script type="text/javascript" src="../js/coin-slider.min.js"></script>
        <script type="text/javascript" src="../js/hoverIntent.js"></script>
        <script type="text/javascript" src="../js/superfish.js"></script>
        <script type="text/javascript">

            // initialise plugins
            jQuery(function(){
                jQuery('ul.sf-menu').superfish();
            });

        </script>
    </head>
    <body>
        <div class="main">
            <div class="header">
                <div class="header_resize">
                    <div class="logo">
                        <h1><a href="adminhome.php">Payroll Management System<small>A Sidhu const. ERP System</small></a></h1>
                    </div>

                    <div class="clr"></div>
                    <script type="text/javascript">menue();</script>
                    <br/>
                    <div class="clr"></div>

                </div>
                <div class="content">
                    <div class="content_resize">
                        <div class="mainbar">
                            <div class="article">
                                <br />
                                <span style="float: left;"><a href="javascript:history.go(-1)"><img src="../images/back.png" width="30px" height="30px" alt="BACK" title="Back"></img></a></span>
                                <span style="float: right;"><a href="adminhome.php">Home<img src="../images/home.png" width="30px" height="30px"></img></a></span>
                                <br />
                                <h2><span>Generate Salary Slip</span></h2>

                                <?php
                                echo '<form method="post" name="slip" action="slipdownload.php">';
                                echo '<table style="width:55%; margin-right:auto; margin-left:auto;">';
                                echo '<tr><th colspan="2">Enter Following Credentials</th></tr>';
                                echo '<tr><td>Enter Employee ID</td><td><input type="text" name="empid" value=""></td></tr>';
                                echo '<tr><td colspan="2">OR</td></tr>';
                                echo '<tr><td>Enter Employee Name <br/><b>(Please separate first and last name by space)<b></td><td><input type="text" name="empname" value=""></td></tr>';
                                echo '<tr><td>Select Month and Year</td>';
                                echo '<td><select name="month"><option value="">Select Month</option><option value="1">Jan</option>';
                                echo '<option value="2">Feb</option><option value="3">Mar</option><option value="4">Apr</option><option value="5">May</option>';
                                echo '<option value="6">Jun</option><option value="7">Jul</option><option value="8">Aug</option><option value="9">Sep</option>';
                                echo '<option value="10">Oct</option><option value="11">Nov</option><option value="12">Dec</option></select>';
                                echo '<select name="year">';

                                $year= date('Y');
                                echo '<option value="">Select Year</option>';
                                if($year=='2011') {
                                    echo '<option value="2011">2011</option>';
                                }
                                if($year>2011) {
                                    while($year>=2011) {
                                        echo '<option value="'.$year.'">'.$year.'</option>';
                                        $year=$year-1;
                                        if($year>=2011) {
                                            continue;
                                        }
                                        else {
                                            break;
                                        }
                                    }
                                }
                                echo '</select></td></tr>';
                                echo '<tr><td>Check the Latest only</td>';
                                echo '<td><input type="radio" value="current" name="current"/>Current</td></tr>';
                                echo '<tr><td colspan="2">OR</td></tr>';
                                echo '<tr><td colspan="2"><b>Select Download only to Download Complete List</b></td></tr>';
                                echo '<tr><td colspan="2"><input type="submit" value="Download" onclick="return verify();"></td></tr>';
                                echo '</table>';
                                ?>


                                <br/>
                            </div>


                        </div>

                        <div class="clr"></div>
                    </div>
                </div><br />
                <div id="disclaimer">
                    <script type="text/javascript">footere();</script>
                </div>
            </div>
        </div>
    </body>
</html>
