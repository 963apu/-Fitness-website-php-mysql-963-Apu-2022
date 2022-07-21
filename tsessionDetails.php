<?php include 'inc/header.php';?>

<?php
   $ts = new Tsession();
   if (!isset($_GET['reqid']) || $_GET['reqid'] == NULL) {
	header("Location:404.php");
}else{

	$id = preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['reqid']);
}

   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sessaddcart = $ts->sessaddToCart($id); 
  }
 


?>
<style>

.content{
     width: 100%;
     position: absolute;
     top: 20%;
 }
 .left-col{
     margin-left: 6%;
     margin-bottom:50px;
 }
 .left-col p{
  font-size:25px; 
  font-weight:bold; 
  
  padding: 8px 20px;;
  margin-right:-10px;
  margin:10px 80px;
  width: 25%;

 }

.btn button{
     display:block;
     float: right;
     width:20%;
     padding: 10px 0px;
     box-sizing: border-box;
     margin-right: 42%;
     margin-top:-20%;
     border-radius:8px;
     cursor:pointer;
     background:#cf3476;
     color:#fff;
     font-size:18px;


 }
 .btnone a{
     display:block;
     float: right;
     width:20%;
     padding: 10px 70px;
     box-sizing: border-box;
     margin-right: 42%;
     margin-top:-18%;
     border-radius:8px;
     cursor:pointer;
     background:#00b3b3;
     color:#fff;
     font-size:18px;


 }
 .description{
   margin:400px 180px;
   bottom: 100px;
  }
  .description h2{
    border: 1px solid #cf3476;
    background:#3DC28E;
    color:#fff;
    border-radius:6px;
    padding: 10px 5px; 
  }




</style>
	
		

<div class="content">	
<?php
			      $getSess = $ts->DetailsSess($id);
			      if ($getSess) {
					  while ($result =  $getSess->fetch_assoc()) {
					
			  ?>
   <div class="left-col">	

    
        <p style="color: #EB2789; padding: 0 15px;">Trainer  : <?php echo $result['trainerName'];?></p>
        <p style="color: #10B377; padding: 0 15px;"> Title    : <?php echo $result['trainerIntro'];?><br><br></p>
        <p style="color: #10B377; padding: 0 15px;">Category : <?php echo $result['category'];?><br><br></p>
        <p style="color: #007acc; padding: 0 15px;">Session Code : <?php echo $result['sessionNo'];?></p>
        
        </div>

       <form action="" method="post">
        <div class="btn">
        <button name="submit">Next</button>
        </div>
        <br>
        <br>
        <div class="btnone">
        <a href="sesscart.php">To Chose Session</a>
        </div>
        </form>  
   </div>


</div>


<div class="description">
     <br>
     <?php
        if (isset($sessaddcart)) {
           echo " $sessaddcart";
             }
         ?>
         <br>
           <h2>Session Details :</h2><br>
         
           <div>
             <p><?php echo $result['infoone'];?></p>
             <p><?php echo $result['infotwo'];?></p>
             <p><?php echo $result['infothree'];?></p>
             <p><?php echo $result['infofour'];?></p>
             <p><?php echo $result['infofive'];?></p>
             <p><?php echo $result['infosix'];?></p>
           </div>
   </div>
   <?php } } ?>

<?php include 'inc/footer.php';?>  