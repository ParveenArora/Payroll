<?php
session_start();
if($_SESSION['user']!='admin') {
    header('location:../checklogin/error.php');
}
$op= $_GET['op'];
$op= base64_decode($op);
$myfile= "deledit.php";
$handle= fopen($myfile, 'w+');
if(!$handle) {
    echo "<script>alert('Operation could not performed de to I/P O/P error');window.location='../checklogin/logout.php'</script>";
}
else {
    fwrite($handle, "<?php \n");
    if($op=='') {
        fwrite($handle, '$op="edit";');
    }
    elseif ($op==2) {
        fwrite($handle, '$op="del";');
    }
    fwrite($handle, "\n ?>");
    fclose($handle);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Sidhu Fabriction Company</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="../css/style.css" rel="stylesheet" type="text/css" />
        <link href="tablecloth/tablecloth.css" rel="stylesheet" type="text/css" media="screen" />
        <script type="text/javascript" src="tablecloth/tablecloth.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/coin-slider.css" />
        <script type="text/javascript" src="scripts/validate.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/superfish.css" media="screen" />
        <script type="text/javascript" src="../js/menu.js"></script>
        <script type="text/javascript" src="../js/footer.js"></script>
        <script type="text/javascript" src="../js/sidebar.js"></script>
        <script type="text/javascript" src="../js/cufon-yui.js"></script>
        <script type="text/javascript" src="../js/cufon-quicksand.js"></script>
        <script type="text/javascript" src="../js/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="../js/script.js"></script>
        <script type="text/javascript" src="scripts/ajax.js"></script>
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
                                <h2><span><?php $op= $_GET['op'];
$op= base64_decode($op);
if($op=='2') {?>Delete <?php }?> <?php $op= $_GET['op'];
$op= base64_decode($op);
if($op=='') {?> Edit <?php } ?>Employee Details</span></h2>
                                <form action="update_emp_data.php" enctype="multipart/form-data" method="post" name="update">
                                    <center><span style="font-size: medium; margin-top: 50px;">Enter employee's first name:</span>
                                        <input type="text" value="" name="search" onkeyup="findemp(this.value);"/></center>
                                    <div id="user">

                                    </div>
                                    <div id="detail">

                                    </div>
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
