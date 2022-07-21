<?php include 'inc/header.php';?> 


<style>



</style>

<section>
	<div class="services-info">
			<h1>Training <span id="blue"> Session</span></h1>
	<p><a href="">What we provide</a></p>
	<br>
	</div>  
	   <main>
	   <?php
				    $getTsess = $ts->getTsession();
				  	if ($getTsess ) {
						while ($result = $getTsess->fetch_assoc()) {
            		
				?>
		<div class="card-premium">
		  <div class="card-header header-premium">
			<h1><?php echo $result['trainerName'];?></h1>
			<h5>(Session No - <?php echo $result['sessionNo'];?>)</h5>
		  </div>
		  <div class="card-body">
			<p><h4><?php echo $result['trainerIntro'];?></h4></p>
			<div class="card-element-hidden-premium">
            <ul class="card-element-container">
                      <li class="card-element">1. <?php echo $result['infoone'];?></li>
                      <li class="card-element">2. <?php echo $result['infotwo'];?></li>
                      <li class="card-element">3. <?php echo $result['infothree'];?></li>
                      <li class="card-element">4. <?php echo $result['infofour'];?></li>
                     
					 
                  </ul>
				  <h4> <a href="#" style="color:blue;"><?php echo $result['category'];?></a></h4>
				  
			  
			  <a href="tsessionDetails.php?reqid=<?php echo $result['id'];?>"><button class="btn btn-premium">Request For a Session </button></a>
			</div>
		  </div>
		</div>
		<?php } }?>
	   </main>
	   		
		  
</section>

<?php include 'inc/footer.php';?> 