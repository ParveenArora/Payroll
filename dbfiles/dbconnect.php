<?php
class dbconnect {
   private $dbhost= 'localhost';
   private $dbuser= 'postgres';
   private $dbpass= '';
   private $dbname= 'complaint';
 function db_connect() {
   $con = pg_connect('host=$this->dbhost dbname=$this->dbname user=$this->dbuser password=$this->dbpass');
    echo pg_last_error($con);		
	}
 }
?>