<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Packages.php';?>
<?php include_once '../helpers/Format.php';?>

<?php
    $pk =  new Packages();
	$fm = new Format();

	if ($_GET['delpackid']) {
		$id = $_GET['delpackid'];
		$id = preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['delpackid']);
		$delPack = $pk->DelPackById($id);
	}
  

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block">
		<?php
                       if (isset($delPack)) {
                           echo "$delPack";
                       }
					   ?>      
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>Package No</th>
					<th>Session Code</th>
					<th>Description</th>
					<th>price</th>
					<th>type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php 
			      $getpack = $pk->getAllPack(); 
			      if ($getpack) {
					  $i=0;
					  while ($result = $getpack->fetch_assoc()) {
						  $i++;
					 
			 
			 ?>
				<tr class="odd gradeX">
					<td><?php echo $result['packName'];?></td>
					<td><?php echo $result['sessionNo'];?></td>
					<td><?php echo $fm->textShorten($result['body'],100);?></td>
					<td><?php echo $result['price'];?></td>
					<td class="center"><?php echo $result['type'];?></td>
					<td><a href="packedit.php?editpackid=<?php echo $result['packId'];?>">Edit</a> || <a onclick="return confirm('Are You Sure to Delete!')" href="?delpackid=<?php echo $result['packId'];?>">Delete</a></td>
				</tr>
			</tbody>
			<?php } }?>
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