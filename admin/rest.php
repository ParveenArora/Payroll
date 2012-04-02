<?php
session_start();
if ($_SESSION['user'] != 'admin') {
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
            function isNumberKey(evt)
            {
                var charCode = (evt.which) ? evt.which : event.keyCode
                if ((charCode > 31)&&(charCode < 48 || charCode > 57))
                    return false;
                else
                return true;
            }    
            function validateForm(){
                var y= document.forms["rest"]["year"];
                if(y.value==null||y.value==''){
                    alert('Please Enter a year');
                    y.focus();
                    return false;
                }
                else
                    return true;
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
                                <h2><span>Rest Sheet</span></h2>
                                <?php
                                include_once '../dbfiles/config.php';
                                ?>
                                <form name="rest" method="post" action="processrest.php">
                                    <table style="width: 50%;margin: auto;">
                                        <tr>
                                            <th colspan="3">
                                                Select the Day of Rest for Each Employee
                                            </th>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                Select Month Please
                                                <select name="month">
                                                    <option value="January">January</option>
                                                    <option value="February">February</option>
                                                    <option value="March">March</option>
                                                    <option value="April">April</option>
                                                    <option value="May">May</option>
                                                    <option value="June">June</option>
                                                    <option value="July">July</option>
                                                    <option value="August">August</option>
                                                    <option value="September">September</option>
                                                    <option value="October">October</option>
                                                    <option value="November">November</option>
                                                    <option value="December">December</option>
                                                </select>
                                                Enter the Year Please<input type="text" name="year" value="" size="5" onkeypress="return isNumberKey(event);"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                Employee Id's
                                            </th>
                                            <th>
                                                Employee Name
                                            </th>
                                            <th>
                                                Day of Rest
                                            </th>
                                        </tr>
                                        <?php
                                        $query = mysql_query("SELECT id, worker_fname, worker_lname FROM workers");
                                        echo '<input type="hidden" name="ty" value="enter">';
                                        while ($result = mysql_fetch_array($query)) {
                                            echo '<input type="hidden" name="id[]" value="' . $result['id'] . '" />';
                                            echo '<tr><td>' . $result['id'] . '</td><td>' . $result['worker_fname'] . ' ' . $result['worker_lname'] . '</td>';
                                            echo '<td><select name="restday[]">';
                                            echo '<option value="Sunday">Sunday</option>';
                                            echo '<option value="Monday">Monday</option>';
                                            echo '<option value="Tuesday">Tuesday</option>';
                                            echo '<option value="Wednesday">Wednesday</option>';
                                            echo '<option value="Thursday">Thursday</option>';
                                            echo '<option value="Friday">Friday</option>';
                                            echo '<option value="Saturday">Saturday</option>';
                                            echo '</select></td></tr>';
                                        }
                                        ?>

                                    </table>
                                    <center><input type="submit" value="Generate Rest sheet" name="sub_rest" onclick="return validateForm();"/></center>
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
