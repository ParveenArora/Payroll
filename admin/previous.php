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
        <script type="text/javascript" src="../js/cufon-yui.js"></script>
        <script type="text/javascript" src="../js/cufon-quicksand.js"></script>
        <script type="text/javascript" src="../js/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="../js/script.js"></script>
        <script type="text/javascript" src="../js/coin-slider.min.js"></script>
        <script type="text/javascript" src="../js/hoverIntent.js"></script>
        <script type="text/javascript" src="../js/superfish.js"></script>
        <script type="text/javascript">
            function validate(){
                var m= document.forms["salary_sheet"]["month"];
                var y= document.forms["salary_sheet"]["year"];
                if(m.value!='' && y.value==''){
                    alert('Please Select year too');
                    y.focus();
                    return false;
                }
                else if(m.value=='' && y.value!=''){
                    alert('Please Select month');
                    m.focus();
                    return false;
                }
                else if((m.value=='' && y.value=='') && document.salary_sheet.current.checked==false){
                    alert('Please Select One option');
                    m.focus();
                    return false;
                }
                else if((m.value!='' && y.value!='') && document.salary_sheet.current.checked==true){
                    alert('Please Select One only');
                    m.value='';
                    y.value='';
                    document.salary_sheet.current.checked=false;
                    m.focus();
                    return false;
                }
            }
        </script>
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
                                <h2><span>Previous Salary Sheet</span></h2>
                                <?php
                                include_once '../dbfiles/config.php';
                                ?>
                                <form name="salary_sheet" method="post" action="odtsheet.php">
                                    <table style="width: 50%;margin: auto;">
                                        <tr>
                                            <th colspan="2">
                                                Select One of the Option
                                            </th>
                                        </tr>
                                        <tr>
                                            <td>
                                                Select Month
                                            </td>
                                            <td>
                                                <select name="month">
                                                    <option value="">Select Month</option>
                                                    <option value="1">Jan</option>
                                                    <option value="2">Feb</option>
                                                    <option value="3">Mar</option>
                                                    <option value="4">Apr</option>
                                                    <option value="5">May</option>
                                                    <option value="6">Jun</option>
                                                    <option value="7">Jul</option>
                                                    <option value="8">Aug</option>
                                                    <option value="9">Sep</option>
                                                    <option value="10">Oct</option>
                                                    <option value="11">Nov</option>
                                                    <option value="12">Dec</option>
                                                </select>
                                                <select name="year">
                                                    <?php
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
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                OR
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Check the Latest only
                                            </td>
                                            <td>
                                                <input type="radio" value="current" name="current"/>Current
                                            </td>
                                        </tr>
                                    </table><br/>
                                    <center><input type="submit" value="Download Bank Slip" name="submit" onclick="return validate();"/></center>
                                </form>
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
