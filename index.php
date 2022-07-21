<?php include 'inc/header.php';?>

<div class="container">
      
      <div class="slides-wrapper">
          <div class="img-container">
          <img src="images/ex5.jpg" alt="">
          </div>
          <div class="img-container text" style="background-color: azure;">
          <h1 style="color: rgb(51, 84, 84); text-align: center;">We Help Busy Parents Achieve Their Fitness Goals</h1>
          
          </div>
          <div class="img-container">
          <img src="images/fit2.jpg" alt="">
          </div>
      </div>

<div class="slider">
          <div class="selected"></div>
          <button class="slider-button"></button>
          <button class="slider-button"></button>
          <button class="slider-button"></button>
      </div>

      <div class="htext">

          <h2>Make Your Body Fit</h2>     
       </div>


      </div>

     





				</header>

				
<section id="about">
	<div class="about-row">
		<div class="about-left-col">
			<h1> About <span id="blue">me</span></h1>
			<p id="p-title">I am a Gym Trainer</p>
			<p>
				From Rajasthan,doing gym is good for healthy life. it helps our body to fit. it release stress from our mind.From Rajasthan,doing gym is good for healthy life. it helps our body to fit. it release stress from our mind.

			</p>
			<p>
				From Rajasthan,doing gym is good for healthy life.
			</p>
			<button type="button" class="btn btn-primary">Primary</button>
		</div>
		<div class="about-right-col">
			<img src="images/img1.jpg">
		</div>
	</div>
</section>
<section id="signup">
	<div class="signup-row">
		<div class="signup-left-col">
			<img src="images/img2.png">
		</div>
		<div class="signup-right-col">
				<h1> BEING <span id="blue">BODY</span></h1>
			<h2>BUILDER</h2>
			<a href="reg.php"><button type="button" class="c-btn">Signup</button></a>

		</div>
	</div>
</section>
<section id="services">
	<div class="services-info">
			<h1>Our <span id="blue">Packagaes</span></h1> 
	<p>What we Provide</p>
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
			<h1><?php echo $result['packName'];?></h1>
		  </div>
		  <div class="card-body">
			<p><h2>Tk <?php echo $result['price'];?>/month</h2></p>
			<div class="card-element-hidden-basic">
			  <p><?php echo $result['body'];?> </p>
			  <button class="btn btn-basic">join now</button>
			</div>
		  </div>
		</div>
		<?php } } ?>
	   </main>
	  
		
		  
</section>

<section id="testimonials">
        <!--heading--->
        <div class="testimonial-heading">
            <span>Comments</span>
            <h4>Clients Says</h4>
        </div>
        <!--testimonials-box-container------>
        <div class="testimonial-box-container">
            <!--BOX-1-------------->
            <div class="testimonial-box">
                <!--top------------------------->
                <div class="box-top">
                    <!--profile----->
                    <div class="profile">
                        <!--img---->
                        <div class="profile-img">
                            <img src="" />
                        </div>
                        <!--name-and-username-->
                        <div class="name-user">
                            <strong>Liam mendes</strong>
                            <span>@liammendes</span>
                        </div>
                    </div>
                    <!--reviews------>
                    <div class="reviews">
                        <i class="fa-regular fa-star"></i>
						<i class="fa-regular fa-star"></i>
						<i class="fa-regular fa-star"></i>
						<i class="fa-regular fa-star"></i>
						<i class="fa-regular fa-star"></i><!--Empty star-->
                    </div>
                </div>
                <!--Comments---------------------------------------->
                <div class="client-comment">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, quaerat quis? Provident temporibus architecto asperiores nobis maiores nisi a. Quae doloribus ipsum aliquam tenetur voluptates incidunt blanditiis sed atque cumque.</p>
                </div>
            </div>
            <!--BOX-2-------------->
            <div class="testimonial-box">
                <!--top------------------------->
                <div class="box-top">
                    <!--profile----->
                    <div class="profile">
                        <!--img---->
                        <div class="profile-img">
                            <img src="" />
                        </div>
                        <!--name-and-username-->
                        <div class="name-user">
                            <strong>Noah Wood</strong>
                            <span>@noahwood</span>
                        </div>
                    </div>
                    <!--reviews------>
                    <div class="reviews">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i><!--Empty star-->
                    </div>
                </div>
                <!--Comments---------------------------------------->
                <div class="client-comment">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, quaerat quis? Provident temporibus architecto asperiores nobis maiores nisi a. Quae doloribus ipsum aliquam tenetur voluptates incidunt blanditiis sed atque cumque.</p>
                </div>
            </div>
            <!--BOX-3-------------->
            <div class="testimonial-box">
                <!--top------------------------->
                <div class="box-top">
                    <!--profile----->
                    <div class="profile">
                        <!--img---->
                        <div class="profile-img">
                            <img src="" />
                        </div>
                        <!--name-and-username-->
                        <div class="name-user">
                            <strong>Oliver Queen</strong>
                            <span>@oliverqueen</span>
                        </div>
                    </div>
                    <!--reviews------>
                    <div class="reviews">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i><!--Empty star-->
                    </div>
                </div>
                <!--Comments---------------------------------------->
                <div class="client-comment">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, quaerat quis? Provident temporibus architecto asperiores nobis maiores nisi a. Quae doloribus ipsum aliquam tenetur voluptates incidunt blanditiis sed atque cumque.</p>
                </div>
            </div>
            <!--BOX-4-------------->
            <div class="testimonial-box">
                <!--top------------------------->
                <div class="box-top">
                    <!--profile----->
                    <div class="profile">
                        <!--img---->
                        <div class="profile-img">
                            <img src="" />
                        </div>
                        <!--name-and-username-->
                        <div class="name-user">
                            <strong>Barry Allen</strong>
                            <span>@barryallen</span>
                        </div>
                    </div>
                    <!--reviews------>
                    <div class="reviews">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i><!--Empty star-->
                    </div>
                </div>
                <!--Comments---------------------------------------->
                <div class="client-comment">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, quaerat quis? Provident temporibus architecto asperiores nobis maiores nisi a. Quae doloribus ipsum aliquam tenetur voluptates incidunt blanditiis sed atque cumque.</p>
                </div>
            </div>
        </div>

        <a href="review.php" style="border:1px solid red; background:yellow; padding:5px 10px; color:black;border-radius:4px; font-weight:bold;">Review Us</a>
</section>

<section id="trainers" class="body-card">
	<div class="services-info">
		<h1>Our <span id="blue">Trainers</span></h1>
       <p>What our Trainers Instruction</p>
    </div>
  <div class="card card-one">
    <div class="profileImg first"></div>
	<h3>Name</h3>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ad expedita sint perspiciatis iure, dolor id laudantium facere eaque vitae aliquam distinctio repudiandae, harum, impedit laboriosam. Officia molestias aliquam facilis earum!</p>
    <ul>
      <li><a href="#"><i class="fab fa-instagram"></i></a></li>
      <li><a href="#"><i class="fab fa-github"></i></a></li>
      <li><a href="#"><i class="fab fa-stack-overflow"></i></a></li>
    </ul>
  </div>
  <div class="card card-two">
    <div class="profileImg second"></div>
	<h3>Name</h3>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ad expedita sint perspiciatis iure, dolor id laudantium facere eaque vitae aliquam distinctio repudiandae, harum, impedit laboriosam. Officia molestias aliquam facilis earum!</p>
    <ul>
      <li><a href="#"><i class="fab fa-instagram"></i></a></li>
      <li><a href="#"><i class="fab fa-github"></i></a></li>
      <li><a href="#"><i class="fab fa-stack-overflow"></i></a></li>
    </ul>
  </div>
  <div class="card card-three">
    <div class="profileImg third"></div>
	<h3>Name</h3>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ad expedita sint perspiciatis iure, dolor id laudantium facere eaque vitae aliquam distinctio repudiandae, harum, impedit laboriosam. Officia molestias aliquam facilis earum!</p>
    <ul>
      <li><a href="#"><i class="fab fa-instagram"></i></a></li>
      <li><a href="#"><i class="fab fa-github"></i></a></li>
      <li><a href="#"><i class="fab fa-stack-overflow"></i></a></li>
    </ul>
  </div>
    </section> 
		<?php include 'inc/footer.php';?> 




