<?php
     
        $filepath = realpath(dirname(__FILE__));
        include_once ($filepath.'/../lib/Database.php');
        include_once ($filepath.'/../helpers/Format.php');
     
      
?>

<?php
    class Packages{
        private $db;
        private $fm;

        public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
        }
     


        public function packInsert($data , $file){
            $packName = mysqli_real_escape_string($this->db->link,$data['packName']);
            $sessionNo = mysqli_real_escape_string($this->db->link,$data['sessionNo']);
            $price = mysqli_real_escape_string($this->db->link,$data['price']);
            $body = mysqli_real_escape_string($this->db->link,$data['body']);
            $type = mysqli_real_escape_string($this->db->link,$data['type']);

    
            if ($packName == "" || $sessionNo == "" || $body == "" || $price == "" || $type == "") {
                $msg = "<span class='error'>Field Must not be Empty</span>";
                 return $msg;
            }
                $query = "INSERT INTO tbl_package(packName,sessionNo,body,price,type) VALUES('$packName','$sessionNo','$body','$price','$type')";
                $Insert_row = $this->db->insert($query);
                if ($Insert_row) {
                    $msg = "<span class='success'>Package Inserted Sucessfully</span>";
                    return $msg;
                }else{
                  $msg = "<span class='error'>Package Not Inserted</span>";
                  return $msg;
                }
 
 
            
           
        }

        public function getAllPack(){
            $query =  "SELECT * FROM tbl_package ORDER BY packId DESC";
            $result =  $this->db->select($query);
            return $result;
        }

        public function getPackById($id){
            $query =  "SELECT * FROM tbl_package WHERE packId = '$id'";
            $result =  $this->db->select($query);
            return $result;
        }


        public function PackUpdate($data , $file, $id){

            $packName = mysqli_real_escape_string($this->db->link,$data['packName']);
            $sessionNo = mysqli_real_escape_string($this->db->link,$data['sessionNo']);
            $body = mysqli_real_escape_string($this->db->link,$data['body']);
            $price = mysqli_real_escape_string($this->db->link,$data['price']);
            $type = mysqli_real_escape_string($this->db->link,$data['type']);

    
            if ($packName == "" || $sessionNo == "" || $body == "" || $price == "" || $type == "") {
                $msg = "<span class='error'>Field Must not be Empty</span>";
                return $msg;
            }
                $query = "UPDATE tbl_package
                SET 
                packName = '$packName',
                sessionNo = '$sessionNo',
                body = '$body',
                price = '$price',
                type = '$type' 
                WHERE packId='$id'";
                 $updated_row = $this->db->update($query);
                if ($updated_row) {
                    $msg = "<span class='success'>Pack Updated Sucessfully</span>";
                    return $msg;
                }else{
                $msg = "<span class='error'>Pack Not updated</span>";
                return $msg;
                }


        

        
    }
       public function DelPackById($id){

                $query =  "DELETE FROM tbl_package WHERE packId = '$id'";
                $result =  $this->db->delete($query);
                if ($result) {
                $msg = "<span class='success'>Package Deleted Sucessfully</span>";
                    return $msg;
                }else {
                $msg = "<span class='error'>Package Not Deleted</span>";
                return $msg;
                }

    

       }
       public function getPackage(){
        $query =  "SELECT * FROM tbl_package ORDER BY packId";
        $result =  $this->db->select($query);
        return $result;
       }



    }

?>