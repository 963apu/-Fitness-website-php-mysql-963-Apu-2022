<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
   $filepath = realpath(dirname(__FILE__));
   include ($filepath.'/../classes/customer.php');
   ?>
<?php
    if (!isset($_GET['custId']) || $_GET['custId'] == NULL) {
        echo"header('Location:inbox.php')";
    }else{
        
        $id = preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['custId']);
    }

 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       echo"<script>window.location = 'requestInbox.php';</script>";
 }


?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>View Customer Details</h2>
               <div class="block copyblock"> 
              

                   <?php
                     $cmr = new Customer();
                     $getCust = $cmr->getCustomerData($id);
                     if ($getCust) {
                         while ($result = $getCust->fetch_assoc()) {
                             
                      
                   
                   ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>Name :</td>
                            <td>
                                <input type="text" readonly="readonly" Value="<?php echo $result['fname'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Address :</td>
                            <td>
                                <input type="text" readonly="readonly" Value="<?php echo $result['address'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>City :</td>
                            <td>
                                <input type="text" readonly="readonly"  Value="<?php echo $result['city'];?>" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>Country :</td>
                            <td>
                                <input type="text" readonly="readonly" Value="<?php echo $result['country'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Zip :</td>
                            <td>
                                <input type="text" readonly="readonly" Value="<?php echo $result['zip'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>phone :</td>
                            <td>
                                <input type="text" readonly="readonly" Value="<?php echo $result['phone'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Email :</td>
                            <td>
                                <input type="text" readonly="readonly" Value="<?php echo $result['email'];?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit"  name="submit" Value="OK" />
                            </td>
                        </tr> 
                    </form>
                    <?php } } ?>
                </div>
            </div> 
        </div>
 


