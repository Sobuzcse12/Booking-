<?php
    $filepath=realpath(dirname(__FILE__));

    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
   // include_once ($filepath.'/../lib/Session.php');

?>
<?php
    class Vehicle
    {
    	private $db;
    	private $fm;

    	public function __construct()
    	{
    		$this->db = new Database();
    		$this->fm = new Format();
    	}

    	public function addVehicleBooking($data)
    	{
            $userid = Session::get("id");

            $currentcity = $data['currentcity'];
            $reachedcity = $data['reachedcity'];
            $vechile     = $data['vechile'];
            $date        = $data['date'];
            
            //$applicantid    = $this->fm->validation($applicantid);
            $currentcity = $this->fm->validation($currentcity);
            $reachedcity = $this->fm->validation($reachedcity);
            $vechile     = $this->fm->validation($vechile);
            $date        = $this->fm->validation($date);

            $currentcity = mysqli_real_escape_string($this->db->link,$currentcity);
            $reachedcity = mysqli_real_escape_string($this->db->link,$reachedcity);
            $vechile     = mysqli_real_escape_string($this->db->link,$vechile);
            $date        = mysqli_real_escape_string($this->db->link,$date);

    		//$check_email=$this->checkemail($email);         

    		if($currentcity == "" || $reachedcity == "" || $vechile == "" || $date == "")
    		{
    			 $msg="<div class='alert alert-danger'><strong>Error ! </strong>Fields Must not be empty</div>";
                return $msg;
    		}
           else
    		{
                $query="INSERT INTO tbl_vehilce(UserID,CurrentCity,ReachedCity,Vehicle,Date) 
                            VALUES('$userid','$currentcity','$reachedcity','$vechile','$date')";

    			$result=$this->db->insert($query);
    			if($result!=false)
    			{
    				
                    $msg = "<div class='alert alert-success'><strong>Success !!</strong>Vehicle Booking Successfully</div>";
                    return $msg;
    			}
    			else
    			{
    				$msg="<span class='errror'>Data not Inserted Successfully</span>";
    				return $msg;
    			}
            }
    	}

        // public function getinformation($id)
        // {
        // $query="SELECT appplicantid FROM tbl_application WHERE appplicantid='$id' ";
        // $result=$this->db->select($query);
        // if($result)
        //    return true;
        // else
        //    return false;
        // }    		

        public function getAllBooking($id)
        {
        $query  = "SELECT * FROM tbl_vehilce WHERE UserID ='$id' ";
        $result = $this->db->select($query);
        return $result;
        }

        public function getVecById($id)
        {
            $query  = "SELECT * FROM tbl_vehilce WHERE ID ='$id'";
            $result = $this->db->select($query);
            return $result;
        }

        public function VecUpdate($data,$id)
        {

            $currentcity = mysqli_real_escape_string($this->db->link,$data['currentcity']);
            $reachedcity = mysqli_real_escape_string($this->db->link,$data['reachedcity']);
            $vechile     = mysqli_real_escape_string($this->db->link,$data['vechile']);
            $date        = mysqli_real_escape_string($this->db->link,$data['date']);

            if($currentcity == "" || $reachedcity == "" || $vechile == "" || $date == "")
            {
                 $msg="<div class='alert alert-danger'><strong>Error ! </strong>Fields Must not be empty</div>";
                return $msg;
            }
            else
            {
                $query       = "UPDATE tbl_vehilce SET 
                                CurrentCity = '$currentcity',
                                ReachedCity = '$reachedcity',
                                Vehicle     = '$vechile',
                                Date        = '$date'
                        WHERE ID = '$id'";

                $updated_row = $this->db->update($query);
            
                if ($updated_row) {
                    $msg="<div class='alert alert-success'><strong>Success!</strong>Booking Updated Successfully.</div>";
                    return $msg;
                }else{
                    $msg="<div class='alert alert-danger'><strong>Error!</strong>Booking Updated not Successfully.</div>";
                    return $msg;
                }
            } 
        }

        public function delVacById($id){

                $id      = mysqli_real_escape_string($this->db->link,$id);
                $query   = "DELETE FROM tbl_vehilce WHERE ID ='$id'";
                $deldata = $this->db->delete($query);
                if ($deldata) 
                {
                    $msg="<div class='alert alert-success'><strong>Success!</strong>Booking Delete Successfully.</div>";
                    return $msg;
                }
                else
                {
                        $msg="<div class='alert alert-danger'><strong>Error!</strong>Booking Delete not Successfully.</div>";
                        return $msg;
                }
         }

       

    }   	
?>