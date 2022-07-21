<?php include 'inc/header.php';?>



<?php
   $pd = new Product();  
   if (!isset($_GET['prodid']) || $_GET['prodid'] == NULL) {
	 header("Location:purchase.php");
}else{

	$id = preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['prodid']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $quantity = $_POST['quantity'];
  $addcart = $ct->addToCart($quantity, $id); 
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
 }
 .left-col img{
  border: 1px solid #ddd;
  border-radius: 4px;
  padding: 10px 20px;;
  margin-right:-10px;
  margin:10px 80px;
  width: 25%;

 }
 .right-col{
     float: right;
     margin-right: 35%;
     margin-top:-15%;
     display: flex;
     align-items: center;
 }
 .right-col p{
  font-size: 25px;
  margin-top: 10px;
  font-weight: bold;
  line-height:-15px;
  color: #8bbe1b;

 }



 .inputs{
     float: right;
     margin-right: 36%;
     margin-top:-8%;
     display: flex;
     align-items: center;

 }
 .inputs input{
  width: 40%;
  padding: 10px 10px;
  box-sizing: border-box;
  border-radius:8px;
  margin-top:34px;
 }
.btn button{
     display:block;
     float: right;
     width:6%;
     padding: 10px 0px;
     box-sizing: border-box;
     margin-right: 42%;
     margin-top:-4%;
     border-radius:8px;
     cursor:pointer;
     background:#cf3476;
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
<?php
			      $getpd = $pd->DetailsPd($id);
			      if ($getpd) {
					  while ($result =  $getpd->fetch_assoc()) {
					
			  ?>		

<div class="content">
	
   <div class="left-col">
   <img src="admin/<?php echo $result['image'];?>" width="250px" height="200px">
   </div>

   <div class="right-col">
        <p><?php echo $result['productName'];?><br><br>Price : Tk. <?php echo $result['price'];?></p>
        </div>

        
        <div class="inputs">
        <form action="" method="post">
          <input type="number" name="quantity" min="0" value="1">
        </div>
        <div class="btn">
        <button name="submit">Buy Now</button>
        </div> 
        </form>   
   </div>


</div>


<div class="description">
     <br>
           <h2>Product Details :</h2><br>
           <div>
             <p><?php echo $fm->textShorten( $result['body'], 100);?></p>
           </div>
   </div>
   <?php } }?>


   <?php include 'inc/footer.php';?> 





