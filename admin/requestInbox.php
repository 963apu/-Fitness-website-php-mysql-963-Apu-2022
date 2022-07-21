<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
   $filepath = realpath(dirname(__FILE__));
   include ($filepath.'/../classes/Cart.php');
   $ct = new Cart();
   $fm = new Format();

   ?>
   <?php
        if (isset($_GET['reqid'])) {
			$id = $_GET['reqid'];
			$time = $_GET['time'];
			$price = $_GET['price'];
			$shift = $ct->requestApprove($id,$time,$price);
		}
 
 ?>

<?php
			if (isset($_GET['delid'])) {
			$id = $_GET['delid'];
			$time = $_GET['time'];
			$price = $_GET['price'];
			$shift = $ct->DelRequestById($id,$time,$price);
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
							<th>Trainer Name</th>
							<th>Title</th>
                            <th>Category</th>
							<th>Price</th>
							<th>Date</th>
                            <th>Address</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php
						
						  $getReq = $ct->getAllRequest();
						  if ($getReq) {
							while ($result =  $getReq->fetch_assoc()) {
								
							
						?>
						<tr class="odd gradeX">
							<td><?php echo $result['cmrId'];?></td>
							<td><?php echo $result['trainerName'];?></td>
							<td><?php echo $result['trainerIntro'];?></td>
                            <td><?php echo $result['category'];?></td>
							<td><?php echo $result['price'];?></td>
							<td><?php echo $fm->formatdate($result['date']);?></td>
							<td><a href="customerreqAd.php?custId=<?php echo $result['cmrId'];?>"> View Details</a>                          
							</td>
							<?php
							   if ($result['status'] == '0') { ?>
								<td><a href="?reqid=<?php echo $result['cmrId'];?>&price=<?php echo $result['price'];?>&time=<?php echo $result['date'];?>">Approve</a></td>
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
