<?php include 'inc/header.php';?>
<section id="services">
	<div class="services-info">
			<h1>Take a package <span id="blue">for a Session</span></h1> 
	<a href="tsessionDetails.php" style="color:blue; font-size:24px; font-weight:800;">Session Details</a>
	<br>
	</div>
	    
	   <main>
	          <?php
				    $getPack = $pk->getPackage();
				  	if ($getPack) {
						while ($result = $getPack->fetch_assoc()) {
            		
				?>
        
		<div class="card-basic">
		  <div class="card-header header-basic">
			<h2 style="color:#066963;">Session Code-<?php echo $result['sessionNo'];?></h2>
			<h1><?php echo $result['packName'];?></h1>
		  </div>
		  <div class="card-body">
			<p><h2>Tk<?php echo $result['price'];?> / mo</h2></p>
			<div class="card-element-hidden-basic">
			  <p><?php echo $result['body'];?> </p>
			  <a href="sesspayment.php"><button class="btn btn-basic">Purchase</button></a>
			</div>
		  </div>
		</div>
		<?php } } ?>
	   </main>
	  
		
		  
</section>

<?php include 'inc/footer.php';?> 