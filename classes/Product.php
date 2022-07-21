<?php
     
        $filepath = realpath(dirname(__FILE__));
        include_once ($filepath.'/../lib/Database.php');
        include_once ($filepath.'/../helpers/Format.php');
     
      
?>
<?php  
     class Product
         {
            private $db;
            private $fm;

            public function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
            }


            public function productInsert($data , $file){
                $productName = mysqli_real_escape_string($this->db->link,$data['productName']);
                $price = mysqli_real_escape_string($this->db->link,$data['price']);
                $body = mysqli_real_escape_string($this->db->link,$data['body']);
           

                $permited  = array('jpg', 'jpeg', 'png', 'gif');
                $file_name = $_FILES['image']['name'];
                $file_size = $_FILES['image']['size'];
                $file_temp = $_FILES['image']['tmp_name'];
            
                $div = explode('.', $file_name);
                $file_ext = strtolower(end($div));
                $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                $uploaded_image = "upload/".$unique_image;
                if ($productName == "" || $price == "" || $body == "" || $file_name== "") {
                    $msg = "<span class='error'>Field Must not be Empty</span>";
                     return $msg;
                }
                elseif ($file_size >10485670) {
                    echo "<span class='error'>Image Size should be less then 10MB!
                    </span>";
                   } elseif (in_array($file_ext, $permited) === false) {
                    echo "<span class='error'>You can upload only:-"
                    .implode(', ', $permited)."</span>";
                   }else{
                    move_uploaded_file($file_temp, $uploaded_image);
                    $query = "INSERT INTO tbl_product(productName,price,body,image) VALUES('$productName','$price','$body','$uploaded_image')";
                    $Insert_row = $this->db->insert($query);
                    if ($Insert_row) {
                        $msg = "<span class='success'>Product Inserted Sucessfully</span>";
                        return $msg;
                    }else{
                      $msg = "<span class='error'>Product Not Inserted</span>";
                      return $msg;
                    }
     
     
                }
               
            }

            public function getAllProduct(){
                $query =  "SELECT * FROM tbl_product ORDER BY productId DESC";
                $result =  $this->db->select($query);
                return $result;
            } 

            public function getProById($id){
                $query =  "SELECT * FROM tbl_product WHERE productId = '$id'";
                $result =  $this->db->select($query);
                return $result;
            }


            public function DelProById($id){

                $query =  "DELETE FROM tbl_product WHERE productId = '$id'";
                $result =  $this->db->delete($query);
                if ($result) {
                  $msg = "<span class='success'>Product Deleted Sucessfully</span>";
                    return $msg;
                }else {
                  $msg = "<span class='error'>Category Not Deleted</span>";
                  return $msg;
                }
    
            }

            public function productUpdate($data , $file, $id){

                $productName = mysqli_real_escape_string($this->db->link,$data['productName']);
                $body = mysqli_real_escape_string($this->db->link,$data['body']);
                $price = mysqli_real_escape_string($this->db->link,$data['price']);

                $permited  = array('jpg', 'jpeg', 'png', 'gif');
                $file_name = $_FILES['image']['name'];
                $file_size = $_FILES['image']['size'];
                $file_temp = $_FILES['image']['tmp_name'];
            
                $div = explode('.', $file_name);
                $file_ext = strtolower(end($div));
                $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                $uploaded_image = "upload/".$unique_image;
                if ($productName == "" || $body == "" || $price == "") {
                    $msg = "<span class='error'>Field Must not be Empty</span>";
                    return $msg;
                } else{
                       if (!empty($file_name)) {
                          
                     if ($file_size >10485670) {
                            echo "<span class='error'>Image Size should be less then 10MB!
                            </span>";
                        }        

                     elseif (in_array($file_ext, $permited) === false) {
                    echo "<span class='error'>You can upload only:-"
                    .implode(', ', $permited)."</span>";
                }else{
                    move_uploaded_file($file_temp, $uploaded_image);
                    $query = "UPDATE tbl_product 
                    SET 
                    productName = '$productName',
                    body = '$body',
                    price = '$price',
                    image = '$uploaded_image'
                   
                    WHERE productId='$id'";
                     $updated_row = $this->db->update($query);
                    if ($updated_row) {
                        $msg = "<span class='success'>Product Updated Sucessfully</span>";
                        return $msg;
                    }else{
                    $msg = "<span class='error'>Product Not updated</span>";
                    return $msg;
                    }
    
    
                } 

            }else{
                
                $query = "UPDATE tbl_product 
                SET 
                productName = '$productName',
                body = '$body',
                price = '$price'
                WHERE productId='$id'";
                 $updated_row = $this->db->update($query);
                if ($updated_row) {
                    $msg = "<span class='success'>Product Updated Sucessfully</span>";
                    return $msg;
                }else{
                $msg = "<span class='error'>Product Not updated</span>";
                return $msg;
                }


            } 

            }
        }


        public function getProduct(){
            $query =  "SELECT * FROM tbl_product ORDER BY productId DESC";
            $result =  $this->db->select($query);
            return $result;
        }



        public function DetailsPd($id){
            $query =  "SELECT * FROM tbl_product WHERE productId='$id' ORDER BY productId DESC";
            $result =  $this->db->select($query);
            return $result;
            
        }
    
   
        }
