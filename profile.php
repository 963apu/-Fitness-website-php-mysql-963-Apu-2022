<?php include 'inc/header.php';?>
<?php
      $login = Session::get("cusLogin");
	  if ($login == false) {
		 header(Location:login.php);
	  }
    
?>
 <style>
     .tblone{
         width:600px;
         margin:0 auto;
         border:2px solid #0CB58D;
         padding:20px 32px;
         background:#008080;
         color:#ffff;
     }
     .tblone tr td{  
         text-align:justify;
         width:20px;
         line-height:5vh;
     }
 </style>
 <div class="main">
    <div class="content">
    	<div class="section group">
            <?php 
               $id =  Session::get("cmrId");
               $getCdata = $cmr->getCustData($id);
               if ($getCdata ) {
                   while ($result = $getCdata->fetch_assoc()) {
                      
            
            ?>
			<table class="tblone">
            <tr>
                    
                     <td colspan="2" style="font-size:25px; font-weight: 800; color:#0CB58D;">My Profile(<a href="editprofile.php">Update</a>)</td>
                  </tr>
                 <tr>
                     <td width="20%">Name</td>
                     <td width="5%">:</td>
                     <td><?php echo $result['fname'];?></td>
                  </tr>
                  <tr>
                     <td>phone</td>
                     <td>:</td>
                     <td><?php echo $result['phone'];?></td>
                  </tr>
                  <tr>
                     <td>Email</td>
                     <td>:</td>
                     <td><?php echo $result['email'];?></td>
                  </tr>
                  <tr>
                     <td>Address</td>
                     <td>:</td>
                     <td><?php echo $result['address'];?></td>
                  </tr>
                  <tr>
                     <td>City</td>
                     <td>:</td>
                     <td><?php echo $result['city'];?></td>
                  </tr>
                  <tr>
                     <td>Zip-Code</td>
                     <td>:</td>
                     <td><?php echo $result['zip'];?></td>
                  </tr>
                  <tr>
                     <td colspan="2" style="font-size:20px; font-weight: 800; color:#0CB58D;"><a href="request.php">Request</a></td>
                 
		            <td colspan="2" style="font-size:20px; font-weight: 800; color:#red;"><a href="orderdetails.php">Order</a></td>
                  </tr>
            </table>
            <?php } }  ?>
 		</div>
 	</div>

	 <?php include 'inc/footer.php';?>