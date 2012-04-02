<?php
session_start();
include "../dbfiles/config.php";
if($_SESSION['user']!='admin'){header('location:../checklogin/error.php');}
class updatabase{
    private $workdays;
    private $hra;
    private $pf;
    private $esi;
    private $adv;
    private $id;
    private $month;
    private $year;
    private $query;
    public function updetail($i, $w, $h, $p, $e, $a){
        $this->id= $i;
        $this->workdays= $w;
        $this->hra= $h;
        $this->pf= $p;
        $this->esi= $e;
        $this->adv= $a;
        $this->month= date('n')-1;
        $this->year= date('Y');
        $this->query= mysql_query("Update worker_varys, worker_fixeds SET hra='$this->hra', workdays='$this->workdays', pf='$this->pf', esi='$this->esi', advance='$this->adv' where worker_varys.id=worker_fixeds.worker_id and id='$this->id' and month='$this->month' and year='$this->year'");
        if(!$this->query){
        header('location:qerror.php?op=updaatabase');
        }
        else{
            echo "<script>alert('You are now directed to updation page');
window.location= 'updatesheet.php';

</script>";
        }
    }
}
$updb= new updatabase();
$updb->updetail($i=$_POST['id'], $w=$_POST['workday'], $h=$_POST['hra'], $p=$_POST['pf'], $e=$_POST['esi'], $a=$_POST['adv']);

?>