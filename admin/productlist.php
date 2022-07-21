<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Product.php';?>
<?php include_once '../helpers/Format.php';?>

<?php
    $pd =  new Product();
	$fm = new Format();

	if ($_GET['delproid']) {
		$id = $_GET['delproid'];
		$id = preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['delproid']);
		$delProd = $pd->DelProById($id);
	}
  

?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block">  
		<?php
                       if (isset($delProd)) {
                           echo "$delProd";
                       }
					   ?>    
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>SL</th>
					<th>Product Name</th>
					<th>Description</th>
					<th>Price</th>
					<th>Image</th>
					<th></th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>


			  <?php
			      $getpd = $pd->getAllProduct(); 
			      if ($getpd) {
					  $i=0;
					  while ($result = $getpd->fetch_assoc()) {
						  $i++;
					 
			  
			 ?>
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><?php echo $result['productName'];?></td>
					<td><?php echo $fm->textShorten($result['body'],50);?></td>
					<td><?php echo $result['price'];?></td>
					<td><img src="<?php echo $result['image'];?>" height="40px" weight="30px"></td>
					<td>
							<td><a href="proedit.php?proid=<?php echo $result['productId'];?>">Edit</a> || <a onclick="return confirm('Are You Sure to Delete!')" href="?delproid=<?php echo $result['productId'];?>">Delete</a></td>
				</tr>
				<?php } } ?>
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
