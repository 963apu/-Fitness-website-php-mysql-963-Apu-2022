<?php include 'inc/header.php';?>

<?php
     if (isset($_GET['delid'])) {
		$id = preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['delid']);
		$delCart = $ct->DelCartById($id);
	}

?>


<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $quantity = $_POST['quantity'];
	$cartId   = $_POST['cartId'];
    $cartUpdate = $ct->CartUpdateQuantity($quantity, $cartId);
	if ($quantity<=0) {
		$delCart = $ct->DelCartById($cartId); 
	}
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
			    	<h2>Your Cart</h2>

            <?php
					   if (isset($cartUpdate)) {
						   echo $cartUpdate;
					   }
					
					   ?>
					   <?php
					   if (isset($delCart)) {
						   echo $delCart;
					   }
					
					   ?>
						<table class="tblone">
							<tr>
						     	<th width="5%">SL</th>
								<th width="30%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="15%">Quantity</th> 
								<th width="15%">Total Price</th>
								<th width="10%">Action</th>
							</tr>

              <?php
							  $getPro = $ct->getCartPro();
							  if ($getPro) {
								  $i=0;
								  $qty = 0;
								  $sum = 0;
								  while ($result = $getPro->fetch_Assoc()) {
									$i++;  
								
							
							?>
							<tr>
							    <td><?php echo $i;?></td>
								<td><?php echo $result['productName'];?></td>
								<td><img src="admin/<?php echo $result['image'];?>"/></td>
								<td>Tk. <?php echo $result['price'];?></td>
								<td>
									<form action="" method="post">
									<input type="hidden" name="cartId" value="<?php echo $result['cartId'];?>"/>
										<input type="number" name="quantity" value="<?php echo $result['quantity'];?>"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td>Tk.<?php
								$total = $result['price'] * $result['quantity'];
								echo $total;?></td>

								<td><a onclick="return confirm('Are you sure to delete!');" href="?delid=<?php echo $result['cartId'];?>">X</a></td>
							</tr>

              <?php 
							$qty = $qty +  $result['quantity'];
							$sum = $sum + $total;

							Session::set('sum',$sum);
							Session::set('qty',$qty);
							 
							 ?>
							
              <?php   } }?>	
						</table>

            <?php
						  	$getData = $ct->CheckCartData();
							 if ($getData) {
						?>
						
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td><?php echo $sum;?></td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>10%</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td><?php
								   $vat = $sum * 0.1;
								   $gtotal = $sum + $vat;
								   echo $gtotal;
								?> </td>
							</tr>
					   </table>

             <?php }else{
						   header("Location:index.php");
						// echo "<span style='color:green;'>Cart Is Empty ! Please Shop Now</span>";
					   }
					    ?>
					   
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php" style="color:#121C07; border:1px solid #1A2024; padding:5px 10px; border-radius:6px; background:#8BCE48;"> Continue shoping</a>
              </div>
						<div class="shopright">
							<a href="payment.php" style="margin-left:80%;color:#fff; border:1px solid #1A2024; padding:5px 10px; background:#09AC9C; border-radius:6px;"> CheckOut</a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>




<?php include 'inc/footer.php';?>