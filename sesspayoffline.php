*<?php include 'inc/header.php';?>
<?php
      $login = Session::get("cusLogin");
	  if ($login == false) {
		 header("Location:login.php");
	  }
    
?>
<?php
     if (isset($_GET['requestid']) && $_GET['requestid'] == 'request') {
      $cmrId = Session::get("cmrId");
        $insertRequest = $ts->insertCmrRequest($cmrId);
        $delsesscart = $ts->DeleteCustomersesscart();
        header("Location:success.php");
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
								<th>Trainer Name</th>
								<th>Session Name</th>
                <th>Session Code</th>
                <th>Category</th>
								<th>Price</th>
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
                <td><?php echo $result['sessionNo'];?></td>
                <td><?php echo $result['category'];?></td>
                <td>Tk. <?php echo $result['price'];?></td>
								
							</tr>
							
							<?php   } }?>
							
						</table>
		
             </div>
       </div>
   </div>
</div>
<div class="ordernow">
          <a href="?requestid=request">Place Your Request</a>
  </div>
<?php include 'inc/footer.php';?>