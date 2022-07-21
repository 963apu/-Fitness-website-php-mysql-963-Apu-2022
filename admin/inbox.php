<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
   $filepath = realpath(dirname(__FILE__));
   include ($filepath.'/../classes/Cart.php');
   $ct = new Cart();
   $fm = new Format();

   ?>
   <?php
        if (isset($_GET['shiftid'])) {
			$id = $_GET['shiftid'];
			$time = $_GET['time'];
			$price = $_GET['price'];
			$shift = $ct->orderShift($id,$time,$price);
		}
 
 ?>

<?php
			if (isset($_GET['delid'])) {
			$id = $_GET['delid'];
			$time = $_GET['time'];
			$price = $_GET['price'];
			$shift = $ct->DelOrderById($id,$time,$price);
			}		

                                  ?>


        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <div class="block">
				<?php
					  if (isset($shift)) {
						echo "$shift";
					  }
					?>           
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
						    <th>Customer Id</th>
							<th>Product Id</th>
							<th>Product</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Order Time</th>
							<th>Address</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						
						  $getOrder = $ct->getAllOrder();
						  if ($getOrder) {
							while ($result = $getOrder->fetch_assoc()) {
								
							
						?>
						<tr class="odd gradeX">
							<td><?php echo $result['cmrId'];?></td>
							<td><?php echo $result['productId'];?></td>
							<td><?php echo $result['productName'];?></td>
							<td><?php echo $result['quantity'];?></td>
							<td><?php echo $result['price'];?></td>
							<td><?php echo $fm->formatdate($result['date']);?></td>
							<td><a href="customerAd.php?custId=<?php echo $result['cmrId'];?>"> View Details</a>                          
							</td>
							<?php
							   if ($result['status'] == '0') { ?>
								<td><a href="?shiftid=<?php echo $result['cmrId'];?>&price=<?php echo $result['price'];?>&time=<?php echo $result['date'];?>">Shift</a></td>
							<?php   }  elseif($result['status'] == '2') {?>
								<td>Pending</td>
							<?php } else { ?>
								<td><a href="?delid=<?php echo $result['cmrId'];?>&price=<?php echo $result['price'];?>&time=<?php echo $result['date'];?>">Remove</a></td>
								<?php }?>
						</tr>
						<?php } }?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
