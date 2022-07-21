<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Tsession.php';?>
<?php include_once '../helpers/Format.php';?>

<?php
    $ts =  new Tsession();
	$fm = new Format();

	if ($_GET['delTsessid']) {
		$id = $_GET['delTsessid'];
		$id = preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['delTsessid']);
		$delTsess = $ts->DelTsessById($id);
	}
  

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block">
		<?php
                       if (isset($delTsess)) {
                           echo "$delTsess";
                       }
					   ?>      
            <table class="data display datatable" id="example">
			<thead>
				<tr>
                    <th>SL</th>
					<th>Trainer Name</th>
					<th>Session No</th>
					<th>category</th>
					<th>Session Intro</th>
					<th>Price</th>
					<th>Info-One</th>
					<th>Info-Two</th>
                    <th>Info-Three</th>
                    <th>Info-Four</th>
                    <th>Info-Five</th>
                    <th>Info-Six</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php 
			      $getTsess = $ts->getAllTsession(); 
			      if ($getTsess) {
					  $i=0;
					  while ($result = $getTsess->fetch_assoc()) {
						  $i++;
					 
			 
			 ?>
				<tr class="odd gradeX">
                    <td><?php echo $i;?></td>
					<td><?php echo $result['trainerName'];?></td>
					<td><?php echo $result['sessionNo'];?></td>
					<td><?php echo $result['category'];?></td>
					<td><?php echo $result['trainerIntro'];?></td>
					<td><?php echo $result['price'];?></td>
					<td><?php echo $result['infoone'];?></td>
					<td><?php echo $result['infotwo'];?></td>
                    <td><?php echo $result['infothree'];?></td>
                    <td><?php echo $result['infofour'];?></td>
                    <td><?php echo $result['infofive'];?></td>
                    <td><?php echo $result['infosix'];?></td>
					<td><a href="tsessionedit.php?editTsessid=<?php echo $result['id'];?>">Edit</a> || <a onclick="return confirm('Are You Sure to Delete!')" href="?delTsessid=<?php echo $result['id'];?>">Delete</a></td>
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