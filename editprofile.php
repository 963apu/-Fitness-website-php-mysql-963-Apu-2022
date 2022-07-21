<?php include 'inc/header.php';?>
<?php
      $login = Session::get("cusLogin");
	  if ($login == false) {
		 header(Location:login.php);
	  }
    
?>
<?php
			  $id = Session::get("cmrId");		  
			  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
			   $customerDupdate = $cmr->customerDUpdate($_POST,$id);
				   }
?>
 <style>
     .content{
	padding:20px 0;
	background:#FFF;
}
.content h2{ 
	font-size:23px;
	color:#6C6C6C;
	font-family: 'Monda', sans-serif;
}



.cartpage {
  border: 1px solid #ddd;
  overflow: hidden;
  padding: 10px;
}
.cartpage h2 {
  border-bottom: 1px solid #ddd;
  font-size: 30px;
  margin-bottom: 20px;
  width: 141px;
}
.tblone {
  border: 1px solid #fff;
  margin-bottom: 12px;
  width: 100%;
}
.tblone th {
  background: #666 none repeat scroll 0 0;
  color: #fff;
  font-size: 20px;
  padding: 5px 8px;
  text-align: center;
}
.tblone td{padding:10px;text-align:center;}

table.tblone tr:nth-child(2n+1){background:#fff;height:30px;}
table.tblone tr:nth-child(2n){background:#fdf0f1;height:30px;}
table.tblone input[type="number"] {
  border: 1px solid #ddd;
  padding: 2px;
  width: 60px;
}
table.tblone input[type="submit"] {
  background: #333 none repeat scroll 0 0;
  border: 1px solid #000;
  border-radius: 3px;
  color: #fff;
  cursor: pointer;
  font-size: 14px;
  padding: 1px 5px;
}
table.tblone a {
  color: #fe5800;
  font-weight: bold;
  text-decoration: none;
}
table.tblone a:hover{color: #000;}
table.tblone img {
  height: 20px;
  width: 30px;
}
     .tblone{
         width:550px;
         margin:0 auto;
         border:2px solid #0CB58D;
     }
     .tblone tr td{
         text-align:justify;
     }

     .back{
    width:120px;
    margin: 5px auto 0;
    padding: 7px 0;
    text-align: center;
    display: block;
    background:#286B64;
    border: 1px solid #333;
    color:#fff;
    font-size: 16px;
    border-radius: 6px;

}
.back:hover{
    background:#808080 ;
    color: #286B64;
}
 </style>
 <div class="main">
    <div class="content">
    	<div class="section group">
            <?php 
               $id =  Session::get("cmrId");
               $getCdata = $cmr->getCustomerData($id);
               if ($getCdata ) {
                   while ($result = $getCdata->fetch_assoc()) {
                      
            
            ?>
            <form action="" method="post">
			<table class="tblone">
                <?php
                   if (isset($customerDupdate)) {
                     echo " <tr><td colspan='5' style='font-size:18px; font-weight: 800; color:#0CB58D;'>".$customerDupdate."</td></tr>";
                   }
                ?>
                <tr>
                     <td colspan="2" style="font-size:18px; font-weight: 800; color:#0CB58D;">My Profile</td>
                  </tr>
                 <tr>
                     <td width="20%">Name</td>
                     <td width="5%">:</td>
                     <td><input type="text" name="fname" value="<?php echo $result['fname'];?>"></td>
                  </tr>
                  <tr>
                     <td>phone</td>
                     <td>:</td>
                     <td><input type="text" name="phone" value="<?php echo $result['phone'];?>"></td>
                  </tr>
                  <tr>
                     <td>Email</td>
                     <td>:</td>
                     <td><input type="text" name="email" value="<?php echo $result['email'];?>"></td>
                  </tr>
                  <tr>
                     <td>Address</td>
                     <td>:</td>
                     <td><input type="text" name="address" value="<?php echo $result['address'];?>"></td>
                  </tr>
                  <tr>
                     <td>City</td>
                     <td>:</td>
                     <td><input type="text" name="city" value="<?php echo $result['city'];?>"></td>
                  </tr>
                  <tr>
                     <td>Zip-Code</td>
                     <td>:</td>
                     <td><input type="text" name="zip" value="<?php echo $result['zip'];?>"></td>
                  </tr>
                  <tr>
                     <td></td>
                     <td></td>
                     <td><input type="submit" name="submit" value="Save"></td>
                  </tr>
            </table>
            </form>
            <?php } }  ?>
				
          </div>
 		</div>

        
 	</div>

     <div class="back">
                  <a href="profile.php">Previous</a>
             </div>

	 <?php include 'inc/footer.php';?>