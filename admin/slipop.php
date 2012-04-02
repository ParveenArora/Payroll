<?php
$op= $_GET['op'];
if($op=='complete') {
    echo '<form method="post" name="slip" action="slipdownload.php">';
    echo '<table style="width:45%; margin-right:auto; margin-left:auto;"><tr><th colspan="2">Click Below</th></tr><tr>';
    echo '<td>Select Month and Year</td>';
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
    echo '</select></tr>';
    echo '<tr><td>Check the Latest only</td>';
    echo '<td><input type="radio" value="current" name="current"/>Current</td></tr>';
    echo '<tr><td colspan="2"><input type="submit" value="Download" onclick="return check();"></td></tr></table>';
    echo '</form>';

}
if($op=='single') {
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
    echo '<tr><td colspan="2"><input type="submit" value="Download" onclick="return verify();"></td></tr>';
    echo '</table>';
}
?>