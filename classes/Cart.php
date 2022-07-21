<?php
     
        $filepath = realpath(dirname(__FILE__));
        include_once ($filepath.'/../lib/Database.php');
        include_once ($filepath.'/../helpers/Format.php');
     
?>


<?php
    class Cart
    {
        private $db;
        private $fm;

            public function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
            } 



            public function addToCart($quantity, $id){
                $quantity = $this->fm->validation($quantity);
                $quantity = mysqli_real_escape_string($this->db->link,$quantity);
                $productId = mysqli_real_escape_string($this->db->link,$id);
                $sId = session_id();
    
                $squery =  "SELECT * FROM tbl_product WHERE productId = '$productId'";
                $result =  $this->db->select($squery)->fetch_assoc();
    
                $productName = $result['productName'];
                $price = $result['price'];
                $image = $result['image'];
    
                $chquery = "SELECT * FROM tbl_cart WHERE productId = '$productId' AND sId = '$sId'";
                $getPro =  $this->db->select($chquery);
                if ($getPro) {
                   $msg =  "Product Already Added";
                   return $msg;
                }else{
    
                $query = "INSERT INTO tbl_cart(sId,productId,productName,price,quantity,image) VALUES('$sId','$productId','$productName','$price','$quantity','$image')";
                        $Insert_row = $this->db->insert($query);
                        if ($Insert_row) {
                            header("Location:cart.php");
                        }else{
                            header("Location:404.php");
                        }
                      }
     
              } 
              
              public function getCartPro(){
                $sId = session_id();
    
                $query =  "SELECT * FROM tbl_cart WHERE sId = '$sId'";
                $result =  $this->db->select($query);
                return $result;
    
              }
    
    
              public function CartUpdateQuantity($quantity, $cartId){
                $cartId = mysqli_real_escape_string($this->db->link,$_POST['cartId']);
                $quantity = mysqli_real_escape_string($this->db->link,$_POST['quantity']);
    
                $query = "UPDATE tbl_cart 
                              SET quantity = '$quantity'
                              WHERE cartId = '$cartId'         
                    ";
                    $updated_row = $this->db->update($query);
                    if ($updated_row) {
                      header("Location:cart.php");
                    }else{
                        $msg = "<span class='error'>Quantity Not Updated</span>";
                        return $msg;
                    }
              }
    
              public function DelCartById($id){
                      $id = mysqli_real_escape_string($this->db->link,$id);
                      $query =  "DELETE FROM tbl_cart WHERE cartId = '$id'";
                      $result =  $this->db->delete($query);
                      if ($result) {
                        header("Location:cart.php");  
                      }else {
                        $msg = "<span class='error'>Cart Not Deleted</span>";
                        return $msg; 
                      }
    
              }
    
    
              public function CheckCartData(){
                $sId = session_id();
                $query =  "SELECT * FROM tbl_cart WHERE sId = '$sId'";
                $result =  $this->db->select($query);
                return $result;
    
              }
              public function DeleteCustomercart(){
                $sId = session_id();
                $query =  "DELETE FROM tbl_cart WHERE sId = '$sId'";
                $result =  $this->db->delete($query);
                return $result;
                }

                public function insertCmrOrder($cmrId){
                    $sId = session_id();
                    $query =  "SELECT * FROM tbl_cart WHERE sId = '$sId'";
                    $getPro =  $this->db->select($query);
                       if ($getPro) {
                         while ($result = $getPro->fetch_assoc()) {
                           $productId = $result['productId'];
                           $productName = $result['productName'];
                           $quantity = $result['quantity'];
                           $price = $result['price'];
                           $image = $result['image'];
                           $query = "INSERT INTO tbl_order(cmrId,productId,productName,quantity,price,image) VALUES('$cmrId','$productId','$productName','$quantity','$price','$image')";
                           $Insert_row = $this->db->insert($query);
                           
                         }
                       }
                    }

                    public function payableAmount($id){
                      $query =  "SELECT price FROM tbl_order WHERE cmrId = '$id' AND date = now()";
                      $result =  $this->db->select($query);
                      return $result;
        
                    }



                    public function getOrderedProduct($cmrId){
                      $query =  "SELECT * FROM tbl_order WHERE cmrId = '$cmrId' ORDER BY date DESC";
                      $result =  $this->db->select($query);
                      return $result;
        
                    }

                    


                    public function getAllOrder(){
                      $query =  "SELECT * FROM tbl_order ORDER BY cmrId DESC";
                      $result =  $this->db->select($query);
                      return $result;
          
                    }
        
                    public function orderShift($id,$date,$price){
                      $id = mysqli_real_escape_string($this->db->link,$id);
                      $date = mysqli_real_escape_string($this->db->link,$date);
                      $price = mysqli_real_escape_string($this->db->link,$price);
        
        
                      $query = "UPDATE tbl_order 
                                  SET 
                                  status = '1'
                                  WHERE cmrId = '$id' AND date='$date' AND price='$price'         
                        ";
                        $updated_row = $this->db->update($query);
                        if ($updated_row) {
                              $msg = "<span class='success'> Shifted Sucessfully</span>";
                              return $msg;
                        }else{
                            $msg = "<span class='error'> Not Shifted</span>";
                            return $msg;
                        }
        
                    }
        
        
                    public function DelOrderById($id,$date,$price){
                      $id = mysqli_real_escape_string($this->db->link,$id);
                      $date = mysqli_real_escape_string($this->db->link,$date);
                      $price = mysqli_real_escape_string($this->db->link,$price);
        
                      $query =  "DELETE FROM tbl_order WHERE cmrId = '$id' AND date='$date' AND price='$price'";
                      $result =  $this->db->delete($query);
                      return $result;
                    }


                    public function SesspayableAmount($id){
                      $query =  "SELECT price FROM tbl_request WHERE cmrId = '$id' AND date = now()";
                      $result =  $this->db->select($query);
                      return $result;
        
                    }

                    public function getRequestedCmr($cmrId){
                      $query =  "SELECT * FROM tbl_request WHERE cmrId = '$cmrId' ORDER BY date DESC";
                      $result =  $this->db->select($query);
                      return $result;
                    }

                    public function getAllRequest(){
                      $query =  "SELECT * FROM tbl_request ORDER BY cmrId DESC";
                      $result =  $this->db->select($query);
                      return $result;
          
                    }


                    public function requestApprove($id,$date,$price){
                      $id = mysqli_real_escape_string($this->db->link,$id);
                      $date = mysqli_real_escape_string($this->db->link,$date);
                      $price = mysqli_real_escape_string($this->db->link,$price);
        
        
                      $query = "UPDATE tbl_request 
                                  SET 
                                  status = '1'
                                  WHERE cmrId = '$id' AND date='$date' AND price='$price'         
                        ";
                        $updated_row = $this->db->update($query);
                        if ($updated_row) {
                              $msg = "<span class='success'> Approved Sucessfully</span>";
                              return $msg;
                        }else{
                            $msg = "<span class='error'> Not Approved</span>";
                            return $msg;
                        }
        
                    }
        
        
                    public function DelRequestById($id,$date,$price){
                      $id = mysqli_real_escape_string($this->db->link,$id);
                      $date = mysqli_real_escape_string($this->db->link,$date);
                      $price = mysqli_real_escape_string($this->db->link,$price);
        
                      $query =  "DELETE FROM tbl_request WHERE cmrId = '$id' AND date='$date' AND price='$price'";
                      $result =  $this->db->delete($query);
                      return $result;
                    }
            }    