<?php
      include 'lib/session.php';
      Session::init();
      include 'lib/Database.php'; 
      include 'helpers/Format.php';


	  spl_autoload_register(function($class){
         include_once "classes/".$class.".php";

	  });

	  $db = new Database();
	  $fm = new Format();
	  $pk = new Packages();
	  $cmr = new Customer();
	  $ts = new Tsession();
	  $pd = new Product();
	  $ct = new Cart();
	  

?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Webite Fitness & Gym</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="fit.js"></script>
	
</head>
<body>
<header>
	<nav>
		<div class="logo">
			<a href="index.php"><span id="blue">Fitness</span></a>HUB
		</div>
		<div class="menu">
			<a href="index.php">Home</a>
			<?php
              $chkCart  = $ct->CheckCartData();
	          if ($chkCart) { ?>

			<a href="cart.php">Cart( <?php $getData = $ct->CheckCartData();
					if ($getData) {
					$sum = Session::get("sum");
					$qty = Session::get("qty");
					echo "".$sum."--".$qty;
					}else{
					Echo " -- ";
					} ?>)</a>

<?php } ?>
             <?php 
				    if (isset($_GET['cid'])) {
					$delcart = $ct->DeleteCustomercart();
					Session::destroy();
					} 
				 
				 ?>

			<?php   
          $login = Session::get("cusLogin");
		   if ($login == true) { ?>
		    	<a href="trainingsess.php">T.session</a>
				
				
				<a href="product.php">Equipments</a>
			
				
				
	       <?php } ?>

		   

			<?php 
				    if (isset($_GET['cid'])) {
					Session::destroy();
					} 
				 
				 ?>

			<?php
				$login = Session::get("cusLogin");
				if ($login == false) {?>   
		   <a href="login.php">Login</a>
		    <?php }else { ?>
		    <a href="?cid=<?php Session::get("cmrId")?>">Logout</a>
			<?php } ?>

			<?php   
          $login = Session::get("cusLogin");
		   if ($login == true) { ?>
		    	<a href="profile.php">Profile</a>
	       <?php } ?>
		</div>

		<div class="icon">
			<img src="images/icon.png">
		</div>

	</nav>
	
	
	  
	  

	
