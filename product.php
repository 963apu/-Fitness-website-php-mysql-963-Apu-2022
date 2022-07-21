<?php include 'inc/header.php';?>





<style>

.listing-section, .cart-section {
	width: 100%;
	float: left;
	padding: 1%;
	border-bottom: 0.01em solid #dddbdb;
    margin-top:20px;
  }
  
  .product {
	float: left;
	width: 23%;
	border-radius: 2%;
	margin: 1%;
  }
  
  .product:hover {
	box-shadow: 1.5px 1.5px 2.5px 3px rgba(0, 0, 0, 0.4);
	-webkit-box-shadow: 1.5px 1.5px 2.5px 3px rgba(0, 0, 0, 0.4);  
	-moz-box-shadow:    1.5px 1.5px 2.5px 3px rgba(0, 0, 0, 0.4);
  }
  
  .image-box {
	width: 100%;
	overflow: hidden;
	border-radius: 2% 2% 0 0;
  }
  
  .images {
	height: 15em;
	background-size: cover; 
	background-position: center center; 
	background-repeat: no-repeat;
	border-radius: 2% 2% 0 0;
	transition: all 1s ease;
	-moz-transition: all 1s ease;
	-ms-transition: all 1s ease;
	-webkit-transition: all 1s ease;
	-o-transition: all 1s ease;
  }
  
  .images:hover {
	transform: scale(1.2);
	overflow: hidden;
	border-radius: 2%;
  }
  
  /* IMAGES */
  #image-1 {background-image: url("images/p1.jpg");}
  
  #image-2 {background-image: url("images/p2.jpg")}
  
  #image-3 {background-image: url("images/p3.jpg")}
  
  #image-4 {background-image: url("images/p4.jpg")}
  
  #image-5 {background-image: url("images/p5.jpg")}
  
  #image-6 {background-image: url("images/p6.jpg")}
  
  #image-7 {background-image: url("images/p7.jpg")}
  
  #image-8 {background-image: url("images/p8.jpg")}
  
  #image-9 {background-image: url("images/p9.jpg")}
  
  #image-10 {background-image: url("images/p10.jpg")}
  
  .text-box {
	width: 100%;
	float: left;
	border: 0.01em solid #dddbdb;
	border-radius: 0 0 2% 2%;
	padding: 1em;
  }
  
  h2, h3 {
	float: left;
	font-family: 'Roboto', sans-serif;
	font-weight: 400;
	font-size: 1em;
	text-transform: uppercase;
	margin: 0.2em auto;
    color: #fff;
  }
  
  .item, .price {
	clear: left;
	width: 100%;
	text-align: center;
    color: #fff;
  }
  
  .price {
	
    color: #fff;
  }
  
  .description, label, button, input {
	float: left;
	clear: left;
	width: 100%;
	font-family: 'Roboto', sans-serif;
	font-weight: 300;
	font-size: 1em;
	text-align: center;
	margin: 0.2em auto;
    cursor:pointer;
    
  }
  
  input:focus {
	outline-color: #fdf;
  }
  
  label {
	width: 60%;
  }
  
  .text-box input {
	width: 15%;
	clear: none;
  }
  
  .text-box button {
	margin-top: 1em;
    cursor:pointer;
  }
  
  button {
	padding: 2%;
	background-color: #dfd;
	border: none;
	border-radius: 2%;
    cursor:pointer;
  }
  
  button:hover {
	bottom: 0.1em;
  }
  
  button:focus {
	outline: 0;
  }
  
  button:active {
	bottom: 0;
	background-color: #fdf;
  }
  
  .table-heading, .table-content {
	width: 75%;
	margin: 1% 12.25%;
	float: left;
	background-color: #dfd;
  }
  
  .table-heading h2 {
	padding: 1%;
	margin: 0;
	text-align: center;
  }
  
  .cart-product {
	width: 50%;
	float: left;
  }
  
  .cart-price {
	width: 15%;
	float: left;
  }
  
  .cart-quantity {
	width: 10%;
	float: left;
  }
  
  .cart-total {
	width: 25%;
	float: left;
  }
  
  .cart-image-box {
	width: 20%;
	overflow: hidden;
	border-radius: 2%;
	float: left;
	margin: 1%;
  }
  
  .cart-images {
	height: 7em;
	background-size: cover; 
	background-position: center center; 
	background-repeat: no-repeat;
  }
  
  .cart-item {
	width: 20%;
	float: left;
	margin: 3.2em 1%;
	text-align: center;
  }
  .cart-description {
	width: 53%;
	float: left;
	margin: 3.2em 1%;
	font-family: 'Roboto', sans-serif;
	font-weight: 300;
	font-size: 1em;
	text-align: center;
  }
  
  .cart-price h3, .cart-total h3 {
	margin: 3.2em 5% 3.2em 20%;
	width: 60%;
  }
  
  .cart-quantity input {
	margin: 3.2em 1%;
	border: none;
  }
  
  .remove {
	width: 10%;
	margin: 1px;
	float: right;
	clear: right;
  }
  
  .coupon {
	width: 20%;
	background-color: #dfd;
	margin: 1% 1% 1% 12.25%;
	float: left;
	height: 6em;
  }
  
  .coupon input {
	width: 60%;
	border: none;
	margin: 12.75% 5%;
	padding: 1%;
  }
  
  .coupon button {
	width: 25%;
	float: left;
	clear: right;
	margin: 12% 5% 12% 0;
  }
  
  .keep-shopping {
	width: 15%;
	height: 6em;
	float: left;
	margin: 1% auto;
	padding: 1%;
	background-color: #dfd;
  }
  
  .keep-shopping button {
	text-transform: uppercase;
	margin: 12% auto;
	
  }
  
  .checkout {
	width: 37.25%;
	margin: 1% 12.75% 1% 1%;
	float: right;
	background-color: #dfd;
	height: 6em;
  }
  
  .checkout button {
	width: 30%;
	clear: none;
	margin: 5.4% 0 5.4% 5.5%;
	text-transform: uppercase;
  }
  
  .final-cart-total {
	width: 15%;
	float: right;
	margin: 7%;
	background-color: White;
  }
  
  .final-cart-total h3 {
	color: Black;
  }  

</style>
<section>
	<div class="services-info">
    <h1>Get Your <span id="blue"> Effective Equipment</span></h1>
	<p>And Make You Perfect </p>
	<br>
    <br>
	</div> 

  
     <?php
				    $getApd = $pd->getProduct();
					if ($getApd) {
						while ($result = $getApd->fetch_assoc()) {
								
				?>
  <div class="product">
    <div class="image-box">
      <div class="images" id=""><img src="admin/<?php echo $result['image'];?>" width="350px" height="300px"></div>
    </div>
    <div class="text-box">
      <h2 class="item"><?php echo $result['productName'];?></h2>
      <h3 class="price">Tk. <?php echo $result['price'];?></h3>
      <a href="detailspd.php?prodid=<?php echo $result['productId'];?>"><button type="button" name="item-1-button" id="item-1-button">Add to Cart</button></a>
    </div>
  </div>
  <?php } } ?>
</div>

	

</section>



<?php include 'inc/footer.php';?> 