<?php
  $filepath = realpath(dirname(__FILE__));
  include_once ($filepath.'/../Config/config.php');
 ?>
<?php 
   class Database
   {
     private $host   = DB_HOST;
     private $user   = DB_USER;
     private $pass   = DB_PASS;
     private $dbname = DB_NAME;

     public $link;
     public $error;

     public function __construct()
     {
        $this->ConnectDB();
     }
     private function ConnectDB()
     {
        $this->link=new mysqli($this->host,$this->user,$this->pass,$this->dbname);
        if(!$this->link)
        {
            $this->error="Connection fail".$this->link->connect_error;
            return false;
        }
     }

     public function select($query)
     {
        $result=$this->link->query($query) or die($this->link->error.__LINE__);
        if($result->num_rows>0)
            return $result;
        else
            return false;
     }

     public function insert($query)
     {
     	$insertrow=$this->link->query($query) or die($this->link->error.__LINE__);
     	if($insertrow)
     		return $insertrow;
     	else
     		return false;
     }
     public function update($query)
     {
     	$updaterow=$this->link->query($query) or die($this->link->error.__LINE__);
     	if($updaterow)
     		return $updaterow;
     	else
     		return false;
     }

     public function delete($query)
     {
     	$deleterow=$this->link->query($query) or die($this->link->error.__LINE__);
     	if($deleterow)
     		return $deleterow;
     	else
     		return false;
     }
   }
?>