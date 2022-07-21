
<?php
     
     $filepath = realpath(dirname(__FILE__));
     include_once ($filepath.'/../lib/Database.php');
     include_once ($filepath.'/../helpers/Format.php');

            //Import PHPMailer classes into the global namespace
        //These must be at the top of your script, not inside a function
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;
  
?> 


<?php
    class Customer
    {
        private $db;
        private $fm;

            public function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
            }

            public function customerRegistration($data){

            


                $fname = mysqli_real_escape_string($this->db->link,$data['fname']);
                $lname = mysqli_real_escape_string($this->db->link,$data['lname']);
                $address = mysqli_real_escape_string($this->db->link,$data['address']);
                $city = mysqli_real_escape_string($this->db->link,$data['city']);
                $country = mysqli_real_escape_string($this->db->link,$data['country']);
                $zip = mysqli_real_escape_string($this->db->link,$data['zip']);
                $phone = mysqli_real_escape_string($this->db->link,$data['phone']);
                $email = mysqli_real_escape_string($this->db->link,$data['email']);
                $pass =  mysqli_real_escape_string($this->db->link,md5($data['password']));
                $Confirmpass = mysqli_real_escape_string($this->db->link,md5($data['Conpassword']));
                $code = mysqli_real_escape_string($this->db->link,md5(rand()));

                if (mysqli_num_rows(mysqli_query($this->db->link,"SELECT * FROM tbl_customer WHERE email='{$email}'"))>0) {
                    $msg = "The Email Has been Already Exist";
                    return $msg;
                }

                else {
                     if ($pass ===  $Confirmpass) {
                        $query = "INSERT INTO tbl_customer(fname,lname,address,city,country,zip,phone,email,pass,code) VALUES('$fname','$lname','$address','$city','$country','$zip','$phone','$email','$pass','$code')";
                        $Insert_row = $this->db->insert($query);
                        if ($Insert_row) {

                             $subject = "Email Activation";
                             $body = "Hi $fname. Click here to activate your account http://localhost/Gym_web/activate.php?token=$code ";
                             $sender_email = "From: apusarkar811@gmail.com";
                             if (mail($email, $subject, $body, $sender_email)) {
                                $msg = "<span style='color:red; margin:20px 30px;'>Registered Successfully</span>";
                                return $msg;
                                 
                             }else {
                                echo "Email sending Failed";
                             }
                        }
                        else{
                            $msg = "<span style='color:red;'>Something Went Wrong</span>";
                            return $msg;
                          }
                     } else {
                        $msg = "<span style='color:red; margin:20px 30px;'>Password and Confirm Password Doesn't Matched</span>";
                        return $msg;
                     }

                }

                
               
            }

            public function customerLogin($data){
                $email = mysqli_real_escape_string($this->db->link,$data['email']);
                $pass = mysqli_real_escape_string($this->db->link,md5($data['password']));
                if (empty($email) || empty($pass)) {
                    $msg = "<span style='color:red;'>Field Must not be Empty</span>";
                    return $msg;
                }

                $query = "SELECT * FROM tbl_customer WHERE email='$email' AND pass='$pass'";
                $result = $this->db->select($query);
                if ($result!=false) {
                    $value = $result->fetch_assoc();
                    Session::set("cusLogin",true);
                    Session::set("cmrId",$value['id']);
                    Session::set("cmrName",$value['fname']);
                    header("Location:index.php");

                }else {
                    $msg = "<span style='color:red;'>Login Failed !</span>";
                    return $msg;
                }
  
            }

            public function getCustomerData($id){
                $query =  "SELECT * FROM tbl_customer WHERE id = '$id'";
                $result =  $this->db->select($query);
                return $result;
    
              }

              public function customerDUpdate($data,$id){
                $name = mysqli_real_escape_string($this->db->link,$data['fname']);
                $address = mysqli_real_escape_string($this->db->link,$data['address']);
                $city = mysqli_real_escape_string($this->db->link,$data['city']);              
                $zip = mysqli_real_escape_string($this->db->link,$data['zip']);
                $phone = mysqli_real_escape_string($this->db->link,$data['phone']);
                $email = mysqli_real_escape_string($this->db->link,$data['email']);
                


                if ($name == "" || $address == "" || $city == "" || $zip == "" || $phone == "" || $email == "") {
                    $msg = "<span style='color:red;'>Field Must not be Empty</span>";
                    return $msg;
                   }

              else {
                    $query = "UPDATE tbl_customer 
                    SET 
                    fname = '$name',
                    address = '$address',
                    zip = '$zip',
                    phone = '$phone',
                    email = '$email',
                    city = '$city'
                    WHERE id = '$id'         
                    ";
                    $updated_row = $this->db->update($query);
                    if ($updated_row) {
                    $msg = "<span class='success'>Your Details Updated Sucessfully</span>";
                    return $msg;
                    }else{
                     $msg = "<span class='error'>Your Details Not Updated</span>";
                    return $msg;
                    }
                }
              }


              public function getCustData($id){
                $query =  "SELECT * FROM tbl_customer WHERE id = '$id'";
                $result =  $this->db->select($query);
                return $result;
    
              }


             
    }