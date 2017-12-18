<?php
    $filepath = realpath(dirname(__FILE__));

    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>
<?php
    class User
    {
    	private $db;
    	private $fm;

    	public function __construct()
    	{
    		$this->db = new Database();
    		$this->fm = new Format();
    	}

    	public function userRegistration($data)
    	{
    		$fullname = $data['name'];
    		$email    = $data['email'];
    		$password = $data['password'];
            $address  = $data['address'];
    				
    		$fullname = $this->fm->validation($fullname);
    		$email    = $this->fm->validation($email);
    		$password = $this->fm->validation(md5($password));
            $address  = $this->fm->validation($address);
    		
    		$check_email = $this->checkemail($email);


    		if($fullname=="" || $email == "" || $password == "" || $address == "")
    		{
    			//$msg ="<span class='error'>Fields Must not be empty</span>";
                $msg="<div class='alert alert-danger'><strong>Error ! </strong>Fields Must not be empty</div>";
    			return $msg;
    		}
            if(filter_var($email,FILTER_VALIDATE_EMAIL) === false)
            {
                $msg="<div class='alert alert-danger'><strong>Error ! </strong>Email is invalid</div>";
                return $msg;
            } 
            if($check_email == true)
            {
              $msg="<div class='alert alert-danger'><strong>Error ! </strong>Email is already existing</div>";
              return $msg;
            }
           else
    		{
                $query="INSERT INTO tbl_user(FullName,Email,Password,Address) VALUES('$fullname','$email','$password','$address')";

    			$result=$this->db->insert($query);

    			//$msg="<span class='success'>Data Inserted Successfully</span>";
                $msg = "<div class='alert alert-success'><strong>Success !!</strong>Registration Complete Successfully</div>";
    			return $msg;
                header("Location:booking.php");
            }
    	}

        public function userLogin($data)
        {
            $email    = mysqli_real_escape_string($this->db->link, $data['email']);
            $password = mysqli_real_escape_string($this->db->link, md5($data['password']));

            if (empty($email) || empty($password)) {
                $msg="<div class='alert alert-danger'><strong>Error ! </strong>Fields Must not be empty</div>";
                return $msg;
            }
            $query  = "SELECT * FROM tbl_user WHERE Email = '$email' AND Password = '$password'";
            $result = $this->db->select($query);
            if ($result != false) {
                $value = $result->fetch_assoc();
                Session::set("userlogin", true);
                Session::set("id", $value['ID']);
                Session::set("userName", $value['FullName']);
                header("Location:booking.php");
                //$msg = "<span class='error'>I love madhu!</span>";
                //return $msg;
            }else{
                
                $msg="<div class='alert alert-danger'><strong>Error ! </strong>Email or password not match!</div>";
                return $msg;
            }
        }
            
        public function checkemail($email)
        {
                $query="SELECT email FROM tbl_user WHERE email='$email' ";
                $result=$this->db->select($query);
                if($result)
                   return true;
               else
                   return false;
        }

        public function getUserData($id){
                $query  = "SELECT * FROM tbl_user WHERE id = '$id' ";
                $result =$this->db->select($query);
                return $result;
        }

        public function userUpdate($data, $id){
            $fullname = mysqli_real_escape_string($this->db->link,$data['name']);
            $email    = mysqli_real_escape_string($this->db->link,$data['email']);
            $address  = mysqli_real_escape_string($this->db->link,$data['address']);
           

            if($fullname == "" || $email == "" || $address == "" )
            {
                 $msg="<div class='alert alert-danger'><strong>Error ! </strong>Fields Must not be empty</div>";
                return $msg;
            }
            else
            {
                $query       = "UPDATE tbl_user SET 
                                FullName = '$fullname',
                                Email    = '$email',
                                Address  = '$address'
                                
                        WHERE ID = '$id'";

                $updated_row = $this->db->update($query);
            
                if ($updated_row) {
                    $msg="<div class='alert alert-success'><strong>Success!</strong>Profile Updated Successfully.</div>";
                    return $msg;
                }else{
                    $msg="<div class='alert alert-danger'><strong>Error!</strong>Profile Updated not Successfully.</div>";
                    return $msg;
                }
            } 
        }

        public function changepassword($data)
        {
             $oldpassword = md5($data['oldpass']);
             $newpassword = md5($data['newpass']);
            
            //$oldpassword = mysqli_real_escape_string($this->db->link, md5($data['opass']));
            //$newpassword = mysqli_real_escape_string($this->db->link, md5($data['npass']));
            if(empty($oldpassword) || empty($newpassword))
            {
                 $msg="<div class='alert alert-danger'><strong>Error!</strong>Field must not be empty !</div>";
                 return $msg;  
            }
            else
            {
                $query = "UPDATE tbl_user SET Password='$newpassword' WHERE Password='$oldpassword'";
                $updatepass= $this->db->update($query);   
                 $msg="<div class='alert alert-success'><strong>Success!</strong>Password Changed Successfully.</div>";
                 return $msg;
            }
       }

    		
    }
    	    	
?>