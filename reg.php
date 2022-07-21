<?php include 'inc/header.php';?>



<?php
					  
					  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
					  $customerReg = $cmr->customerRegistration($_POST);
				   }
				 
				 
					
					?>

    <?php
			    if (isset($customerReg)) {
					echo $customerReg;
				} 
			
			?>
<style>
    *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  list-style: none;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  background: #ffff;

    }



 .wrapper{
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  display: flex;
}

.registration_form{
  border-radius: 5px;
  width: 400px;
  background: white;
  padding: 25px;
  border: 2px solid  #326088;
}

.registration_form .title{
  color: #326088;
  background:#88f9d0;
  font-weight: 400;
  text-align: center;
  font-size: 22px;
  margin-top: -25px;
  margin-left:-25px;
  margin-right:-25px;
  padding: 5px 10px;
}

.form_wrap{
  margin-top: 35px;
}

.form_wrap .input_wrap{
  margin-bottom: 15px;

  
}

.form_wrap .input_wrap:last-child{
  margin-bottom: 0;
}

.form_wrap .input_wrap label{
  margin-bottom: 3px;
  color: #1a1a1f;
  display: block;
}

.form_wrap .input_grp{
  display: flex;
  justify-content: space-between;
}

.form_wrap .input_grp  input[type="text"]{
  width: 165px;
}

.form_wrap  input[type="text"]{
  width: 100%;
  padding: 10px;
  outline: none;
  border-radius: 3px;
  border: 1.3px solid #9597a6;
}

.form_wrap  input[type="text"]:focus{
  border-color: #063abd;
}

.form_wrap ul{
  padding: 8px 10px;
  border-radius: 20px;
  display: flex;
  justify-content: center;
  border:1px solid rgb(115, 185, 235);
  width:70%;
  background: rgb(206, 238, 242);
  margin-left: 15%;
}

.form_wrap ul li:first-child{
  margin-right: 15px;
}

.form_wrap ul .radio_wrap{
  position: relative;
  margin-bottom: 0;
}

.form_wrap ul .radio_wrap .input_radio{
  position: absolute;
  top: 0;
  right: 0;
  opacity: 0;
}

.form_wrap ul .radio_wrap span{
  display: inline-block;
  font-size: 17px;
  padding: 3px 15px;
  border-radius: 15px;
  color: #101749;
}

.form_wrap .input_radio:checked ~ span{
  background: #105ce2;
  color:white;
}

/* Submit Button */
.form_wrap .submit_btn{
  font-size:17px;
  border-radius: 8px;
  text-transform: uppercase;
  cursor: pointer;
  width: 100%;
  background: #0d6ad7;
  padding: 10px;
  border: 2px solid #f2f2f2;
  color:white;

}
.form_wrap .submit_btn:hover{
    background-color: #06c766;
    color: #326088;
    font-weight:bold;
}
.form_wrap a{
  font-size:17px;
  border-radius: 8px;
  text-transform: uppercase;
  cursor: pointer;
  width: 100%;
  background: #0d6ad7;
  padding: 10px;
  border: 2px solid #f2f2f2;
  color:white;
  margin-left: 150px;

}
.form_wrap a:hover{
    background-color: #06c766;
    color: #326088;
    font-weight:bold;
}
</style>



<div class="wrapper">

 <div class="registration_form">
 
<!-- Title -->
  <div class="title">
    Register Here
  </div>

<!-- Form -->
\

 <form action="" method="post">
  <div class="form_wrap">
   <div class="input_grp">

<!-- Frist name input Place -->
     <div class="input_wrap">
  	<label for="fname">First Name</label>
  	<input type="text" name="fname" value="" id="fname">
     </div>

<!-- Last Name input place -->
    <div class="input_wrap">
      <label for="lname">Last Name</label>
      <input type="text" name="lname" id="lname">
    </div>
  </div>

  
<!-- City Name input place -->
<div class="input_wrap">
  <label for="address">Addrress</label>
  <input type="text" name="address" id="addsress">
 </div>

<!-- City Name input place -->
 <div class="input_wrap">
  <label for="city">City</label>
  <input type="text" name="city" id="city">
 </div>

<!-- Country Name input place -->
 <div class="input_wrap">
  <label for="country">Country</label>
  <input type="text" name="country" id="country">
 </div>
 <!-- Country Name input place -->
 <div class="input_wrap">
  <label for="Zip">Zip-Code</label>
  <input type="text" name="zip" id="Zip">
 </div>
 <!-- Email Id input Place -->
 <div class="input_wrap">
  <label for="phone">Phone No</label>
  <input type="text" name="phone" id="phone">
 </div>
 <!-- Email Id input Place -->
 <div class="input_wrap">
  <label for="email">Email Address</label>
  <input type="text" name="email" id="email">
 </div>
 <!-- Country Name input place -->
 <div class="input_wrap">
  <label for="pass">Password</label>
  <input type="text" name="password" id="Password">
 </div>
 <div class="input_wrap">
  <label for="pass">Confirm Password</label>
  <input type="text" name="Conpassword" id="Password">
 </div>





<!-- Submit button -->
 <div class="input_wrap">
   <input type="submit" name="register" value="Register Now" class="submit_btn">
 </div>
 <!-- Submit button -->
 <div class="input_wrap">
   <a class="submit_btntwo" href="login.php">Login</a>
 </div>
 
  


</div>
</form>
</div>
</div>
</header>