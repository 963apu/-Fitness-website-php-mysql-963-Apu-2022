<?php
     
        $filepath = realpath(dirname(__FILE__));
        include_once ($filepath.'/../lib/Database.php');
        include_once ($filepath.'/../helpers/Format.php');
     
      
?>

<?php
    class Tsession {
        private $db;
        private $fm;

        public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
        }
     


        public function tsessionInsert($data , $file){
            $trainerName = mysqli_real_escape_string($this->db->link,$data['trainerName']);
            $sessionNo = mysqli_real_escape_string($this->db->link,$data['sessionNo']);
            $category = mysqli_real_escape_string($this->db->link,$data['category']);
            $sessionIntro = mysqli_real_escape_string($this->db->link,$data['sessionIntro']);
            $price = mysqli_real_escape_string($this->db->link,$data['price']);
            $infoone = mysqli_real_escape_string($this->db->link,$data['infoone']);
            $infotwo = mysqli_real_escape_string($this->db->link,$data['infotwo']);
            $infothree = mysqli_real_escape_string($this->db->link,$data['infothree']);
            $infofour = mysqli_real_escape_string($this->db->link,$data['infofour']);
            $infofive = mysqli_real_escape_string($this->db->link,$data['infofive']);
            $infosix = mysqli_real_escape_string($this->db->link,$data['infosix']);
            

    
            if ($trainerName == "" || $sessionNo == "" || $category == "" || $sessionIntro == "" || $price == "" || $infoone == "" ||  $infotwo == "" ||  $infothree == "" ||  $infofour == "" ||  $infofive == "" ||  $infosix == "") {
                $msg = "<span class='error'>Field Must not be Empty</span>";
                 return $msg;
            }
                $query = "INSERT INTO tbl_tsession(trainerName,sessionNo,category,trainerIntro,price,infoone,infotwo,infothree,infofour,infofive,infosix) VALUES('$trainerName ','$sessionNo','$category','$sessionIntro','$price','$infoone','$infotwo','$infothree','$infofour','$infofive','$infosix')";
                $Insert_row = $this->db->insert($query);
                if ($Insert_row) {
                    $msg = "<span class='success'>Training Session Inserted Sucessfully</span>";
                    return $msg;
                }else{
                  $msg = "<span class='error'> Training Session Package Not Inserted</span>";
                  return $msg;
                }
 
 
            
           
        }

        public function getAllTsession(){
            $query =  "SELECT * FROM tbl_tsession ORDER BY id DESC";
            $result =  $this->db->select($query);
            return $result;
        }

        public function getTsessById($id){
            $query =  "SELECT * FROM tbl_tsession WHERE id = '$id'";
            $result =  $this->db->select($query);
            return $result;
        }

        public function tsessUpdate($data , $file, $id){

            $trainerName = mysqli_real_escape_string($this->db->link,$data['trainerName']);
            $sessionNo = mysqli_real_escape_string($this->db->link,$data['sessionNo']);
            $category = mysqli_real_escape_string($this->db->link,$data['category']);
            $sessionIntro = mysqli_real_escape_string($this->db->link,$data['sessionIntro']);
            $price = mysqli_real_escape_string($this->db->link,$data['price']);
            $infoone = mysqli_real_escape_string($this->db->link,$data['infoone']);
            $infotwo = mysqli_real_escape_string($this->db->link,$data['infotwo']);
            $infothree = mysqli_real_escape_string($this->db->link,$data['infothree']);
            $infofour = mysqli_real_escape_string($this->db->link,$data['infofour']);
            $infofive = mysqli_real_escape_string($this->db->link,$data['infofive']);
            $infosix = mysqli_real_escape_string($this->db->link,$data['infosix']);

    
            if ($trainerName == "" || $sessionNo == ""|| $category == "" || $sessionIntro == "" || $price == "" || $infoone == "" ||  $infotwo == "" ||  $infothree == "" ||  $infofour == "" ||  $infofive == "" ||  $infosix == "") {
                $msg = "<span class='error'>Field Must not be Empty</span>";
                return $msg;
            }
                $query = "UPDATE tbl_tsession
                SET 
                trainerName = '$trainerName',
                sessionNo = '$sessionNo',
                category = '$category',
                trainerIntro = '$sessionIntro',
                price = '$price',
                infoone = '$infoone',
                infotwo = '$infotwo',
                infothree = '$infothree',
                infofour= '$infofour',
                infofive= '$infofive',
                infosix = '$infosix' 
                WHERE id='$id'";
                 $updated_row = $this->db->update($query);
                if ($updated_row) {
                    $msg = "<span class='success'>Training Session Updated Sucessfully</span>";
                    return $msg;
                }else{
                $msg = "<span class='error'>training Session Not updated</span>";
                return $msg;
                }


        

        
    }
       public function DelTsessById($id){

                $query =  "DELETE FROM tbl_tsession WHERE id = '$id'";
                $result =  $this->db->delete($query);
                if ($result) {
                $msg = "<span class='success'>Training Session Deleted Sucessfully</span>";
                    return $msg;
                }else {
                $msg = "<span class='error'>Training Session Not Deleted</span>";
                return $msg;
                }

    

       }

       public function getTsession(){
        $query =  "SELECT * FROM tbl_tsession ORDER BY id";
        $result =  $this->db->select($query);
        return $result;
       }

       public Function DetailsSess($id){
        $query =  "SELECT * FROM tbl_tsession WHERE id='$id' ORDER BY id DESC";
        $result =  $this->db->select($query);
        return $result;
       }


       public function  sessaddToCart($id){
        
                $sessId = mysqli_real_escape_string($this->db->link,$id);
                $sId = session_id();
    
                $squery =  "SELECT * FROM tbl_tsession WHERE id = '$sessId'";
                $result =  $this->db->select($squery)->fetch_assoc();
    
                $trainerName = $result['trainerName'];
                $sessionIntro = $result['trainerIntro'];
                $sessionNo = $result['sessionNo'];
                $category = $result['category'];
                $price = $result['price'];
    
                $chquery = "SELECT * FROM tbl_sesscart WHERE id = '$sessId' AND sId = '$sId'";
                $getPro =  $this->db->select($chquery);
                if ($getPro) {
                   $msg =  "<span style='color:red; font-size:20px;'>Session Already Added</span>";
                   return $msg;
                }else{
    
                $query = "INSERT INTO tbl_sesscart(sId,id,trainerName,trainerIntro,sessionNo,category,price) VALUES('$sId','$sessId','$trainerName','$sessionIntro','$sessionNo','$category','$price')";
                        $Insert_row = $this->db->insert($query);
                        if ($Insert_row) {
                            header("Location:sesscart.php");
                        }else{
                            header("Location:404.php");
                        }
                      }
     
              } 

              public function getsessCartPro(){
                $sId = session_id();
                $query =  "SELECT * FROM tbl_sesscart WHERE sId = '$sId'";
                $result =  $this->db->select($query);
                return $result;
              }


              public function insertCmrRequest($cmrId){
                     $sId = session_id();
                     $query =  "SELECT * FROM tbl_sesscart WHERE sId = '$sId'";
                     $getPro =  $this->db->select($query);
                       if ($getPro) {
                         while ($result = $getPro->fetch_assoc()) {
                           $sessId = $result['id'];
                           $trainerName = $result['trainerName'];
                           $sessionIntro = $result['trainerIntro'];
                           $sessionNo = $result['sessionNo'];
                           $category = $result['category'];
                           $price = $result['price'];
                           $query = "INSERT INTO tbl_request(cmrId,id,trainerName,trainerIntro,sessionNo,category,price) VALUES('$cmrId','$sessId','$trainerName','$sessionIntro','$sessionNo','$category','$price')";
                           $Insert_row = $this->db->insert($query);
                           
                         }
                       }
              }
              public function DeleteCustomersesscart(){
                $sId = session_id();
                $query =  "DELETE FROM tbl_sesscart WHERE sId = '$sId'";
                $result =  $this->db->delete($query);
                return $result;
                }

                public function ChecksessCartData(){
                    $sId = session_id();
                    $query =  "SELECT * FROM tbl_sesscart WHERE sId = '$sId'";
                    $result =  $this->db->select($query);
                    return $result;
                }


                public function DelsessCartById($id){
                    $sId = session_id();
                    $query =  "DELETE FROM tbl_sesscart WHERE sesscartId = '$id'";
                    $result =  $this->db->delete($query);
                    return $result;
                }


            }