<?php include 'inc/header.php';?>



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
							<tr>
							    <td>fjfj</td>
								<td>dhh</td>
								<td><img src="" alt=""/></td>
								<td>Tk.fh</td>
								<td>
									<form action="" method="post">
									<input type="hidden" name="cartId" value=""/>
										<input type="number" name="quantity" value=""/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td>Tkbfh</td>

								<td><a onclick="return confirm('Are you sure to delete!');" href="">X</a></td>
							</tr>
							
							
						</table>
						
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td>ff</td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>10%</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td>hdh </td>
							</tr>
					   </table>
					   
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="payment.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

 

<?php include 'inc/footer.php';?> 