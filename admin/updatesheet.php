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
        <script type="text/javascript" src="scripts/validate.js"></script>
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
                                <h2><span>Update Salary Sheet</span></h2>
                                <form method="post" action="finalsheet.php">
                                    <input type="hidden" name="op" value="up"/>
                                    <table width="100%" cellpadding="0" cellspacing="0" style="text-align: center; border: 1px solid black;">
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
                                            <th>
                                                Edit Details
                                            </th>
                                        </tr>
                                        <?php
                                        include "../dbfiles/config.php";
                                        class sheet {
                                            private $query= array();
                                            private $result= array();
                                            private $i;
                                            private $month;
                                            private $year;
                                            public function updata() {
                                                $this->month= date('n')-1;
                                                $this->year= date('Y');
                                                $this->query[0]=mysql_query("Select id from worker_varys where month='$this->month' and year='$this->year'");
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
                                                    $this->query[1]= mysql_query("Select workers.id, worker_fname, worker_lname, gross, hra, rate, workdays, pf, esi, advance from workers, worker_fixeds, worker_varys where workers.id=worker_fixeds.worker_id and workers.id=worker_varys.id and month='$this->month' and year='$this->year'");
                                                    if(!$this->query[1]) {
                                                        header('location:qerror.php?op=uperror');
                                                    }
                                                    $this->i=1;
                                                    while($this->result[2]=mysql_fetch_array($this->query[1])) {
                                                        echo "<tr>";
                                                        echo "<input type='hidden' name=id[] value=".$this->result[2]['workers.id'].">";
                                                        echo "<td>".$this->i."</td>";
                                                        echo "<td>".$this->result[2]['worker_fname'].' '.$this->result[2]['worker_lname']."</td>";
                                                        echo "<td>".$this->result[2]['gross']."</td>";
                                                        echo "<td>".$this->result[2]['rate']."</td>";
                                                        echo "<input type='hidden' name=rate[] value=".$this->result[2]['rate'].">";
                                                        echo "<td><input type='text' name=workdays[] size='8px' value=".$this->result[2]['workdays']."></td>";
                                                        echo "<td><input type='text' name=pf[] size='8px' value=".$this->result[2]['pf']."></td>";
                                                        echo "<td><input type='text' name=esi[] size='8px' value=".$this->result[2]['esi']."></td>";
                                                        echo "<td><input type='text' name=adv[] size='8px' value=".$this->result[2]['advance']."></td>";
                                                        echo '<td><a href="editsaldetail.php?id='.base64_encode($this->result[2]['id']).'">Edit Details</td>';
                                                        echo "</tr>";
                                                        $this->i=$this->i+1;
                                                    }
                                                }
                                            }
                                        }
                                        $sh= new sheet();
$sh->updata();
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
