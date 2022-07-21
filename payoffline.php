*<?php include 'inc/header.php';?>
<?php
      $login = Session::get("cusLogin");
	  if ($login == false) {
		 header("Location:login.php");
	  }
    
?>
<?php
     if (isset($_GET['orderid']) && $_GET['orderid'] == 'order') {
        $cmrId = Session::get("cmrId");
        $insertOrder = $ct->insertCmrOrder($cmrId); 
        $delcart = $ct->DeleteCustomercart();
        header("Location:sucess.php");
     }
     


?>
<style>

.tblone {
  border: 1px solid #fff;
  margin-bottom: 12px;
  width: 100%;
  border radius:6px;
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
     .tbltwo{
        width: 60%;
        float:right;
        text-align:left;
        border:2px solid #0CB58D;
        margin-right:100px;
        margin-top:12px;
        border radius:6px;

     }
     .tbltwo tr td{
        text-align: justify;
        padding: 5px 10px; 
     }
      .ordernow{
          padding-bottom:20px;
         
      }
     .ordernow a{
        background: #0CB58D none repeat scroll 0 0;
        color: #fff;
        font-size: 18px;
        padding: 5px 10px;
        border-radius: 6px;
        margin-left:44.5%;
        margin-bottom:-120px;
        
     }
     .ordernow a:hover{
        background: #fff;
        color:#808080;
     }

</style>

<div class="main">
   <div class="content">

       <div class="section group">
             <div class="division">
             <table class="tblone">
							<tr>
						     	<th>SL</th>
								<th>Product Name</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Total</th>
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
								<td>Tk. <?php echo $result['price'];?></td>
                                <td><?php echo $result['quantity'];?></td>
								<td><?php
								$total = $result['price'] * $result['quantity'];
								echo $total;?></td>
							</tr>
							<?php 
							$qty = $qty +  $result['quantity'];
							$sum = $sum + $total;
							 ?>
							
							<?php   } }?>
							
						</table>
						<?php
						  	$getData = $ct->CheckCartData();
							if ($getData) {
						?>
						<table class="tbltwo">
							<tr>
								<td>Sub Total : </td>
                                <td>:</td>
								<td>Tk. <?php echo $sum;?></td>
							</tr>
							<tr>
								<td>VAT </td>
                                <td>:</td>
								<td>10%(Tk.<?php echo $vat = $sum * 0.1;?>)</td>
							</tr>
							<tr>
								<td>Grand Total :</td>
                                <td>:</td>
								<td>Tk.<?php
								   $vat = $sum * 0.1;
								   $gtotal = $sum + $vat;
								   echo $gtotal;
								?> </td>
							</tr>
                            <tr>
								<td>Quantity </td>
                                <td>:</td>
								<td><?php echo $qty;?></td>
							</tr>
					   </table>
                  <?php }  ?>
             </div>
       </div>
   </div>
</div>
<div class="ordernow">
          <a href="?orderid=order">Place Your Order</a>
  </div>
<?php include 'inc/footer.php';?>