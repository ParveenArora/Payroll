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
        <style type="text/css">
            td {
                line-height: 2em;
                border: 1px solid black;
            }
        </style>
        <script type="text/javascript" src="../js/menu.js"></script>
        <script type="text/javascript" src="../js/footer.js"></script>
        <link href="tablecloth/tablecloth.css" rel="stylesheet" type="text/css" media="screen" />
        <script type="text/javascript" src="tablecloth/tablecloth.js"></script>
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
                                <h2><span>Final Salary Sheet</span></h2>
                                <form method="post" action="odtsheet.php">
                                    <input type="hidden" name="op" value="up"/>
                                    <table width="100%" cellpadding="0" cellspacing="0" style="text-align: center; border: 1px solid black;">
                                        <tr style="background:#003456;">
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
                                                Cal Salary
                                            </th>
                                            <th>
                                                HRA
                                            </th>
                                            <th>
                                                Total Wages
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
                                            <th>
                                                Total Ded.
                                            </th>
                                            <th>
                                                Net Pay
                                            </th>
                                        </tr>
                                        <?php
                                        include "../dbfiles/config.php";
                                        class finalsheet {
                                            private $query= array();
                                            private $result= array();
                                            private $total= array();
                                            private $calsal;
                                            private $ded;
                                            private $totwages;
                                            private $netpay;
                                            private $month;
                                            private $year;
                                            public function seedata() {
                                                $this->total[1]=0;
                                                $this->total[2]=0;
                                                $this->total[3]=0;
                                                $this->total[4]=0;
                                                $this->total[5]=0;
                                                $this->total[6]=0;
                                                $this->total[7]=0;
                                                $this->total[8]=0;
                                                $this->total[9]=0;
                                                $this->total[10]=0;
                                                $this->total[11]=0;
                                                $this->month= date('n')-1;
                                                $this->year= date('Y');
                                                $this->query[0]=mysql_query("Select id from worker_varys where month='$this->month'");
                                                $count= mysql_num_rows($this->query[0]);
                                                if($count==0) {
                                                    echo "<script>var check= confirm('No data for updation');
                               if(check==true){
                               window.location='newsheet.php';}
                               else{
                               window.location='adminhome.php';}
                                </script>";
                                                }
                                                else {
                                                    $this->query[1]= mysql_query("Select workers.id as id, worker_fname, worker_lname, gross, hra, rate, workdays, pf, esi, advance from workers, worker_fixeds, worker_varys where workers.id=worker_fixeds.worker_id and workers.id=worker_varys.id and month='$this->month' and year='$this->year'");
                                                    if(!$this->query[1]) {
                                                        header('location:qerror.php?op='.mysql_error());
                                                    }
                                                    $this->i=1;
                                                    while($this->result[2]=mysql_fetch_array($this->query[1])) {
                                                        if(($this->i)%2==0) {
                                                            echo "<tr>";
                                                        }
                                                        else {
                                                            echo "<tr>";
                                                        }
                                                        echo "<input type='hidden' name=id[] value=".$this->result[2]['id']." />";
                                                        echo "<td>".$this->i."</td>";
                                                        echo "<td style='width:120px;'>".$this->result[2]['worker_fname'].' '.$this->result[2]['worker_lname']."</td>";
                                                        echo "<td>".$this->result[2]['gross']."</td>";
                                                        echo "<td>".$this->result[2]['rate']."</td>";
                                                        echo "<td>".$this->result[2]['workdays']."</td>";
                                                        $this->calsal= sprintf('%.2f',($this->result[2]['rate'])*($this->result[2]['workdays']));
                                                        echo "<td>".$this->calsal."</td>";
                                                        if($this->result[2]['workdays']<20) {
                                                            echo "<td>0</td>";
                                                            $this->total[5]= sprintf('%.2f', ($this->total[5]) + 0);
                                                            $this->totwages=sprintf('%.2f',($this->calsal)+0);
                                                            echo "<td>".$this->totwages."</td>";
                                                        }
                                                        else {
                                                            echo "<td>".$this->result[2]['hra']."</td>";
                                                            $this->total[5]= sprintf('%.2f', ($this->total[5]) + ($this->result[2]['hra']));
                                                            $this->totwages=sprintf('%.2f',($this->calsal)+$this->result[2]['hra']);
                                                            echo "<td>".$this->totwages."</td>";
                                                        }
                                                        echo "<td>".$this->result[2]['pf']."</td>";
                                                        echo "<td>".$this->result[2]['esi']."</td>";
                                                        echo "<td>".$this->result[2]['advance']."</td>";
                                                        $this->ded=($this->result[2]['pf']+$this->result[2]['esi']+$this->result[2]['advance']);
                                                        echo "<td>".$this->ded."</td>";
                                                        $this->netpay= sprintf('%.0f',($this->totwages)-($this->ded));
                                                        echo "<td>".$this->netpay."</td>";
                                                        $this->total[1]= $this->total[1] + $this->result[2]['gross'];
                                                        $this->total[2]= sprintf('%.2f', ($this->total[2]) + ($this->result[2]['rate']));
                                                        $this->total[3]= sprintf('%.2f', ($this->total[3]) + ($this->result[2]['workdays']));
                                                        $this->total[4]= sprintf('%.2f', ($this->total[4]) + ($this->calsal));
                                                        $this->total[6]= sprintf('%.2f', ($this->total[6]) + ($this->totwages));
                                                        $this->total[7]= sprintf('%.2f', ($this->total[7]) + ($this->result[2]['pf']));
                                                        $this->total[8]= sprintf('%.2f', ($this->total[8]) + ($this->result[2]['esi']));
                                                        $this->total[9]= sprintf('%.2f', ($this->total[9]) + ($this->result[2]['advance']));
                                                        $this->total[10]= sprintf('%.2f', ($this->total[10]) + ($this->ded));
                                                        $this->total[11]= sprintf('%.0f', ($this->total[11]) + ($this->netpay));
                                                        echo "</tr>";
                                                        $this->i=$this->i+1;
                                                    }
                                                    echo '<tr><td colspan="2" align="right" style="font-size:medium;">Total
                      </td>';
                                                    echo '<td>'.$this->total[1].'</td>';
                                                    echo '<td>'.$this->total[2].'</td>';
                                                    echo '<td>'.$this->total[3].'</td>';
                                                    echo '<td>'.$this->total[4].'</td>';
                                                    echo '<td>'.$this->total[5].'</td>';
                                                    echo '<td>'.$this->total[6].'</td>';
                                                    echo '<td>'.$this->total[7].'</td>';
                                                    echo '<td>'.$this->total[8].'</td>';
                                                    echo '<td>'.$this->total[9].'</td>';
                                                    echo '<td>'.$this->total[10].'</td>';
                                                    echo '<td>'.$this->total[11].'</td></tr>';
                                                }
                                            }
                                        }
                                        $sh= new finalsheet();
$sh->seedata();
?>
                                        <tr>
                                            <td colspan="13">
                                                <center><input type="submit" value="Go for Salary sheet Generation"/></center>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                                <br/>
                            </div>


                        </div>
                    </div><br />
                    <div id="disclaimer" style="margin-bottom: 20px;">
                        <script type="text/javascript">footere();</script>
                    </div>
                </div>
            </div>
    </body>
</html>
