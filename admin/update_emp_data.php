<?php

include_once '../dbfiles/config.php';
include_once 'deledit.php';

class update_emp_data {

    private $id;
    private $fname;
    private $lname;
    private $gross;
    private $profile_pic_parms = array();
    private $newrate;
    private $acc;
    private $hra;

    public function update() {
        $this->id = $_POST['id'];
        $this->fname = $_POST['fname'];
        $this->lname = $_POST['lname'];
        $this->gross = $_POST['gross'];
        $this->hra = $_POST['hra'];
        $this->acc = $_POST['acc'];
        $this->profile_pic_parms[path] = "uploads/";
        $this->profile_pic_parms[valid_formats] = array("jpg", "png", "gif", "bmp", "JPG");
        $this->profile_pic_parms[name] = $_FILES['photoimg']['name'];
        $this->profile_pic_parms[size] = $_FILES['photoimg']['size'];
        $month = date('n') - 1;
        $year = date('Y');
        if ($year % 400 == 0 || ($year % 100 != 0 && $year % 4 == 0)) {
            $leap = 1;
        } else {
            $leap = 0;
        }
        switch ($month) {
            case 1:
                $this->newrate = sprintf('%.2f', ($this->gross / 31));
                break;
            case 2:
                if ($leap == 1) {
                    $this->newrate = sprintf('%.2f', ($this->gross / 29));
                } elseif ($leap == 0) {
                    $this->newrate = sprintf('%.2f', ($this->gross / 28));
                }
                break;
            case 3:
                $this->newrate = sprintf('%.2f', ($this->gross / 31));
                break;
            case 5:
                $this->newrate = sprintf('%.2f', ($this->gross / 31));
                break;
            case 7:
                $this->newrate = sprintf('%.2f', ($this->gross / 31));
                break;
            case 8:
                $this->newrate = sprintf('%.2f', ($this->gross / 31));
                break;
            case 10:
                $this->newrate = sprintf('%.2f', ($this->gross / 31));
                break;
            case 12:
                $this->newrate = sprintf('%.2f', ($this->gross / 31));
                break;
            default:
                $this->newrate = sprintf('%.2f', ($this->gross / 30));
        }
        if (!$this->profile_pic_parms[name]) {
            $query = mysql_query("Update workers, worker_fixeds, worker_acc set workers.worker_fname='$this->fname', workers.worker_lname='$this->lname', worker_fixeds.gross='$this->gross', worker_fixeds.hra='$this->hra', worker_acc.accno='$this->acc' where workers.id=worker_fixeds.worker_id and workers.id=worker_acc.id and workers.id='$this->id'");
	   $intial_count= mysql_query("Select id from worker_varys where month='$month' and year='$year' and id='$this->id'");
	   $cnt= mysql_num_rows($initial_count);
           if($cnt>0){
	   $up_vary= mysql_query("Update worker_varys set rate='$this->newrate' where id='$this->id' and month='$month' and year='$year'");
	   }
        } else {
            if (strlen($this->profile_pic_parms[name])) {
                list($txt, $ext) = explode(".", $this->profile_pic_parms[name]);
                if (in_array($ext, $this->profile_pic_parms[valid_formats])) {
                    if ($this->profile_pic_parms[size] < (1024 * 1024)) {
                        $actual_image_name = time() . substr(str_replace(" ", "_", $txt), 5) . "." . $ext;
                        $tmp = $_FILES['photoimg']['tmp_name'];
                        list($width, $height, $type, $attr) = getimagesize($tmp);
                        if ($width <= 114 && $height <= 144) {
                            if (move_uploaded_file($tmp, $this->profile_pic_parms[path] . $actual_image_name)) {
                                $query = mysql_query("Update workers, worker_fixeds, worker_acc set workers.worker_fname='$this->fname', workers.worker_lname='$this->lname', workers.profilepic='$actual_image_name', worker_fixeds.gross='$this->gross', worker_fixeds.hra='$this->hra', worker_acc.accno='$this->acc' where workers.id=worker_fixeds.worker_id and workers.id=worker_acc.id and workers.id='$this->id'");
          $intial_count= mysql_query("Select id from worker_varys where month='$month' and year='$year' and id='$this->id'");
	   $cnt= mysql_num_rows($initial_count);
           if($cnt>0){
	   $up_vary= mysql_query("Update worker_varys set rate='$this->newrate' where id='$this->id' and month='$month' and year='$year'");
	   }
                            }
                            else
                                echo '<script>alert("Upload get Failed \n You will be directed to add employee page again");window.location="add.php";</script>';
                        }
                        else {
                            echo '<script>alert("Size should be 114PX x 114PX \n You will be directed to add employee page again");window.location="add.php";</script>';
                        }
                    }
                    else
                        echo '<script>alert("Image file size max 1 MB \n You will be directed to add employee page again");window.location="add.php";</script>';
                }
                else
                    echo '<script>alert("Invalid File format \n You will be directed to add employee page again");window.location="add.php";</script>';
            }

            else
                echo '<script>alert("Please Select Image \n You will be directed to add employee page again");window.location="add.php";</script>';
        }
        if ($query) {
            header('location:adminhome.php');
        } else {
            echo 'error' . mysql_error();
        }
    }

    public function delete($id) {
        $this->id = $id;
        $query = mysql_query("Delete w, wf, acc from workers as w, worker_fixeds as wf, worker_acc as acc where w.id=wf.worker_id and w.id=acc.id and w.id='$this->id'");
        if ($query) {
            header('location:adminhome.php');
        } else {
            echo 'error2';
        }
    }

}

$up = new update_emp_data();
if ($op == 'edit') {
    $up->update();
} elseif ($op == 'del') {
    $empid = base64_decode($_GET['ID']);
    $up->delete($empid);
}
?>
