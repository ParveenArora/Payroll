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
                                <h2><span>Check Rest Sheet</span></h2>
                                <?php
                                include_once 'restsheetclass.php';
                                include_once '../dbfiles/config.php';
                                ?>
                                <form name="uprest" method="post" action="processrest.php">
                                    <table style="width: 50%;margin: auto;">
                                        <tr>
                                            <th colspan="4">
                                                Rest Sheet of Employees for <?php echo $_GET['m'].',  '.$_GET['y'];?>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                Employee Id's
                                            </th>
                                            <th>
                                                Employee Name
                                            </th>
                                            <th>
                                               Already Entered Rests
                                            </th>
                                            <th>
                                                Day of Rest
                                            </th>
                                        </tr>
                                                <?php $query= mysql_query("SELECT workers.id, worker_fname, worker_lname, day, month, year FROM workers, worker_rest_sheet where workers.id=worker_rest_sheet.id and month='$_GET[m]' and year='$_GET[y]'");
                                                echo '<input type="hidden" name="mo" value="'.$_GET['m'].'" />';
                                                echo '<input type="hidden" name="ye" value="'.$_GET['y'].'" />';
                                                echo '<input type="hidden" name="ty" value="update" />';
                                                $count_rows= mysql_num_rows($query);
                                                if($count_rows<1){
                                                    echo '<tr><td colspan=4>Sorry User nothing present in database</td></tr>';
                                                }
                                                while($result= mysql_fetch_array($query)){
                                                    echo '<input type="hidden" name="id[]" value="'.$result['id'].'" />';
                                                    echo '<tr><td>'.$result['id'].'</td><td>'.$result['worker_fname'].' '.$result['worker_lname'].'</td>';
                                                    echo '<td>'.$result['day'].'</td>';
                                                    echo '<td><select name="restday[]">';
                                                    switch ($result['day']){
                                                        case 'Sunday':
                                                            echo '<option value="Sunday">Sunday</option>';
                                                            echo '<option value="Monday">Monday</option>';
                                                            echo '<option value="Tuesday">Tuesday</option>';
                                                            echo '<option value="Wednesday">Wednesday</option>';
                                                            echo '<option value="Thursday">Thursday</option>';
                                                            echo '<option value="Friday">Friday</option>';
                                                            echo '<option value="Saturday">Saturday</option>';
                                                            break;
                                                        case 'Monday':
                                                            echo '<option value="Monday">Monday</option>';
                                                            echo '<option value="Tuesday">Tuesday</option>';
                                                            echo '<option value="Wednesday">Wednesday</option>';
                                                            echo '<option value="Thursday">Thursday</option>';
                                                            echo '<option value="Friday">Friday</option>';
                                                            echo '<option value="Saturday">Saturday</option>';
                                                            echo '<option value="Sunday">Sunday</option>';
                                                            break;
                                                        case 'Tuesday':
                                                            echo '<option value="Tuesday">Tuesday</option>';
                                                            echo '<option value="Wednesday">Wednesday</option>';
                                                            echo '<option value="Thursday">Thursday</option>';
                                                            echo '<option value="Friday">Friday</option>';
                                                            echo '<option value="Saturday">Saturday</option>';
                                                            echo '<option value="Sunday">Sunday</option>';
                                                            echo '<option value="Monday">Monday</option>';
                                                            break;
                                                        case 'Wednesday':
                                                            echo '<option value="Wednesday">Wednesday</option>';
                                                            echo '<option value="Thursday">Thursday</option>';
                                                            echo '<option value="Friday">Friday</option>';
                                                            echo '<option value="Saturday">Saturday</option>';
                                                            echo '<option value="Sunday">Sunday</option>';
                                                            echo '<option value="Monday">Monday</option>';
                                                            echo '<option value="Tuesday">Tuesday</option>';
                                                            break;
                                                        case 'Thursday':
                                                            echo '<option value="Thursday">Thursday</option>';
                                                            echo '<option value="Friday">Friday</option>';
                                                            echo '<option value="Saturday">Saturday</option>';
                                                            echo '<option value="Sunday">Sunday</option>';
                                                            echo '<option value="Monday">Monday</option>';
                                                            echo '<option value="Tuesday">Tuesday</option>';
                                                            echo '<option value="Wednesday">Wednesday</option>';
                                                            break;
                                                        case 'Friday':
                                                            echo '<option value="Friday">Friday</option>';
                                                            echo '<option value="Saturday">Saturday</option>';
                                                            echo '<option value="Sunday">Sunday</option>';
                                                            echo '<option value="Monday">Monday</option>';
                                                            echo '<option value="Tuesday">Tuesday</option>';
                                                            echo '<option value="Wednesday">Wednesday</option>';
                                                            echo '<option value="Thursday">Thursday</option>';
                                                            break;
                                                        case 'Saturday':
                                                            echo '<option value="Saturday">Saturday</option>';
                                                            echo '<option value="Sunday">Sunday</option>';
                                                            echo '<option value="Monday">Monday</option>';
                                                            echo '<option value="Tuesday">Tuesday</option>';
                                                            echo '<option value="Wednesday">Wednesday</option>';
                                                            echo '<option value="Thursday">Thursday</option>';
                                                            echo '<option value="Friday">Friday</option>';
                                                            break;
                                                            
                                                    
                                                    
                                                    
                                                    }
                                                    echo '</select></td></tr>';
                                                }
                                                if($count_rows>0){
                                                    echo '<tr><td colspan=4><input type="submit" name="update" value="Update Sheet">&nbsp; &nbsp; <span style="background:silver;font-size:16px;"><a href="processrest.php?ty=rep&m='.$_GET['m'].'&y='.$_GET['y'].'">Download Report</a></span></td></tr>';
                                                }
                                                ?>
                                             
                                    </table>
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
