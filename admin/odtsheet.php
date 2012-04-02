<?php
include '../dbfiles/config.php';
/**
 * Tutoriel file
 * Description : Merging a Segment within an array
 * You need PHP 5.2 at least
 * You need Zip Extension or PclZip library
 *
 * @copyright  GPL License 2008 - Julien Pauli - Cyril PIERRE de GEYER - Anaska (http://www.anaska.com)
 * @license    http://www.gnu.org/copyleft/gpl.html  GPL License
 * @version 1.3
 */


// Make sure you have Zip extension or PclZip library loaded
// First : include the librairy
require_once('../library/odf.php');

$odf = new odf("odtsheet.odt");

$odf->setVars('titre', 'Sidhu Construction Company');
$s=1;
if($_POST['month']!='' && $_POST['year']!=''){
    $month= $_POST['month'];
    $year= $_POST['year'];
}
elseif($_POST['current']!=''){
   $month= date('n')-1;
    $year= date('Y');
}
elseif(($_POST['month']==''&&$_POST['year']=='')&&$_POST['current']==''){
    $month= date('n')-1;
    $year= date('Y');
}
switch ($month){
    case 1:
        $monthname= 'January';
        break;
    case 2:
        $monthname= 'February';
        break;
    case 3:
        $monthname= 'March';
        break;
    case 4:
        $monthname= 'April';
        break;
    case 5:
        $monthname= 'May';
        break;
    case 6:
        $monthname= 'June';
        break;
    case 7:
        $monthname= 'July';
        break;
    case 8:
        $monthname= 'August';
        break;
    case 9:
        $monthname= 'September';
        break;
    case 10:
        $monthname= 'October';
        break;
    case 11:
        $monthname= 'November';
        break;
    case 12:
        $monthname= 'December';
        break;

}
$odf->setVars('month', $monthname);
$odf->setVars('year', $year);
$article = $odf->setSegment('emp');
$total= array ();
        $query= mysql_query("Select workers.id as id, worker_fname, worker_lname, gross, hra, rate, workdays, pf, esi, advance from workers, worker_fixeds, worker_varys where workers.id=worker_fixeds.worker_id and workers.id=worker_varys.id and month='$month' and year='$year'");
        if(!$query){
            header('location:error.php');
        }
	while($result= mysql_fetch_array($query)){
        if(!$result){
            header('location:qerror.php?op='.mysql_error());
        }
        $total["gross"]= $total["gross"]+$result['gross'];
        $total["workdays"]= sprintf('%.2f', ($total["workdays"]+$result['workdays']));
        $total["rate"]= sprintf('%.2f', ($total["rate"]+$result['rate']));
        $cal= sprintf('%.2f',($result['rate'])*($result['workdays']));
        $total["calsal"]= sprintf('%.2f', ($total["calsal"]+$cal));
        $total["pf"]= $total["pf"]+$result['pf'];
        $total["esi"]= $total["esi"]+$result['esi'];
        $total["advance"]= $total["advance"]+$result['advance'];
        $ded= $result['pf']+$result['esi']+$result['advance'];
        $total["ded"]= $total["ded"]+$ded;
        if($result['workdays']<20){
            $article->hra('0');
            $total["hra"]= $total["hra"]+0;
            $wages= sprintf('%.2f',(($result['rate'])*($result['workdays']))+0);
            $total["wages"]= sprintf('%.2f', ($total["wages"]+$wages));
            $netpay= sprintf('%.0f', ($wages-$ded));
            $total["net"]= sprintf('%.0f', ($total["net"]+$netpay));
        }
        else{
            $article->hra($result['hra']);
            $total["hra"]=$total["hra"]+$result['hra'];
            $wages= sprintf('%.2f',(($result['rate'])*($result['workdays']))+$result['hra']);
            $total["wages"]= sprintf('%.2f', ($total["wages"]+$wages));
            $netpay= sprintf('%.0f', ($wages-$ded));
            $total["net"]= sprintf('%.0f', ($total["net"]+$netpay));
        }
        $article->empname($result['worker_fname'].' '.$result['worker_lname']);
        $article->s($s);
        $article->gross($result['gross']);
        $article->rate($result['rate']);
        $article->days($result['workdays']);
        $article->cal($cal);
        $article->wages($wages);
        $article->deduction($ded);
        $article->net($netpay);
        $article->pf($result['pf']);
        $article->esi($result['esi']);
        $article->advance($result['advance']);
        $article->merge();
        $s=$s+1;
        }
$odf->mergeSegment($article);
$odf->setVars('totworkdays', $total["workdays"]);
$odf->setVars('totgross', $total["gross"]);
$odf->setVars('totrate', $total["rate"]);
$odf->setVars('totcalsal', $total["calsal"]);
$odf->setVars('tothra', $total["hra"]);
$odf->setVars('totnet', $total["net"]);
$odf->setVars('totwages', $total["wages"]);
$odf->setVars('totpf', $total["pf"]);
$odf->setVars('totesi', $total["esi"]);
$odf->setVars('totadvance', $total["advance"]);
$odf->setVars('totded', $total["ded"]);
// We export the file
$odf->exportAsAttachedFile('Sheet.odt');
 
?>