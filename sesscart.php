<?php include 'inc/header.php';?>

<?php
     if (isset($_GET['delid'])) {
		$id = preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['delid']);
		$delsessCart = $ts->DelsessCartById($id);
	}

?>



<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$sesscartId   = $_POST['sesscartId'];
  }
  ?>

  <?php
     if (!isset($_GET['id'])) {
		 echo "<meta http-equiv='refresh' content='0;URL=?id=Apu'/>";
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
.shopping {
  margin-top: 30px;
}
.shopleft, .shopleft {
  float: left;
  text-align: center;
  width: 610px;
}
.shopleft img{outline:none}
.shopleft a,.shopright a{outline:none}

.shopright img {
  width: 270px;
  outline:none
}
 </style>

 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Payment Area</h2>

						<table class="tblone">
							<tr>
						    <th width="10%">SL</th>
								<th width="30%">Trainer Name</th>
								<th width="20%">T.Session Title</th>
                <th width="20%">Category</th>
								<th width="15%">T.Session Code</th> 
                <th width="15%">Price</th>
								<th width="10%">Action</th>
							</tr>

              <?php
							  $getsessPro = $ts->getsessCartPro();
							  if ($getsessPro) {
								  $i=0;
								  while ($result = $getsessPro->fetch_Assoc()) {
									$i++;  
								
							
							?>
							<tr>
							                  <td><?php echo $i;?></td>
								                <td><?php echo $result['trainerName'];?></td>
                                <td><?php echo $result['trainerIntro'];?></td>
                                <td><?php echo $result['category'];?></td>
                                <td> <?php echo $result['sessionNo'];?></td>
                                <td>Tk. <?php echo $result['price'];?></td>
								<td><a onclick="return confirm('Are you sure to delete!');" href="?delid=<?php echo $result['sesscartId'];?>">X</a></td>
							</tr>
							
              <?php   } }?>	
						</table>
					   
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php" style="color:#121C07; border:1px solid #1A2024; padding:5px 10px; border-radius:6px; background:#8BCE48;">Back</a>
              </div>
						<div class="shopright">
							<a href="sesspayment.php" style="margin-left:80%;color:#fff; border:1px solid #1A2024; padding:5px 10px; background:#09AC9C; border-radius:6px;">Pay For This Session</a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>




<?php include 'inc/footer.php';?>