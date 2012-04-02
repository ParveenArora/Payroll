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
        <link rel="stylesheet" type="text/css" href="../css/coin-slider.css" />
        <link rel="stylesheet" type="text/css" href="../css/superfish.css" media="screen" />
        <script type="text/javascript" src="../js/menu.js"></script>
        <link href="tablecloth/tablecloth.css" rel="stylesheet" type="text/css" media="screen" />
        <script type="text/javascript" src="tablecloth/tablecloth.js"></script>
        <script type="text/javascript" src="../js/footer.js"></script>
        <script type="text/javascript" src="../js/sidebar.js"></script>
        <script type="text/javascript" src="../js/cufon-yui.js"></script>
        <script type="text/javascript" src="../js/cufon-quicksand.js"></script>
        <script type="text/javascript" src="../js/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="../js/script.js"></script>
        <script type="text/javascript">
            function confirmit(){
                var r= confirm("Have you confirm that no field is empty. \n Press ok to continue\n Press Cancel to recheck");
                if(r){
                    return true;
                }
                else{
                    return false;
                }
            }
        </script>
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
                                <h2><span>Enter Salary Sheet Data</span></h2>
                                <form method="post" action="finalsheet.php">
                                    <input type="hidden" name="op" value="new"/>
                                    <table width="100%" style="text-align: center">
                                        <tr>
                                            <th>
                                                Sr. No
                                            </th>
                                            <th>
                                                Name
                                            </th>
                                            <th>
                                                Gross
                                            </th>
                                            <th>
                                                Rate/Day
                                            </th>
                                            <th>
                                                Work Days
                                            </th>
                                            <th>
                                                PF
                                            </th>
                                            <th>
                                                ESI
                                            </th>
                                            <th>
                                                ADV.
                                            </th>
                                        </tr>
                                        <?php
                                        include "../dbfiles/config.php";
                                        class sheet {
                                            private $i;
                                            private $query;
                                            private $initialcheck;
                                            private $result;
                                            private $month;
                                            private $year;
                                            private $rate;
                                            public function enterdata() {
                                                $this->month= date('n')-1;
                                                $this->year= date('Y');
                                                $this->initialcheck=mysql_query("Select id from worker_varys where month='$this->month' and year='$this->year'");
                                                $count= mysql_num_rows($this->initialcheck);
                                                if($count!=0) {
                                                    echo "<script>var check= confirm('Data Exist for updation');
                               if(check==true){
                               window.location='updatesheet.php';}
                               else{
                               window.location='adminhome.php';}
                                </script>";
                                                }
                                                $this->query= mysql_query("Select id, worker_fname, worker_lname, gross, hra from workers, worker_fixeds where workers.id=worker_fixeds.worker_id");
                                                if(!$this->query) {
                                                    echo 'error';
                                                }
                                                $this->i=1;
                                                while($this->result=mysql_fetch_array($this->query)) {
                                                    echo "<tr>";
                                                    echo "<input type='hidden' name=id[] value=".$this->result['id']." />";
                                                    echo "<td>".$this->i."</td>";
                                                    echo "<td>".$this->result['worker_fname'].' '.$this->result['worker_lname']."</td>";
                                                    echo "<td>".$this->result['gross']."</td>";
                                                    $year= date('Y');
                                                    if($year%400 ==0 || ($year%100 != 0 && $year%4 == 0)) {
                                                        $leap=1;
                                                    }
                                                    else {
                                                        $leap=0;
                                                    }
                                                    switch ($this->month) {
                                                        case 1:
                                                            $this->rate= $this->result['gross']/31;
                                                            echo '<td>'.sprintf('%.2f', $this->rate).'</td>';
                                                            break;
                                                        case 2:
                                                            if($leap==1) {
                                                                $this->rate= $this->result['gross']/29;
                                                            }
                                                            elseif ($leap==0) {
                                                                $this->rate= $this->result['gross']/28;
                                                            }
                                                            echo '<td>'.sprintf('%.2f', $this->rate).'</td>';
                                                            break;
                                                        case 3:
                                                            $this->rate= $this->result['gross']/31;
                                                            echo '<td>'.sprintf('%.2f', $this->rate).'</td>';
                                                            break;
                                                        case 5:
                                                            $this->rate= $this->result['gross']/31;
                                                            echo '<td>'.sprintf('%.2f', $this->rate).'</td>';
                                                            break;
                                                        case 7:
                                                            $this->rate= $this->result['gross']/31;
                                                            echo '<td>'.sprintf('%.2f', $this->rate).'</td>';
                                                            break;
                                                        case 8:
                                                            $this->rate= $this->result['gross']/31;
                                                            echo '<td>'.sprintf('%.2f', $this->rate).'</td>';
                                                            break;
                                                        case 10:
                                                            $this->rate= $this->result['gross']/31;
                                                            echo '<td>'.sprintf('%.2f', $this->rate).'</td>';
                                                            break;
                                                        case 12:
                                                            $this->rate= $this->result['gross']/31;
                                                            echo '<td>'.sprintf('%.2f', $this->rate).'</td>';
                                                            break;
                                                        default:
                                                            $this->rate= $this->result['gross']/30;
                                                            echo '<td>'.sprintf('%.2f', $this->rate).'</td>';
                                                    }
                                                    echo "<input type='hidden' name=rate[] value=".sprintf('%.2f', $this->rate).">";
                                                    echo "<td><input type='text' name=workdays[] value='0' size='8px'></td>";
                                                    echo "<td><input type='text' name=pf[] value='0' size='8px'></td>";
                                                    echo "<td><input type='text' name=esi[] value='0' size='8px'></td>";
                                                    echo "<td><input type='text' name=adv[] value='0' size='8px'></td>";
                                                    echo "</tr>";
                                                    $this->i=$this->i+1;
                                                }
                                            }
                                        }
                                        $sh= new sheet();
                                        $sh->enterdata();
                                        ?>
                                        <tr>
                                            <td colspan="8">
                                                <input type="submit" value="Enter Data" onclick="return confirmit()"/>
                                            </td>
                                        </tr>
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
