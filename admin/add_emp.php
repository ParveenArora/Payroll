<?php
session_start();
if($_SESSION['user']!='admin') {
    header('location:../checklogin/error.php');
}
include_once '../dbfiles/config.php';
class add_emp {
    private $emp_id;
    private $fname;
    private $lname;
    private $gross;
    private $hra;
    private $profile_pic_parms= array();
    private $acc;
    private $query=array();
    public function addemp() {
        $this->emp_id= $_POST['emp_id'];
        $this->fname= $_POST['fname'];
        $this->lname= $_POST['lname'];
        $this->gross= $_POST['gross'];
        $this->hra= $_POST['hra'];
        $this->acc= $_POST['acc'];
        $this->profile_pic_parms[path] = "uploads/";
        $this->profile_pic_parms[valid_formats] = array("jpg", "png", "gif", "bmp", "JPG");
        $this->profile_pic_parms[name] = $_FILES['photoimg']['name'];
        $this->profile_pic_parms[size] = $_FILES['photoimg']['size'];
        if(!$this->profile_pic_parms[name]) {
            if(trim($this->fname=='')) {
                header("location:../checklogin/empty.php?id=".base64_encode(add));
            }
            elseif (trim($this->lname=='')) {
                header("location:../checklogin/empty.php?id=".base64_encode(add));
            }
            elseif (trim($this->gross=='')) {
                header("location:../checklogin/empty.php?id=".base64_encode(add));
            }
            elseif (trim($this->hra=='')) {
                header("location:../checklogin/empty.php?id=".base64_encode(add));
            }
            else {
                $this->query[0]= mysql_query("Insert into workers (id, worker_fname, worker_lname) values ('$this->emp_id', '$this->fname', '$this->lname')");
                if(!$this->query[0]) {
                    header("location:../checklogin/qerror.php?error=".base64_encode(mysql_error()));
                }
                else {
                    $this->query[1]= mysql_query("Insert into worker_fixeds (worker_id, gross, hra) values ('$this->emp_id', '$this->gross', '$this->hra')");
                    if(!$this->query[1]) {
                        header("location:../checklogin/qerror.php?error=".base64_encode(mysql_error()));
                    }
                    else {
                        $this->query[2]=mysql_query("Insert into worker_acc (id, accno) values ('$this->emp_id', '$this->acc')");
                        if(!$this->query[2]) {
                            header("location:../checklogin/qerror.php?error=".base64_encode(mysql_error()));
                        }else {
                            header('location:adminhome.php');
                        }
                    }
                }
            }
        }
        else {
            if(strlen($this->profile_pic_parms[name])) {
                list($txt, $ext) = explode(".", $this->profile_pic_parms[name]);
                if(in_array($ext,$this->profile_pic_parms[valid_formats])) {
                    if($this->profile_pic_parms[size]<(1024*1024)) {
                        $actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
                        $tmp = $_FILES['photoimg']['tmp_name'];
                        list($width, $height, $type, $attr) = getimagesize($tmp);
                        if($width<=114&&$height<=144){
                        if(move_uploaded_file($tmp, $this->profile_pic_parms[path].$actual_image_name)) {
                            if(trim($this->fname=='')) {
                                header("location:../checklogin/empty.php?id=".base64_encode(add));
                            }
                            elseif (trim($this->lname=='')) {
                                header("location:../checklogin/empty.php?id=".base64_encode(add));
                            }
                            elseif (trim($this->gross=='')) {
                                header("location:../checklogin/empty.php?id=".base64_encode(add));
                            }
                            elseif (trim($this->hra=='')) {
                                header("location:../checklogin/empty.php?id=".base64_encode(add));
                            }
                            else {
                                $this->query[0]= mysql_query("Insert into workers (id, worker_fname, worker_lname, profilepic) values ('$this->emp_id', '$this->fname', '$this->lname', '$actual_image_name')");
                                if(!$this->query[0]) {
                                    header("location:../checklogin/qerror.php?error=".base64_encode(mysql_error()));
                                }
                                else {
                                    $this->query[1]= mysql_query("Insert into worker_fixeds (worker_id, gross, hra) values ('$this->emp_id', '$this->gross', '$this->hra')");
                                    if(!$this->query[1]) {
                                        header("location:../checklogin/qerror.php?error=".base64_encode(mysql_error()));
                                    }
                                    else {
                                        $this->query[2]=mysql_query("Insert into worker_acc (id, accno) values ('$this->emp_id', '$this->acc')");
                                        if(!$this->query[2]) {
                                            header("location:../checklogin/qerror.php?error=".base64_encode(mysql_error()));
                                        }else {
                                            header('location:adminhome.php');
                                        }
                                    }
                                }
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
    }
}
if(isset ($_POST['submit'])) {
    $add_emp= new add_emp();
    $add_emp->addemp();
}
if(!isset ($_POST['submit'])) {
    header('location:add.php');
}
?>