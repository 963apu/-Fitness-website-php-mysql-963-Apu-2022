<?php include 'inc/header.php';?>

<?php
      $login = Session::get("cusLogin");
	  if ($login == false) {
		 header("Location:login.php");
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
 </style>
							    
 <div class="main">
    <div class="content">
        <div class="Order">
           <h2>Your Order List</h2>

           <table class="tblone">
							<tr>
						     	<th>No</th>
								<th>Trainer Name</th>
								<th>Category</th>
								<th>Title</th>
								<th>Price</th>
								<th>Date</th>
								<th>Status</th>
								<th>Action</th>
							</tr>

							<?php
                              $cmrId = Session::get("cmrId");	
							  $getRequest = $ct->getRequestedCmr($cmrId); 
							  if ($getRequest) {
								  $i=0;
								  while ($result = $getRequest->fetch_Assoc()) {
									$i++;  
								
							
							?>
							<tr>
							    <td><?php echo $i;?></td>
								<td><?php echo $result['trainerName'];?></td>
								<td><?php echo $result['category'];?></td>
								<td><?php echo $result['trainerIntro'];?></td>
								<td>Tk.<?php echo $result['price'];?></td>
								<td><?php echo $fm->formatdate($result['date']);?></td>
								<td>
									<?php 
									  if ($result['status'] == '0') {
										echo "<span style='color: blue;  font-weight:bold;'>Requested</span>";
									  }

									  else {
										echo "<span style='color: Green; font-weight:bold;'>Approved</span>";
									  }
									
									
									?>
								
								</td>
                                <td><a href="">X</a></td>							
							
								
							</tr>
						
							
							<?php   } }?>
							
						</table>

        </div>
    	 
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

 <?php include 'inc/footer.php';?>